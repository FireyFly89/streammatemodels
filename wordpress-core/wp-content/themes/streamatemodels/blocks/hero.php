<section class="hero" id="hero">
    <div class="hero__overlay">
        <img src="<?php echo get_static_image('banner.jpg'); ?>"
             alt="<?php _e('Hero', 'streamatemodels'); ?>">
    </div>
    <div class="hero__main">
        <div class="hero__content">
            <h1><?php _e("Prêt à gagner beaucoup d'argent?", 'streamatemodels'); ?></h1>
            <p><?php _e('Streamate Models vous offre la plus grande communauté de webcam pour adultes du monde. Rejoignez-nous maintenant pour gagner de l’argent de chez vous.', 'streamatemodels'); ?></p>
            <div class="hero__content__form fade-on-scroll" data-fade="in" id="1">
                <p><?php _e("Vous êtes prêt? Entrez votre email ou numéro de téléphone ci-dessous et nous vous contacterons avec les détails!", 'streamatemodels'); ?></p>

                <?php echo do_shortcode('[contact-form-7 id="6"]'); ?>
            </div>
        </div>
        <div class="hero__promotion">
            <p>
                <?php _e("Le Top des revenus du mois", 'streamatemodels'); ?>
                <span><?php echo get_intl_previous_month(MONTHS_FR); ?></span>
            </p>
            <h2><?php _e('50,000€', 'streamatemodels'); ?></h2>
        </div>
    </div>
</section>
