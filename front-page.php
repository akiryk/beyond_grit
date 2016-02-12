   <?php
/**
 * Custom home page based on underscore's page template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

get_header(); ?>
    
    <main id="main" class="content-main content-main--frontpage" role="main">

      <section id="critical-thinking" class="section section--fp">
        <div class="inner-section inner-section--fp">
        <?php
          // the loop
          $query = new WP_query( 'pagename=critical-thinking' );
          if ( $query->have_posts() ){
            while( $query->have_posts() ){
              $query->the_post();
              echo '<h2 class="section-title section-title--fp"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
              echo '<div class="entry-content--fp">';
              the_content();
              echo '</div>';
            }
          }

          wp_reset_postdata();
        ?>
        </div>
      </section>

      <section id="community" class="section section--fp">
        <div class="inner-section inner-section--fp">
        <?php
          // the loop
          $query = new WP_query( 'pagename=community-leadership-and-action' );
          if ( $query->have_posts() ){
            while( $query->have_posts() ){
              $query->the_post();
              echo '<div class="entry-content--fp-right"><h2 class="section-title section-title--fp"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
              the_content();
              echo '</div>';
            }
          }

          wp_reset_postdata();
        ?>

        </div>
      </section>
      <section id="social-emotional" class="section section--fp">
        <div class="inner-section inner-section--fp">
        <?php
          // the loop
          $query = new WP_query( 'pagename=social-and-emotional-development' );
          $services_id = $query->queried_object->ID;

          if ( $query->have_posts() ){
            while( $query->have_posts() ){
              $query->the_post();
              echo '<h2 class="section-title section-title--fp"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
              echo '<div class="entry-content--fp">';
              the_content();
              echo '</div>';
            }
          }

          /* Restore original post data */
          wp_reset_postdata();

        ?>
        </div>
      </section>

    </main><!-- #main -->

<?php get_footer(); ?>
