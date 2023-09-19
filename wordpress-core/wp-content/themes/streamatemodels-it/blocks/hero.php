<section class="hero" id="hero">
    <div class="hero__overlay">
        <img src="<?php echo get_static_image('banner-it.jpg'); ?>"
             alt="<?php _e('Eroe', 'streamatemodels'); ?>">
    </div>
    <div class="hero__main">
        <div class="hero__content">
            <h1><?php _e("Pronta a fare un sacco di soldi?", 'streamatemodels'); ?></h1>
            <p><?php _e('Streamate Models ti offre la più grande comunità di webcam per adulti del mondo. Unisciti a noi per guadagnare soldi direttamente da casa tua.', 'streamatemodels'); ?></p>
            <div class="hero__content__form fade-on-scroll" data-fade="in" id="1">
                <p><?php _e("Siete pronti? Inserisci il tuo indirizzo e-mail o il tuo numero di telefono qui sotto e ti contatteremo con più dettagli!", 'streamatemodels'); ?></p>

                <?php echo do_shortcode('[contact-form-7 id="6"]'); ?>
            </div>
        </div>
        <div class="hero__promotion">
            <p>
                <?php _e("Le entrate del mese più alte", 'streamatemodels'); ?>
                <span><?php echo get_intl_previous_month(MONTHS_IT); ?></span>
            </p>
            <h2><?php _e('50,000€', 'streamatemodels'); ?></h2>
        </div>
    </div>
</section>
