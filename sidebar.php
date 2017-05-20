<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beyond_grit
 */
if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
  return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
</div><!-- #secondary -->
