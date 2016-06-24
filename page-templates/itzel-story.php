<?php
/**
 * Template Name: Itzel Story
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

get_header(); ?>

<main id="main" class="content-main content-main--page" role="main">

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="inner-content inner-content--page">
      <?php get_template_part( 'template-parts/content', 'itzel-story' ); ?>

      <?php
      echo '<div class="download-message">';
      $downloadMsg = get_post_meta(get_the_ID(), 'download-message', true);
      $downloadCTA = get_post_meta(get_the_ID(), 'download-cta', true);
      $downloadURL = get_post_meta(get_the_ID(), 'download-url', true);
      echo '<div>' . $downloadMsg . '</div>';
      echo '<a href="' . $downloadURL . '" class="download-link shadowed">' . $downloadCTA . '</a>';
      echo '</div>';
     ?>
    </div>

  <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>