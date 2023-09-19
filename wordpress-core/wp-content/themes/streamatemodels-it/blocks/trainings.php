<?php
$events = "";

if (class_exists("EventManager")) {
	$event_subscriber = new EventManager();
	$events           = $event_subscriber->get_free_events();
}
?>

<div class="trainings">
    <div class="trainings__tab">Registrati alla nostra formazione online!</div>
    <div class="trainings__wrapper">
        <p><?php _e( "Offriamo un training online per le nuove arrivate in Streamate, camgirls con o senza esperienza o con esperienza su altre piattaforme.\n
            I corsi di formazione sono completamente gratuiti e rimarrai anonima, devi solo registrarti qui sotto!", 'streamatemodels' ); ?></p>

		<?php if ( ! empty( $events ) ) : ?>
            <form class="trainings__wrapper__form" action="" method="POST">
                <p><?php _e( "Scegliere la data del corso:", 'streamatemodels' ); ?></p>
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
                           placeholder="<?php _e( 'Indirizzo e-mail', 'streamatemodels' ); ?>"/>
                </div>
                <button class="btn--blue" id="saveEvent"><?php _e( "invia", 'streamatemodels' ); ?></button>
            </form>
		<?php else : ?>
            <div class="trainings__wrapper__form"><?php echo _e( 'Nessun appuntamento disponibile al momento', 'streamatemodels' ); ?></div>
		<?php endif; ?>

        <p><?php _e( "I corsi di formazione durano circa un'ora, di solito usiamo Skype e le discussioni sono in italiano.\n
            Per ulteriori dettagli, si prega di inviare un messaggio ", 'streamatemodels' ); ?>
            <a href="mailto:carmen@streamate.com">carmen@streamate.com</a></p>
    </div>
</div>
