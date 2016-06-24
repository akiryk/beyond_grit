<?php
/**
 * Template part for displaying page content in itzel-story.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ' contain ' ); ?>>
  <header class="entry-header">
    <?php
      $subhead = get_post_meta(get_the_ID(), 'sub-heading', true);
      echo '<h3 class="page-slug">' . $subhead . '</h3>';
    ?>
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beyond_grit' ),
        'after'  => '</div>',
      ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php
      edit_post_link(
        sprintf(
          /* translators: %s: Name of current post */
          esc_html__( 'Edit %s', 'beyond_grit' ),
          the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ),
        '<span class="edit-link">',
        '</span>'
      );
    ?>
  </footer><!-- .entry-footer -->

</article><!-- #post-## -->