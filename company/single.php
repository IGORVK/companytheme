<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package company
 */

/*
 *
 * */
if( in_category('Renovation', $post ) ){
	include 'single-renovation.php';
}elseif (in_category('Services', $post)){
	include 'single-service.php';
}
else {
			get_header(); ?>


			<?php
			get_sidebar();
			get_footer();
}


