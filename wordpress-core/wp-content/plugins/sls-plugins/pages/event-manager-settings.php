<?php
if (!empty($_POST)) {
    $this->save_settings();
}

$admin_mails = $this->get_admin_mails();
$admin_mails_text = implode($admin_mails, ', ');
?>

<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
    <a class="page-title-action" href="<?php echo admin_url( "/admin.php?page=sls-event-manager" ); ?>">
		<?php _e( 'Cancel', 'sls-plugins' ); ?>
    </a>

    <form class="sls-plugin-form" id="eventEditAdd" method="post"
          action="<?php echo admin_url( "/admin.php?page=sls-event-manager-settings" ); ?>">
		<?php wp_nonce_field( 'security-nonce', 'edit-or-add-event' ); ?>
        <label for="eventAdminMail"><?php _e( 'Admin email addresses (for notification emails)', 'sls-plugins' ); ?></label>
        <textarea type="textarea" style="width: 300px; min-height: 30px; max-height: 300px;" name="<?php echo EVENT_ADMIN_MAIL; ?>" id="eventAdminMail"
                  placeholder="<?php _e( '', 'sls-plugins' ); ?>"><?php echo $admin_mails_text; ?></textarea>

        <button class="page-title-action"><?php _e( 'Submit settings', 'sls-plugins' ); ?></button>
    </form>
</div>
