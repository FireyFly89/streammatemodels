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
        <p><?php _e( "Nous proposons des formations en ligne pour les nouveaux arrivants sur Streamate, camgirls sans expérience ou avec expérience sur d'autres platesformes.
            Les formations sont entièrement gratuites et vous resterez anonyme, il vous suffit de vous inscrire ci-dessous!", 'streamatemodels' ); ?></p>

		<?php if ( ! empty( $events ) ) : ?>
            <form class="trainings__wrapper__form" action="" method="POST">
                <p><?php _e( "Choisissez la date de la formation:", 'streamatemodels' ); ?></p>
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
                           placeholder="<?php _e( 'Adresse Email', 'streamatemodels' ); ?>"/>
                </div>
                <button class="btn--blue" id="saveEvent"><?php _e( "envoyer", 'streamatemodels' ); ?></button>
            </form>
		<?php else : ?>
            <div class="trainings__wrapper__form"><?php echo _e( 'Aucun rendez-vous disponible pour le moment', 'streamatemodels' ); ?></div>
		<?php endif; ?>

        <p><?php _e( "Les formations durent environ une heure, nous utilisons habituellement Skype et les discussions sont en français.
            Pour plus de détails, veuillez envoyer un message à ", 'streamatemodels' ); ?>
            <a href="mailto:aura@streamate.com">aura@streamate.com</a></p>
    </div>
</div>
