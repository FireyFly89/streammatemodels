<?php
$events = "";

if (class_exists("EventManager")) {
	$event_subscriber = new EventManager();
	$events           = $event_subscriber->get_free_events();
}
?>

<div class="trainings">
    <div class="trainings__tab">Inscrivez-vous à notre formation en ligne!</div>
    <div class="trainings__wrapper">
        <p><?php _e( "We bieden online training voor nieuwkomers op Streamate, voor onervaren camgirls of met ervaring op andere platforms.
            De trainingen zijn volledig gratis en u blijft anoniem, u moet u alleen maar hieronder in te schrijven!", 'streamatemodels' ); ?></p>

		<?php if ( ! empty( $events ) ) : ?>
            <form class="trainings__wrapper__form" action="" method="POST">
                <p><?php _e( "Kies de datum van de training:", 'streamatemodels' ); ?></p>
                <div class="trainings__wrapper__form__row">
                    <select id="dateTimeList" name="date" class="trainings__wrapper__form__row__select"
                            aria-required="true">

						<?php foreach ( $events as $event_date => $events_data ) : ?>
                            <optgroup label="<?php echo $event_date; ?>">

								<?php foreach ( $events_data as $event_id => $event_time ) : ?>
                                    <option value="<?php echo $event_id; ?>"><?php echo $event_time; ?></option>
								<?php endforeach; ?>

                            </optgroup>
						<?php endforeach; ?>

                    </select>
                </div>
                <div class="trainings__wrapper__form__row">
                    <input id="email_trainings" type="email" class="trainings__wrapper__form__row__input"
                           placeholder="<?php _e( 'E-mailadres', 'streamatemodels' ); ?>"/>
                </div>
                <button class="btn--blue" id="saveEvent"><?php _e( "Stuur", 'streamatemodels' ); ?></button>
            </form>
		<?php else : ?>
            <div class="trainings__wrapper__form"><?php echo _e( 'Momenteel is er geen afspraak beschikbaar', 'streamatemodels' ); ?></div>
		<?php endif; ?>

        <p><?php _e( "De training duurt ongeveer een uur, we gebruiken meestal Skype en de discussies zijn in het Nederlands.
            Voor meer details kunt u een bericht sturen naar ", 'streamatemodels' ); ?>
            <a href="mailto:aura@streamate.com">aura@streamate.com</a></p>
    </div>
</div>
