<?php
if ( ! array_key_exists( 'event_id', $_GET ) || ( empty( $event_id = $_GET['event_id'] ) && $_GET['event_id'] != 0 ) ) {
	wp_die( "Something went wrong! No event defined." );
}

$event_data = $this->get_events( $event_id );
?>

<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
    <a class="page-title-action" href="<?php echo admin_url( "/admin.php?page=sls-event-manager" ); ?>">
		<?php _e( 'Cancel', 'sls-plugins' ); ?>
    </a>

    <form class="sls-plugin-form" id="eventEditAdd" method="post"
          action="<?php echo admin_url( "/admin.php?page=sls-event-manager&event_id=" . $event_id ); ?>">
		<?php wp_nonce_field( 'security-nonce', 'edit-or-add-event' ); ?>
        <label for="eventName"><?php _e( 'Name', 'sls-plugins' ); ?></label>
        <input type="text" name="<?php echo EVENT_NAME; ?>" id="eventName"
               value="<?php echo $event_data[ EVENT_NAME ]; ?>"
               placeholder="<?php _e( 'ex: Training', 'sls-plugins' ); ?>"/>
        <label for="eventDate"><?php _e( 'Date', 'sls-plugins' ); ?></label>
		<?php _e( 'Date', 'sls-plugins' ); ?> <input type="date" name="<?php echo EVENT_DATE; ?>" id="eventDate"
                                                       value="<?php echo $event_data[ EVENT_DATE ]; ?>"/>
		<?php _e( 'From', 'sls-plugins' ); ?> <input type="time" name="<?php echo EVENT_TIME_FROM; ?>"
                                                       id="eventTimeFrom"
                                                       value="<?php echo $event_data[ EVENT_TIME_FROM ]; ?>"/>
		<?php _e( 'To', 'sls-plugins' ); ?> <input type="time" name="<?php echo EVENT_TIME_TO; ?>" id="eventTimeTo"
                                                     value="<?php echo $event_data[ EVENT_TIME_TO ]; ?>"/>
        <label for="eventMaxParticipants"><?php _e( 'Maximum number of participants', 'sls-plugins' ); ?></label>
        <input type="number" min="1" max="99" name="<?php echo EVENT_MAX_PARTICIPANTS; ?>"
               value="<?php echo $event_data[ EVENT_MAX_PARTICIPANTS ]; ?>" id="eventMaxParticipants"/>
        <button class="page-title-action"><?php _e( 'Submit changes', 'sls-plugins' ); ?></button>
    </form>
</div>
