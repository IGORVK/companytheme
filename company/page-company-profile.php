<!--
<div class="app-block stadtard-block">
    <p><span style="font-size:48px">Thinking about a renovation?</span></p>

<p>If you are thinking about renovating or extending your home, you want a professional. At Hammer T Inc. we carry over 15 years of contracting experience with us into every project – ensuring that your home receives the expert attention it deserves. Our brand is committed to learning and constantly improving our methods and services so we can pass down our knowledge to your contracting project. It’s our goal to make sure you are satisfied from start to finish. Our friendly, skilled, and licensed staff are highly trained and prepared to handle any inquiries you may have about our processes.</p>

<p>Our commitment to learning manifests itself in our state of the art techniques and our wide array of available contracting services. We are proficient in everything from miscellaneous electrical, plumbing and dry wall services to full home renovations. Your home is one of your most valuable possessions. Our team understands this to the fullest, which is why we are so committed to being the best and up-to-date in all aspects of home contracting.</p>

<p><img alt="" src="<?php /*bloginfo(template_url) */?>/images/company.jpg" ></p>

<p>Our company is proud to say that we also perform environmentally conscious work. We are always ready to suggest energy efficient solutions to your problems, saving you money in the long-term. It’s our job to be the experts in your home renovation project, and we take that role seriously. We want to deliver you the best service possible, encompassing everything from the quality of the work to the recommendations we make for your benefit.</p>

</div>-->

<?php /*get_footer(); */?>


<?php get_header(); ?>




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

            <div class="services-sub-categories">
                <div class="app-top-block">
                    <h1><?php the_title(); ?></h1>
                    <span class="discription"><?php the_excerpt(); ?></span>

                    <?php if ( $show_date ) : ?>
                    <span class="date"> <?php the_time('j F Y'); ?></span>
                    <?php endif; ?>

                </div>
            </div>

        </div>





        <?php get_template_part('template-parts/content', get_post_format());

        //the_post_navigation();

        // If comments are open or we have at least one comment, load up the comment template.
        /*    if (comments_open() || get_comments_number()) :
                comments_template();
            endif;*/

        endwhile; // End of the loop.
        ?>





    </main><!-- #main -->
</div><!-- #primary -->



<?php
get_footer();?>
