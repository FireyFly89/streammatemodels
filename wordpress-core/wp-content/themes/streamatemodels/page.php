<?php
/*
  Template Name: Normal page
*/

get_header();
the_post();
?>

<div class="page-body" role="main">
    <div class="page__content__wrap">
        <article class="page__content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </article>
    </div>
</div>

<?php get_footer(); ?>
