<?php
/**
 * Custom home page based on underscore's page template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="content-main" role="main">

      <section id="hero" class="section section--hero">
        <h1>This is the hero section</h1>
        <?php wp_nav_menu( array ( 'menu' => 'Front Page Menu' ) ); ?>
      </section>

    <section id="critical-thinking" class="section">
        <div class="indent">

          <?php
            // the loop
            $query = new WP_query( 'pagename=critical-thinking' );
            if ( $query->have_posts() ){
              while( $query->have_posts() ){
                $query->the_post();
                echo '<h2 class="section-title">' . get_the_title() . '</h2>';
                echo '<div class="entry-content">';
                the_content();
                echo '</div>';
              }
            }

            wp_reset_postdata();
          ?>

        </div>
      </section>

      <section id="community" class="section">
        <div class="indent">
          <?php
            // the loop
            $query = new WP_query( 'pagename=community-leadership-and-action' );
            if ( $query->have_posts() ){
              while( $query->have_posts() ){
                $query->the_post();
                echo '<h2 class="section-title">' . get_the_title() . '</h2>';
                echo '<div class="entry-content">';
                the_content();
                echo '</div>';
              }
            }

            wp_reset_postdata();
          ?>

        </div>
      </section>
      <section id="social-emotional" class="section">
        <div class="indent clear">

          <?php
            // the loop
            $query = new WP_query( 'pagename=social-and-emotional-development' );
            $services_id = $query->queried_object->ID;

            if ( $query->have_posts() ){
              while( $query->have_posts() ){
                $query->the_post();
                echo '<h2 class="section-title">' . get_the_title() . '</h2>';
                echo '<div class="entry-content">';
                the_content();
                echo '</div>';
              }
            }

            /* Restore original post data */
            wp_reset_postdata();

            /* Get the children of the Services page */
            /*
            $args = array(
                'post_type' => 'page',
                'post_parent' => $services_id
            );

            $services_query = new WP_query( $args );

            if ( $services_query->have_posts() ){
              echo '<ul class="services-list">';
              while( $services_query->have_posts() ){
                $services_query->the_post();
                echo '<li class="clear">';
                  echo '<a href="' . get_permalink() . '" title="Learn more about ' . get_the_title() .'">';
                  echo '<h3 class="services-title">' . get_the_title() . '</h3>';
                  echo '</a>';
                  echo '<div class="services-lede">';
                    the_content('My custom read more...');
                  echo '</div>';
                echo '</li>';
              }
              echo '</ul>';
            }
            */

          ?>

        </div>
      </section>
      <section id="organizational-culture" class="section">
        <div class="indent">

           <?php
            // the loop
            $query = new WP_query( 'pagename=organizational-culture' );
            if ( $query->have_posts() ){
              while( $query->have_posts() ){
                $query->the_post();
                echo '<h2 class="section-title">' . get_the_title() . '</h2>';
                echo '<div class="entry-content">';
                the_content();
                echo '</div>';
              }
            }

            wp_reset_postdata();
          ?>

        </div>
      </section>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
