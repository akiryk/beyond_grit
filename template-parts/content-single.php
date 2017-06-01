<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="blog-entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="blog-entry-meta">
			<?php beyond_grit_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="blog-entry-content">
		<?php the_content(); ?>
		<?php
			 // Next/prev post links
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beyond_grit' ),
					'after'  => '</div>',
				) );

		?>
	</div><!-- .entry-content -->

	<footer class="blog-entry-footer">
		<?php beyond_grit_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

