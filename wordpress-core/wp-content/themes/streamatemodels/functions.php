<?php
const MONTHS_FR = ['Janvier', 'Février', 'Mars', 'Avri', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

date_default_timezone_set("Europe/Budapest");

require get_template_directory() . '/includes/common-functions.php';

if (!function_exists('load_scripts')) {
    function load_scripts()
    {
        $template_directory_uri = get_template_directory_uri();

        // Load main stylesheet
        wp_enqueue_style('main-style', get_stylesheet_uri());

        // Load jquery cookie
        wp_enqueue_script('jquery-cookie', ($template_directory_uri . '/assets/scripts/jquery.cookie.js'), ['jquery'], false, true);

        // Load main javascript
        wp_enqueue_script('main', ($template_directory_uri . '/assets/scripts/main.js'), ['jquery', 'jquery-cookie'], false, true);

        // Load slick carousel on-demand
        if (is_front_page()) {
            wp_enqueue_style('slick-styles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
            wp_enqueue_script('slick-scripts', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], false, false);
            wp_enqueue_style('select2-styles', '//cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css');
            wp_enqueue_script('select2-scripts', '//cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js', ['jquery'], false, false);
        }

        // Localize useful variables, making them avaialable in said javascript file (by handler)
        wp_localize_script('main', 'resolutions', [
            'hd' => 1600,
            'hdReady' => 1366,
            'large' => 1200,
            'medium' => 992,
            'small' => 768,
            'extraSmall' => 480,
            'old' => 375,
        ]);

        wp_localize_script('main', 'main_vars', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'security_nonce' => wp_create_nonce('streamatemodels'),
            'is_front_page' => is_front_page()
        ]);
    }

    add_action('wp_enqueue_scripts', 'load_scripts');
}

// Set-up the theme
function theme_supports()
{
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'header_section' => __('Header section'),
        'footer_section' => __('Footer section'),
    ]);
}

add_action('after_setup_theme', 'theme_supports');

add_filter('excerpt_length', function ($length) {
    return 15;
}, 999);


function replace_include_blank($name, &$html)
{
    $matches = false;
    preg_match('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $html, $matches);
    if ($matches) {
        $select = str_replace('<option value="">', '<option value="" selected disabled>', $matches[0]);
        $html = preg_replace('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $select, $html);
    }
}

if (!function_exists('my_wpcf7_form_elements')) {
    function my_wpcf7_form_elements($html)
    {
        replace_include_blank('gender', $html);
        replace_include_blank('discussion', $html);
        return $html;
    }
}

add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');

function alter_wpcf7_posted_data($data)
{
    if ($_POST['mail'] || $_POST['phone']) {
        if (empty($_POST['mail'])) {
            $_POST['mail'] = $data['mail'] = 'n/a';
        }

        if (empty($_POST['phone'])) {
            $_POST['phone'] = $data['phone'] = 'n/a';
        }
        return $data;
    } else {
        return $_POST;
    }
}

add_filter("wpcf7_posted_data", "alter_wpcf7_posted_data");

function sls_title_tag()
{
    global $page, $paged;
    $title_content = '';

	if (!(is_home() || is_front_page())) {
		$title_content = wp_title(' | ', false, 'right');
	}

    // Add the blog name.
    $bloginfo = get_bloginfo('name', 'display');

    if (!empty($site_description = get_bloginfo('description', 'display')) && (is_home() || is_front_page())) {
        if (strlen($site_description) > 3) {
            $bloginfo = $site_description;
        }
    }

    $title_content .= $bloginfo;

    // Add a page number if necessary:
    if (($paged >= 2 || $page >= 2) && !is_404()) {
        $title_content .= ' | ' . sprintf(__('Page %s'), max($paged, $page));
    }

    echo sprintf('<title>%s</title>', $title_content);
}

add_action('wp_head', 'sls_title_tag');

if (getenv('ENV') === 'dev') {
    // ONLY FOR DEV ENVIRONMENT
    add_action('phpmailer_init', function ($phpmailer) {
        $phpmailer->isSMTP();
        $phpmailer->Host = getenv('SMTP_HOST');
        $phpmailer->SMTPAuth = getenv('SMTP_AUTH');
        $phpmailer->Port = getenv('SMTP_PORT');
        $phpmailer->Username = getenv('SMTP_USER');
        $phpmailer->Password = getenv('SMTP_PASS');
    });
}
