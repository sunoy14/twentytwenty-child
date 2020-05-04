<?php
/**
 * Template Name: Custom SideBar
 * The custom template for adding sidebar in twentytwenty.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main"> </main><!-- #site-content -->

<div class="sidebar">
	dynamic_sidebar( '404' );
</div> <!-- .sidebar -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
