<section class="hero" id="hero">
    <div class="hero__overlay">
        <img src="<?php echo get_static_image('banner.jpg'); ?>"
             alt="<?php _e('Hero', 'streamatemodels'); ?>">
    </div>
    <div class="hero__main">
        <div class="hero__content">
            <h1><?php _e("Bent u klaar om veel geld te verdienen?", 'streamatemodels'); ?></h1>
            <p><?php _e('Streamate Models biedt u de grootste webcamgemeenschap voor volwassenen ter wereld. Word nu lid en verdien echt geld vanuit huis.', 'streamatemodels'); ?></p>
            <div class="hero__content__form fade-on-scroll" data-fade="in" id="1">
                <p><?php _e("Bent u klaar? Vul hieronder uw e-mail of telefoonnummer in en we nemen contact met u op met de details!", 'streamatemodels'); ?></p>

                <?php echo do_shortcode('[contact-form-7 id="17"]'); ?>
            </div>
        </div>
        <div class="hero__promotion">
            <p>
                <?php _e("De beste inkomsten van de maand", 'streamatemodels'); ?>
                <span><?php echo get_intl_previous_month(MONTHS_NL); ?></span>
            </p>
            <h2><?php _e('50,000€', 'streamatemodels'); ?></h2>
        </div>
    </div>
</section>
