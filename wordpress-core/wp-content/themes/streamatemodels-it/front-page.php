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
	<?php get_template_part( 'blocks/join-us' ); ?>
	<?php get_template_part( 'blocks/better-than-others' ); ?>

	<section class="cta">
		<div class="cta__wrap">
			<h3><?php _e("Possiamo offrirti la migliore esperienza di live camming, ma non crederci sulla parola. Iscriviti oggi stesso gratuitamente e scopri quanti soldi puoi guadagnare.", 'streamatemodels'); ?></h3>
			<a href="#hero" class="btn--blue"><?php _e('CREA IL TUO ACCOUNT', 'streamatemodels'); ?></a>
		</div>
	</section>

	<?php get_template_part( 'blocks/why-us' ); ?>
	<?php get_template_part( 'blocks/join-us' ); ?>
	<?php get_template_part( 'blocks/become-webcam-model' ); ?>
	<?php get_template_part( 'blocks/steps' ); ?>
	<?php get_template_part( 'blocks/faq' ); ?>
	<?php get_template_part('blocks/testimonial'); ?>

	<section class="cta">
		<div class="cta__wrap">
			<h3><?php _e('Pronti a mischiare affari e piacere? Unisciti alla famiglia Streamate e inizia a fare soldi oggi stesso!', 'streamatemodels'); ?></h3>
			<a href="#hero" class="btn--blue"><?php _e('CREA IL TUO ACCOUNT', 'streamatemodels'); ?></a>
		</div>
	</section>

	<?php get_template_part( 'blocks/contact-us' ); ?>
	<?php get_template_part( 'blocks/about-us' ); ?>
</div>

<?php get_footer(); ?>
