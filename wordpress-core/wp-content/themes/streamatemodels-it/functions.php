<?php
//$GOOGLE_ANALYTICS_KEY = 'GTM-KBG6JL3';
$GOOGLE_ANALYTICS_KEY = 'UA-178148683-1';
$FANBOT_CHAT_ID = '5e741e5201598b7208736a88';
const MONTHS_IT = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];

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

    // Global site tag
    wp_add_inline_script('tag-manager',
        'window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag("js", new Date());
        gtag("config", "' . $GOOGLE_ANALYTICS_KEY . '");'
    );

    if (!is_page('live-chat')) {
        // Fanbot chat
        add_action('wp_footer', function () {
            global $FANBOT_CHAT_ID;
            echo '<script>((w,d,s,url,id)=>{w.webChatConfig={url,id};
            t=d.createElement(s);t.src=url+"window/index.js";t.async=1;d.body.appendChild(t);
            })(window,document,"script","https://s3-eu-west-1.amazonaws.com/multichat.ai/web-chat/","' . $FANBOT_CHAT_ID . '");</script>';
        }, 9999);
    }

//    add_action( 'wp_head', 'google_tag_manager_head' );
//    function google_tag_manager_head($GOOGLE_ANALYTICS_KEY) { ?>
<!--        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
<!--                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
<!--                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
<!--                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
<!--            })(window,document,'script','dataLayer','GTM-KBG6JL3');</script>-->
<!---->
<!--    --><?php //}
}

add_action('wp_enqueue_scripts', 'load_child_scripts');
