<?php
/**
 * A special and optional template for the index of posts.
 *
 * If you use this template, it will be used in place of index.php for
 * displaying posts — not pages. Home.php will not replace front-page.php
 * and is not a static home page. 
 *
 * Use home.php if you want to have a custom display for the main
 * blog aggregation page that's distinct from what would otherwise
 * be displayed by index.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="content-main" role="main">
    <?php if ( have_posts() ) : ?>

      <?php if ( is_home() && ! is_front_page() ) : ?>
        <header>
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
      <?php endif; ?>

      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php

          /*
           * Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'template-parts/content', get_post_format() );
        ?>

      <?php endwhile; ?>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
