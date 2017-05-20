<?php
/**
 * Template Name: Participating Organizations
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

get_header(); ?>

<main id="main" class="content-main content-main--po" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="inner-content inner-content--po">
			<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<div id="map"></div>

		</div>

	<?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>