<?php
$events = "";

if (class_exists("EventManager")) {
	$event_subscriber = new EventManager();
	$events           = $event_subscriber->get_free_events();
}
?>

<div class="trainings">
    <div class="trainings__tab">Inscreva-se no nosso treinamento online!</div>
    <div class="trainings__wrapper">
        <p><?php _e( "Oferecemos treinamento on-line para iniciantes no Streamate, camgirls sem experiência ou com experiência em outras plataformas.
            O treinamento é totalmente gratuito e você permanecerá anônimo, basta se registrar abaixo!", 'streamatemodels' ); ?></p>

		<?php if ( ! empty( $events ) ) : ?>
            <form class="trainings__wrapper__form" action="" method="POST">
                <p><?php _e( "Escolha a data do treinamento:", 'streamatemodels' ); ?></p>
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
                           placeholder="<?php _e( 'Endereço de email', 'streamatemodels' ); ?>"/>
                </div>
                <button class="btn--blue" id="saveEvent"><?php _e( "enviar", 'streamatemodels' ); ?></button>
            </form>
		<?php else : ?>
            <div class="trainings__wrapper__form"><?php echo _e( 'Nenhum compromisso disponível no momento', 'streamatemodels' ); ?></div>
		<?php endif; ?>

        <p><?php _e( "Os treinamentos duram cerca de uma hora, geralmente usamos o Skype e as conversas são em Português.
             Para mais detalhes, envie uma mensagem para", 'streamatemodels' ); ?>
            <a href="mailto:walter@streamate.com">walter@streamate.com</a></p>
    </div>
</div>
