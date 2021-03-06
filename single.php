<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package beyond_grit
 */

get_header(); ?>
<?php 
	if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
	  <div class="blog-wrapper has-sidebar"> 
  <?php else : ?>
		<div class="blog-wrapper no-sidebar"> 
<?php endif; ?>
	<div id="primary" class="blog-content-area">
		<main id="main" class="blog-content-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php //the_post_navigation(); ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
</script>
<?php get_footer(); ?>
