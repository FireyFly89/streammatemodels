<?php
/*
Template Name: Front-page
*/
get_header();
get_template_part( 'blocks/popup' );
get_template_part( 'blocks/trainings' );
?>

<div class="page-body" role="main">
	<?php get_template_part( 'blocks/hero' ); ?>
	<?php get_template_part( 'blocks/calculator' ); ?>
	<?php get_template_part( 'blocks/work-with-us' ); ?>

	<section class="join-us" id="join_us">
		<div class="join-us__wrap">
			<div class="join-us__title">
				<span><?php _e('ENTRAR', 'streamatemodels'); ?></span>
				<span><?php _e('STREAMATE', 'streamatemodels'); ?></span>
			</div>
			<div class="join-us__form">
                <?php echo do_shortcode('[contact-form-7 id="6"]'); ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'blocks/better-than-others' ); ?>

	<section class="cta">
		<div class="cta__wrap">
			<h3><?php _e("Podemos oferecer a melhor experiência de live camming. Teste agora mesmo! Inscreva-se gratuitamente hoje e descubra quanto dinheiro você pode ganhar.", 'streamatemodels'); ?></h3>
			<a href="#work_with_us" class="btn--blue"><?php _e('CRIE SUA CONTA', 'streamatemodels'); ?></a>
		</div>
	</section>

	<?php get_template_part( 'blocks/why-us' ); ?>

	<section class="join-us" id="join-us">
		<div class="join-us__wrap">
			<div class="join-us__title">
				<span><?php _e('ENTRAR', 'streamatemodels'); ?></span>
				<span><?php _e('STREAMATE', 'streamatemodels'); ?></span>
			</div>
			<div class="join-us__form">
                <?php echo do_shortcode('[contact-form-7 id="6"]'); ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'blocks/become-webcam-model' ); ?>
	<?php get_template_part( 'blocks/steps' ); ?>
	<?php get_template_part( 'blocks/faq' ); ?>
	<?php get_template_part('blocks/testimonial'); ?>

	<section class="cta">
		<div class="cta__wrap">
			<h3><?php _e('Pronta para misturar negócios e prazer? Junte-se à família Streamate agora e comece a ganhar dinheiro hoje!', 'streamatemodels'); ?></h3>
			<a href="#work_with_us" class="btn--blue"><?php _e('CRIE SUA CONTA', 'streamatemodels'); ?></a>
		</div>
	</section>

	<?php get_template_part( 'blocks/contact-us' ); ?>
	<?php get_template_part( 'blocks/about-us' ); ?>
</div>

<?php get_footer(); ?>

 