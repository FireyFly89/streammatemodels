<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
    <a class="page-title-action" href="<?php echo admin_url( "/admin.php?page=sls-event-manager" ); ?>">
		<?php _e( 'Cancel', 'sls-plugins' ); ?>
    </a>

    <form class="sls-plugin-form" id="eventEditAdd" method="post"
          action="<?php echo admin_url( "/admin.php?page=sls-event-manager" ); ?>">
		<?php wp_nonce_field( 'security-nonce', 'edit-or-add-event' ); ?>
        <label for="eventName"><?php _e( 'Name', 'sls-plugins' ); ?></label>
        <input type="text" name="<?php echo EVENT_NAME; ?>" id="eventName"
               placeholder="<?php _e( 'ex: Training', 'sls-plugins' ); ?>"/>
        <label for="eventDate"><?php _e( 'Date', 'sls-plugins' ); ?></label>
		<?php _e( 'Date', 'sls-plugins' ); ?> <input type="date" name="<?php echo EVENT_DATE; ?>" id="eventDate"/>
		<?php _e( 'From', 'sls-plugins' ); ?> <input type="time" name="<?php echo EVENT_TIME_FROM; ?>"
                                                       id="eventTimeFrom"/>
		<?php _e( 'To', 'sls-plugins' ); ?> <input type="time" name="<?php echo EVENT_TIME_TO; ?>" id="eventTimeTo"/>
        <label for="eventMaxParticipants"><?php _e( 'Maximum number of participants', 'sls-plugins' ); ?></label>
        <input type="number" min="1" max="99" name="<?php echo EVENT_MAX_PARTICIPANTS; ?>" id="eventMaxParticipants"/>
        <button class="page-title-action"><?php _e( 'Submit event', 'sls-plugins' ); ?></button>
    </form>
</div>
