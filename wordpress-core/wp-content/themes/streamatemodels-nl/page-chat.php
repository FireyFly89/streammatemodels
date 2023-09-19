<?php
/*
 * Template Name: Chat
 */
get_header();
?>
<section class="chat">
	<div id="multichat-chat-box"></div>
	<script>
        ((w,d,s,url,id)=>{w.webChatConfig={url,id};
            t=d.createElement(s);t.src=url+'embedded/index.js';t.async=1;d.body.appendChild(t);
        })(window,document,'script','https://s3-eu-west-1.amazonaws.com/multichat.ai/web-chat/','5e741e5201598b7208736a88');
	</script>
</section>
<?php
get_footer();
