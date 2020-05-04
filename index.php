<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main" class="clearfix">
	<div class="main-content clearfix">
		<?php

		$archive_title    = '';
		$archive_subtitle = '';

		if ( is_search() ) {
			global $wp_query;

			$archive_title = sprintf(
				'%1$s %2$s',
				'<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
				'&ldquo;' . get_search_query() . '&rdquo;'
			);

			if ( $wp_query->found_posts ) {
				$archive_subtitle = sprintf(
					/* translators: %s: Number of search results. */
					_n(
						'We found %s result for your search.',
						'We found %s results for your search.',
						$wp_query->found_posts,
						'twentytwenty'
					),
					number_format_i18n( $wp_query->found_posts )
				);
			} else {
				$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
			}
		} elseif ( ! is_home() ) {
			$archive_title    = get_the_archive_title();
			$archive_subtitle = get_the_archive_description();
		}

		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
		?>
				<div class="archive-excerpts">
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
				</div> <!-- .archive-excerpts -->
		<?php

			}
		} elseif ( is_search() ) {
			?>

			<div class="no-search-results-form section-inner thin">

				<?php
				get_search_form(
					array(
						'label' => __( 'search again', 'twentytwenty' ),
					)
				);
				?>

			</div><!-- .no-search-results -->

			<?php
		}
		?>

		<?php get_template_part( 'template-parts/pagination' ); ?>

	</div> <!-- .main-content -->
	
	<?php get_sidebar( 'primary' ); ?>

</main><!-- #site-content -->

<?php 

get_template_part( 'template-parts/footer-menus-widgets' );

get_footer();
