<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="<?php echo home_url($wp->request); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#eb6fbd">
    <meta name="msapplication-TileColor" content="#eb6fbd">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site__header">
        <div class="site__header__content" id="site__navigation">
            <div class="site__header__actions__wrap">
                <ul class="site__header__actions__icons">
                    <li>
                        <a href="skype:live:.cid.29de8971079b2e19?chat" class="site__header__actions__icons--small"><i class="fab fa-skype"></i>Contactez-nous par Skype maintenant!</a>
                        <a class="site__header__actions__icons--small" href="https://wa.me/352621419732" target="_blank">+352 621 419 732</a>
                        <a class="site__header__actions__icons--small" href="mailto:aura@streamate.com">aura@streamate.com</a>
                    </li>
                </ul>
                <div class="site__header__actions">
                    <a href="#hero" class="btn--blue"><?php _e('REJOIGNEZ', 'streamatemodels'); ?></a>
                    <a href="https://www.streamatemodels.com/smm/login.php" class="btn--main"><?php _e('CONNEXION', 'streamatemodels'); ?></a>
                </div>
            </div>
            <div class="site__header__nav">
                <div class="site__header__logo">
                    <a href="<?php echo home_url('/'); ?>">
                        <img src="<?php echo get_static_image('logo-dark.png'); ?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <?php wp_nav_menu([
                    'theme_location' => 'header-section',
                    'menu' => 'Header',
                    'menu_class'     => 'site__header__menu',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                ]); ?>
            </div>
        </div>
        <div class="site__header__logo--mobile">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_static_image('logo-dark.png'); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <div class="site__header__button">
            <button><span></span><span></span><span></span></button>
        </div>
        <div class="site__header__icons">
            <ul>
                <li>
                    <a href="skype:live:.cid.29de8971079b2e19?chat" class="site__header__icons--meta"><i class="fab fa-skype"></i>Skype</a>
                    <a class="site__header__icons--meta" href="https://wa.me/352621419732" target="_blank">+352 621 419 732</a>
                    <a class="site__header__icons--meta" href="mailto:aura@streamate.com">aura@streamate.com</a>
                </li>
            </ul>
        </div>
    </header>
