<?php
/**
 * Template Name: Research Area
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

get_header(); ?>

<main id="main" class="content-main content-main--ra" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="inner-content inner-content--ra">
			<?php get_template_part( 'template-parts/content', 'research-area' ); ?>
		</div>

		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>

	<?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>