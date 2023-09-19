<?php
const EVENT_NAME = 'event_name';
const EVENT_DATE = 'event_date';
const EVENT_TIME_FROM = 'event_time_from';
const EVENT_TIME_TO = 'event_time_to';
const EVENT_MAX_PARTICIPANTS = 'event_max_participants';
const EVENT_ADMIN_MAIL = 'event_admin_mail';

/**
 * Class EventManager
 */
class EventManager
{
    private $option_name = 'sls_events';
    private $settings_option_name = 'sls_events_admin_mails';
    private $required_data = [EVENT_NAME, EVENT_DATE, EVENT_TIME_FROM, EVENT_TIME_TO, EVENT_MAX_PARTICIPANTS];

    /**
     * EventManager constructor.
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu_pages']);
        add_action('admin_enqueue_scripts', [$this, 'plugin_scripts']);
        add_action('wp_ajax_delete_event', [$this, 'delete_event']);
        add_action('wp_ajax_subscribe_event', [$this, 'subscribe_event']);
        add_action('wp_ajax_nopriv_subscribe_event', [$this, 'subscribe_event']);

        // We probably have data to save, further checks in save_event
        if (!empty($_REQUEST) && array_key_exists('page', $_REQUEST) && count($_REQUEST) > 1) {
            add_action('admin_init', [$this, 'save_event']);
        }

        // We have an event to delete
        if (array_key_exists('event_del', $_GET) && (!empty($event_id = $_GET['event_del']) || $_GET['event_del'] == 0)) {
            add_action('admin_init', [$this, 'delete_event']);
        }
    }

    /**
     * Enqueue and localize wp scripts
     */
    public function plugin_scripts()
    {
        wp_enqueue_style('sls-plugins-admin-styles', SLS_STYLES_URL . 'main.css');
        wp_enqueue_script('sls-plugins-admin-scripts', SLS_SCRIPTS_URL . 'main.js', ['jquery'], false, true);
        wp_localize_script('sls-plugins-admin-scripts', 'widget_vars', [
            'event_manager_url' => admin_url("/admin.php?page=sls-event-manager"),
            'ajax_url' => admin_url('admin-ajax.php'),
            'security_nonce' => wp_create_nonce('sls-plugins'),
        ]);
    }

    /**
     * Generate admin pages
     */
    public function add_menu_pages()
    {
        add_menu_page(
            __('Event Manager', 'sls-plugins'),
            __('Events', 'sls-plugins'),
            'edit_posts',
            'sls-event-manager',
            function () {
                require_once(SLS_PAGES_PATH . DIRECTORY_SEPARATOR . 'event-manager.php');
            },
            'dashicons-welcome-widgets-menus',
            6
        );
        add_submenu_page(
            'sls-event-manager',
            'Events',
            'Events',
            'edit_posts',
            'sls-event-manager'
        );
        add_submenu_page(
            'sls-event-manager',
            'New event',
            'Add new',
            'edit_posts',
            'sls-event-manager-new',
            function () {
                require_once(SLS_PAGES_PATH . DIRECTORY_SEPARATOR . 'new-event.php');
            }
        );
        add_submenu_page(
            'sls-event-manager',
            'Settings',
            'Settings',
            'edit_posts',
            'sls-event-manager-settings',
            function () {
                require_once(SLS_PAGES_PATH . DIRECTORY_SEPARATOR . 'event-manager-settings.php');
            }
        );
        add_submenu_page(
            'options.php', // We're using options.php to hide this element from the admin menu
            'Edit event',
            'Add new',
            'edit_posts',
            'sls-event-manager-edit',
            function () {
                require_once(SLS_PAGES_PATH . DIRECTORY_SEPARATOR . 'edit-event.php');
            }
        );
    }

    public function save_event()
    {
        $data_to_save = ['email' => []];

        foreach ($this->required_data as $required_data) {
            if (!array_key_exists($required_data, $_REQUEST) || empty($_REQUEST[$required_data])) {
                return;
            }

            $data_to_save[$required_data] = $_REQUEST[$required_data];
        }

        check_admin_referer('security-nonce', 'edit-or-add-event');
        $events = $this->get_events();

        if ($events !== false) {
            $this->update_events($events, $data_to_save);
        } else {
            $this->new_event($data_to_save);
        }

        return;
    }

    public function get_events($id = null)
    {
        $events = get_option($this->option_name);

        if (empty($events)) {
            return $events;
        }

        $events = unserialize($events);

        if ($id !== null && array_key_exists($id, $events)) {
            return $events[$id];
        }

        return $events;
    }

    private function update_events($events, $data)
    {
        $event_id = false;

        if (array_key_exists("event_id", $_REQUEST) && (!empty($_REQUEST["event_id"]) || $_REQUEST["event_id"] == 0)) {
            $event_id = $_REQUEST["event_id"];
        }

        if ($event_id !== false) {
            $events[$event_id] = $data;
        } else {
            $events[] = $data;
        }

        update_option($this->option_name, serialize($events));
    }

    private function new_event($event)
    {
        add_option($this->option_name, serialize([
            1 => $event,
        ]));
    }

    public function delete_event()
    {
        check_ajax_referer('sls-plugins', 'security_nonce');

        if (array_key_exists("delete_event", $_POST) && (!empty($_POST["delete_event"]) || $_POST["delete_event"] == 0)) {
            $events = $this->get_events();
            unset($events[$_POST["delete_event"]]);
            update_option($this->option_name, serialize($events));
            wp_die("Event deleted!");
        }
    }

    public function subscribe_event()
    {
        check_ajax_referer('streamatemodels', 'security_nonce');
        $events = $this->get_events();
        $event_id = false;
        $email = false;

        if (array_key_exists("event_id", $_REQUEST) && (!empty($_REQUEST["event_id"]) || $_REQUEST["event_id"] == 0)) {
            $event_id = $_REQUEST["event_id"];
        }

        if ($event_id === false) {
            wp_die(json_encode(__('Événement incorrect sélectionné', 'streamatemodels')));
        }

        if (array_key_exists("email", $_REQUEST) && (!empty($_REQUEST["email"]))) {
            $email = $_REQUEST["email"];
        }

        if ($email === false || !(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            wp_die(json_encode(__('Adresse email incorrecte', 'streamatemodels')));
        }

        if (!empty($events[$event_id]['email']) && count($events[$event_id]['email']) >= $events[$event_id][EVENT_MAX_PARTICIPANTS]) {
            wp_die(json_encode(__("Quelqu'un a déjà été programmé pendant cet horaire", 'streamatemodels')));
        }

        $events[$event_id]['email'][] = $email;
        update_option($this->option_name, serialize($events));
        $date = date('d.m.Y', strtotime($events[$event_id][EVENT_DATE]));
        $time_from = date('H:i', strtotime($events[$event_id][EVENT_TIME_FROM]));
        $time_to = date('H:i', strtotime($events[$event_id][EVENT_TIME_TO]));

        ob_start();
        include(SLS_TEMPLATES_PATH . 'mail' . DIRECTORY_SEPARATOR . 'event-notification.php');
        $message = ob_get_contents();
        ob_end_clean();

        wp_mail(
            array_merge($this->get_admin_mails(), [$email]),
            __('Streamate Models: participation à la formation en ligne', 'streamatemodels'),
            $message,
            [
                'From: Streamatemodels.fr <info@streamatemodels.fr>',
                'Content-Type: text/html; charset=UTF-8'
            ]
        );
        wp_die(json_encode(true));
    }

    public function get_admin_mails()
    {
        return explode(",", preg_replace('/\s+/', '', get_option($this->settings_option_name)));
    }

    public function get_free_events()
    {
        $events = get_option($this->option_name);

        if (empty($events)) {
            return $events;
        }

        $events_formatted = array_filter(unserialize($events), function ($event) {
            if (array_key_exists('email', $event) && empty($event['email'])) {
                return $event;
            }

            return false;
        });

        $output_dates = [];

        foreach ($events_formatted as $event_id => $event_data) {
            $timestamp_from = strtotime($event_data[EVENT_DATE] . "T" . $event_data[EVENT_TIME_FROM]);

            // Offsetting the time by an hour, so users cant register to appointment in the last minute
            if (($timestamp_from - 3600) <= time()) {
                continue;
            }

            $date = date('d.m.Y', strtotime($event_data[EVENT_DATE]));
            $time_from = date('H:i', strtotime($event_data[EVENT_TIME_FROM]));
            $time_to = date('H:i', strtotime($event_data[EVENT_TIME_TO]));
            $full_time = $time_from . " - " . $time_to;

            if (!array_key_exists($date, $output_dates)) {
                $output_dates[$date] = [$event_id => $full_time];
                continue;
            }

            if (!array_key_exists($event_id, $output_dates[$date])) {
                $output_dates[$date][$event_id] = $full_time;
            }
        }

        return $output_dates;
    }

    public function save_settings()
    {
        if (array_key_exists(EVENT_ADMIN_MAIL, $_POST) && !empty($_POST[EVENT_ADMIN_MAIL])) {
            update_option($this->settings_option_name, $_POST[EVENT_ADMIN_MAIL]);
        }
    }
}

// Instantiate the class
new EventManager();
