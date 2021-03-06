<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

get_header(); ?>

<main id="main" class="content-main content-main--page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="inner-content inner-content--page">
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
		</div>

	<?php endwhile; // End of the loop. ?>

</main><!-- #main -->
<?php //No sidebar on pages; only on blog posts ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
