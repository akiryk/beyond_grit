<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package beyond_grit
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function beyond_grit_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'beyond_grit_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function beyond_grit_jetpack_setup
add_action( 'after_setup_theme', 'beyond_grit_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function beyond_grit_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function beyond_grit_infinite_scroll_render
