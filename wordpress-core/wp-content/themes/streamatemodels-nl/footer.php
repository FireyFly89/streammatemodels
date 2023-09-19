    <footer class="site__footer__wrap">
        <div class="site__footer">
            <div class="site__footer__logo">
                <img src="<?php echo get_static_image('logo-footer@2x.png'); ?>" alt="<?php bloginfo('description'); ?>">
            </div>
            <div class="site__footer__content">
                <div class="site__footer__social-links">
                    <a href="https://www.facebook.com/StreamateEurope" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/StreamateEurope" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/streamateeurope/" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <p><?php echo sprintf(__('Copyright & kopiëren; %s ICF Technology, Inc. | Alle rechten voorbehouden.', 'streamatemodels'), date('Y')); ?></p>
            </div>
            <?php wp_nav_menu([
                'theme_location' => 'footer-section',
                'menu' => 'Footer',
                'menu_class'     => 'site__footer__nav',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ]); ?>
        </div>
    </footer>
    <div id='fb-root'></div>

    <?php wp_footer(); ?>
    </body>
</html>
