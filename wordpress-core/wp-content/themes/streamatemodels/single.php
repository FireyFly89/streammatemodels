<?php
get_header();
the_post();
global $wp;

ArticleStorage::get_instance()->add_articles([get_the_ID()]);
$posts = ArticleStorage::get_instance()->get_posts(['posts_per_page' => 3]);
//$pagination = custom_pagination($posts->max_num_pages);
?>

<div class="page-body page-single" role="main">
    <div class="article__header">
        <a href="<?php echo home_url('/blog'); ?>">
            <img src="<?php echo get_static_image('arrow.svg') ?>" alt="arrow" class="svg">
            <?php _e('Back to posts', 'streamatemodels'); ?>
        </a>
    </div>
    <article id="post-<?php the_ID(); ?>" class="article">
        <figure class="article__img">
            <img src="https://images.unsplash.com/photo-1593265023836-502b46fd1bda?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="">
        </figure>
        <div class="article__content">
            <h1 class="article__title"><?php echo get_the_title(); ?></h1>
            <?php the_content(); ?>

            <div class="article__share">
                <a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=" . get_the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="<?php echo "https://twitter.com/intent/tweet?url=" . get_the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </article>
    <aside class="blog__readmore">
        <div class="blog__readmore__title"><?php _e('Read More', 'streamatemodels'); ?></div>

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
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </aside>
</div>

<?php get_footer(); ?>
