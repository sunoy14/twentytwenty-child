<?php
// enqueue parent style and child theme style
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
function enqueue_parent_styles(){
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

register_sidebar( array(
	'name' => 'Primary Sidebar',
	'id' => 'primary_sidebar',
	'description' => 'Widgets placed here will appear in the primary sidebar',
	'before_widget' => '<div class="sidebar-widget primary-sidebar-widget">',
	'after_widget' => '</div> <!-- .primary-sidebar-widget -->',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>' 
) );

register_sidebar( array(
  'name' => '404 Page',
  'id' => '404',
  'description'  => __( 'Content for your 404 error page goes here.' ),
  'before_widget' => '<div id="error-box">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
) );

add_filter('twentytwenty_show_categories_in_entry_header', false);

add_action( 'wp_head', 'add_adsense_auto_ad' );
function add_adsense_auto_ad () { 
?>
	<script data-ad-client="ca-pub-8559548689605535" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php
}

// add yandex meta for verification by yandex
add_action( 'wp_head', 'add_yandex_meta' );
function add_yandex_meta () {
?>
	<meta name="yandex-verification" content="11fd64e7d48c89bf" />
<?php
}
