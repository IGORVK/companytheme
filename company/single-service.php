<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package company
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            while (have_posts()) : the_post(); ?>
                <div class="post-thumb">
                        <?php
                        add_filter('wp_get_attachment_image_attributes', function ($attr) {
                            $attr['class'] = 'img-responsive';
                            return $attr;
                        });
                        the_post_thumbnail('full'); ?>
                        <?php if ( is_active_sidebar( 'true_side' ) ) : ?>
                    <div id="true-side" class="sidebar">
                        <?php dynamic_sidebar( 'true_side' ); ?>
                        </div>
                            <div class="services-sub-categories">
                                <div class="app-top-service-block">
                                    <h1><?php the_title(); ?></h1>
                                    <span class="discription"><?php the_excerpt(); ?></span>

                                    <?php if ( $show_date ) : ?>
                                        <span class="date"> <?php the_time('j F Y'); ?></span>
                                    <?php endif; ?>

                                 </div>
                            </div>
                            <?php endif; ?>
                        </div>
                <?php   get_template_part('template-parts/content', get_post_format());
            endwhile; // End of the loop.
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();