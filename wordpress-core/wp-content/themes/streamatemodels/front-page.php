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
				<span><?php _e('REJOIGNEZ', 'streamatemodels'); ?></span>
				<span><?php _e('STREAMATE', 'streamatemodels'); ?></span>
			</div>
			<div class="join-us__form">
                <a href="#hero" class="btn--blue">REJOIGNEZ
                    STREAMATE</a>
			</div>
		</div>
	</section>

	<?php get_template_part( 'blocks/better-than-others' ); ?>

	<section class="cta">
		<div class="cta__wrap">
			<h3><?php _e("Nous pouvons vous offrir la meilleure expérience du live camming, mais ne nous croyez pas sur parole. Inscrivez-vous aujourd’hui gratuitement et découvrez combien d’argent vous pouvez gagner.", 'streamatemodels'); ?></h3>
			<a href="#work_with_us" class="btn--blue"><?php _e('CRÉEZ VOTRE COMPTE', 'streamatemodels'); ?></a>
		</div>
	</section>

	<?php get_template_part( 'blocks/why-us' ); ?>

	<section class="join-us" id="join-us">
		<div class="join-us__wrap">
			<div class="join-us__title">
				<span><?php _e('REJOIGNEZ', 'streamatemodels'); ?></span>
				<span><?php _e('STREAMATE', 'streamatemodels'); ?></span>
			</div>
			<div class="join-us__form">
                <a href="#hero" class="btn--blue">REJOIGNEZ
                    STREAMATE</a>
			</div>
		</div>
	</section>

	<?php get_template_part( 'blocks/become-webcam-model' ); ?>
	<?php get_template_part( 'blocks/steps' ); ?>
	<?php get_template_part( 'blocks/faq' ); ?>
	<?php get_template_part('blocks/testimonial'); ?>

	<section class="cta">
		<div class="cta__wrap">
			<h3><?php _e('Prêt à mélanger le business et le plaisir? Rejoignez la famille Streamate maintenant et commencez à gagner de l’argent dès aujourd’hui!', 'streamatemodels'); ?></h3>
			<a href="#work_with_us" class="btn--blue"><?php _e('CRÉEZ VOTRE COMPTE', 'streamatemodels'); ?></a>
		</div>
	</section>

	<?php get_template_part( 'blocks/contact-us' ); ?>
	<?php get_template_part( 'blocks/about-us' ); ?>
</div>

<?php get_footer(); ?>

 