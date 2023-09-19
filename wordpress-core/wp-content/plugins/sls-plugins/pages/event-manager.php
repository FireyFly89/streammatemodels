<?php
if ( array_key_exists( 'event_del', $_GET ) && ( ! empty( $event_id = $_GET['event_del'] ) || $_GET['event_del'] == 0 ) ) {
	wp_redirect( admin_url( "/admin.php?page=sls-event-manager" ) );
	exit;
}

$events = $this->get_events();
?>

<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
    <a class="page-title-action" href="<?php echo admin_url( "/admin.php?page=sls-event-manager-new" ); ?>">
		<?php _e( 'Add new', 'sls-plugins' ); ?>
    </a>

    <form id="eventManager" method="post">
		<?php wp_nonce_field( 'security-nonce' ); ?>

        <table class="wp-list-table widefat fixed striped">
            <thead>
            <tr>
                <th><?php _e( 'ID', 'sls-plugins' ); ?></th>
                <th><?php _e( 'Name', 'sls-plugins' ); ?></th>
                <th><?php _e( 'Time range', 'sls-plugins' ); ?></th>
                <th><?php _e( 'Participants', 'sls-plugins' ); ?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

			<?php foreach ( $events as $id => $event ) : ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $event[ EVENT_NAME ]; ?></td>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 3px; font-weight: bold; padding: 0 4px;">
								<?php echo date( "Y-m-d", strtotime( $event[ EVENT_DATE ] ) ); ?>
                            </div>
                            <div style="margin-right: 4px; border: 1px solid #aaa; background-color: white; padding: 0 4px;">
								<?php echo date( "H:i", strtotime( $event[ EVENT_TIME_FROM ] ) ); ?>
                            </div>
                            -
                            <div style="margin-left: 4px; border: 1px solid #aaa; background-color: white; padding: 0 4px">
								<?php echo date( "H:i", strtotime( $event[ EVENT_TIME_TO ] ) ); ?>
                            </div>
                        </div>
                    </td>
                    <td>
						<?php if ( ! empty( $event['email'] ) && is_array( $event['email'] ) ) : ?>
                            <div style="color: green; font-weight: bold;"><?php _e(sprintf('%s participants: ', count( $event['email'] ))); ?></div>
							<?php foreach($event['email'] as $email) : ?>
								<span style="font-size: 12px;"><?php echo $email . ","; ?></span>
							<?php endforeach; ?>
						<?php else : ?>
                            <div style="color: red; font-weight: bold;"><?php echo _e( 'No participants yet', 'sls-plugins' ); ?></div>
						<?php endif; ?>
                    </td>
                    <td style="text-align: right;">
						<?php if ( empty( $event['email'] ) || ( is_array( $event['email'] ) && count( $event['email'] ) <= 0 ) ) : ?>
                            <a href="<?php echo admin_url( "/admin.php?page=sls-event-manager-edit&event_id=" . $id ); ?>">
                                <span class="dashicons dashicons-edit"></span>
                            </a>
						<?php endif; ?>

                        <a class="event-delete" href="#" data-event-id="<?php echo $id ?>">
                            <span class="dashicons dashicons-trash"></span>
                        </a>
                    </td>
                </tr>
			<?php endforeach; ?>

			<?php if ( count( $events ) <= 0 ) : ?>
                <tr>
                    <td colspan="4"><?php _e( "There aren't any events yet", 'sls-plugins' ); ?></td>
                </tr>
			<?php endif; ?>
            </tbody>
        </table>
    </form>

    <a class="page-title-action" href="<?php echo admin_url( "/admin.php?page=sls-event-manager-new" ); ?>">
		<?php _e( 'Add new', 'sls-plugins' ); ?>
    </a>
</div>
