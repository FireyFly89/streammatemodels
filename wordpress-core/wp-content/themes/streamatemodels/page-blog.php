<?php
/*
 * Template Name: Blog
 */
get_header();
$posts = ArticleStorage::get_instance()->get_posts(['posts_per_page' => 15]);
//$pagination = custom_pagination($posts->max_num_pages);
$join_us_at_post_number = 6;
$posts_output = 1;
?>

<section class="blog">
    <div class="blog__wrap">
        <div class="blog__list">
        <?php while ($posts->have_posts()) :
            $posts->the_post();
            $image_id = get_post_thumbnail_id(get_the_ID());
            $image_src = "";

            if (!empty($image_id)) {
                $image_src = wp_get_attachment_image_url($image_id, 'source');
            }
            ?>

            <article class="blog__item">
                <figure class="blog__img">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr(get_the_title($image_id)); ?>">
                    </a>
                </figure>
                <div class="blog__content__wrap">
                    <div class="blog__content">
                        <h3>
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                        </h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="btn--blue"><?php _e('Learn More', 'streamatemodels'); ?></a>
            </article>

        <?php
        if ($posts_output === 6 || ($posts->post_count < $join_us_at_post_number && $posts->post_count <= $posts_output)) {
            get_template_part( 'blocks/join-us' );
        }

        $posts_output++;
        endwhile;
        wp_reset_postdata();
        ?>
        </div>
    </div>

    <div class="blog__loadmore">
        <button class="btn--blue"><?php _e('Load More', 'streamatemodels'); ?></button>
    </div>
</section>
<?php
get_footer();
