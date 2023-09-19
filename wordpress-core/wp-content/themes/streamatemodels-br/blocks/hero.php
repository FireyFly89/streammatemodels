<section class="hero" id="hero">
    <div class="hero__overlay">
        <img src="<?php echo get_static_image('banner.jpg'); ?>"
             alt="<?php _e('Herói', 'streamatemodels'); ?>">
    </div>
    <div class="hero__main">
        <div class="hero__content">
            <h1><?php _e("Pronta para ganhar muito dinheiro?", 'streamatemodels'); ?></h1>
            <p><?php _e('A Streamate Models oferece a maior comunidade de webcams adultas do mundo. Junte-se a nós agora para ganhar dinheiro em casa.', 'streamatemodels'); ?></p>
            <div class="hero__content__form fade-on-scroll" data-fade="in" id="1">
                <p><?php _e("Você está pronta? Digite seu e-mail ou número de telefone abaixo e entraremos em contato com os detalhes!", 'streamatemodels'); ?></p>

                <?php echo do_shortcode('[contact-form-7 id="6"]'); ?>
            </div>
        </div>
        <div class="hero__promotion">
            <p>
                <?php _e("Renda superior do mês", 'streamatemodels'); ?>
                <span><?php echo get_intl_previous_month(MONTHS_BR); ?></span>
            </p>
            <h2><?php _e('R$ 50,000', 'streamatemodels'); ?></h2>
        </div>
    </div>
</section>
