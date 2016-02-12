<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package beyond_grit
 */

get_header(); ?>

<main id="main" class="content-main content-main--page" role="main">
	<div class="inner-content inner-content--page">
		<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'beyond_grit' ); ?></h1>
				</header><!-- .page-header -->
	</div>
</main><!-- #main -->

<?php get_footer(); ?>