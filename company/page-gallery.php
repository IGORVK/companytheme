<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Post-page gallery
            ========================================== -->
			<?php
			global $paged;
			if(is_page('gallery')) : $my_query = new WP_Query('pagename=gallery'); // тут надо указать название требуемой page
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="wrap-post" >
					<div class="post-gallery" >
						<!--<h1><?php /*the_title(); */?></h1>-->
						<?php the_content(' '); ?>
					</div>
				</div>
			<?php endwhile; ?>
			<?php endif; ?><!-- /.post-page gallery -->

<!--
Gallery content=========================================================================================================
-->			<?php
			$s = new WP_Query(  array(
				'category_name'       => 'renovation',
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
			) );

			query_posts('cat=3');?>

<div class="wrap-gallery">
			<?php if ( $s->have_posts() ) : while ($s->have_posts() ) :  $s->the_post();
				?>

				<!--post category our services-->

				<div class="service">
					<?php if ( has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail('large-thumbnail'); ?>
						</a>
					<?php endif; ?>
					<div class="service-post">
						<h2 class="article-title"><a  href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
<!--						<?php /*the_excerpt() */?>
						<p>
							<?php /*if ( $show_date ) : */?>
								<span class="date"> <?php /*the_time('j F Y'); */?></span>
							<?php /*endif; */?>
						</p>-->
					</div>
				</div><!-- /.col-lg-4 -->

			<?php  endwhile; ?>
				<!--post navigation-->
			<?php else: ?>
				<!--no posts found-->
			<?php endif; ?>

</div>
<!--
End Gallery content=====================================================================================================
   -->

		</main><!-- #main -->


	</div><!-- #primary -->

<?php get_footer(); ?>