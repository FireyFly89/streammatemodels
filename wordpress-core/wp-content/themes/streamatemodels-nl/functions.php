<?php
$GOOGLE_ANALYTICS_KEY = 'UA-150284368-1';
$FANBOT_CHAT_ID = '5e741e5201598b7208736a88';
const MONTHS_NL = ['Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December'];

function load_child_scripts()
{
    global $GOOGLE_ANALYTICS_KEY;
    $main_theme_handle = 'main-style';
    $main_theme = wp_get_theme();

    // Load parent and child stylesheet, child waits for parent as dependency
    wp_enqueue_style($main_theme_handle, get_template_directory_uri() . '/style.css', [], $main_theme->parent()->get('Version'));
    wp_enqueue_style('child-style', get_stylesheet_uri(), [$main_theme_handle], $main_theme->get('Version'));

    // Google tag manager
    wp_enqueue_script('tag-manager', 'https://www.googletagmanager.com/gtag/js?id=' . $GOOGLE_ANALYTICS_KEY);

    if (!is_page('live-chat')) {
        // Fanbot chat
        add_action('wp_footer', function () {
            global $FANBOT_CHAT_ID;
            echo '<script>((w,d,s,url,id)=>{w.webChatConfig={url,id};
            t=d.createElement(s);t.src=url+"window/index.js";t.async=1;d.body.appendChild(t);
            })(window,document,"script","https://s3-eu-west-1.amazonaws.com/multichat.ai/web-chat/","' . $FANBOT_CHAT_ID . '");</script>';
        }, 9999);
    }

    // Google tag manager settings
    wp_add_inline_script('global-site-tag',
        'window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag("js", new Date());
        gtag("config", "' . $GOOGLE_ANALYTICS_KEY . '");'
    );
}

add_action('wp_enqueue_scripts', 'load_child_scripts');
