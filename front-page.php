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

      <section id="welcome" class="section section__welcome">
        <h1 class="welcome-title">Powerful Youth, Powerful Communities</h1>
        <a href="#" class="welcome-subtitle">A Resource For Learning About Youth Organizing</a>
        <div class="hero-wrapper">
          <ul class="hero">
            <li class="hero__primary">
              <a class="" href="#"><div class="hero__message">Some infor for you.</div></a>
            </li>
            <li class="hero__callout hero__callout--left"><a class="callout-text" href="#critical-thinking">Critical Thinking and Analysis</a></li>
            <li class="hero__callout hero__callout--center"><a class="callout-text"  href="#community">Community Leadership and Action</a></li>
            <li class="hero__callout hero__callout--right"><a class="callout-text" class="" href="#social-emotional">Social and Emotional Development</a></li>
          </ul>  
        </div>
      </section>

      <section class="section section--home-navigation">
        <nav>
          <?php wp_nav_menu( array ( 'menu' => 'Front Page Menu', 'menu_class' => 'menu menu--home',) ); ?>
        </nav>  
      </section>

      <section id="critical-thinking" class="section section--frontpage">

        <?php
          // the loop
          $query = new WP_query( 'pagename=critical-thinking' );
          if ( $query->have_posts() ){
            while( $query->have_posts() ){
              $query->the_post();
              echo '<h2 class="section-title section--frontpage__entry-title">' . get_the_title() . '</h2>';
              echo '<div class="entry-content section--frontpage__entry">';
              the_content();
              echo '</div>';
            }
          }

          /* Display list of resource links if they exist. See inc/helpers.php */
          print_menu_if_exists('Critical Thinking Resources', 'Resources');

          wp_reset_postdata();
        ?>

      </section>

      <section id="community" class="section section--frontpage">
        <?php
          // the loop
          $query = new WP_query( 'pagename=community-leadership-and-action' );
          if ( $query->have_posts() ){
            while( $query->have_posts() ){
              $query->the_post();
              echo '<h2 class="section-title section--frontpage__entry-title">' . get_the_title() . '</h2>';
              echo '<div class="entry-content section--frontpage__entry">';
              the_content();
              echo '</div>';
            }
          }

          /* Display list of resource links if they exist. See inc/helpers.php */
          print_menu_if_exists('Community Leadership Resources', 'Resources');

          wp_reset_postdata();
        ?>

      </section>
      <section id="social-emotional" class="section section--frontpage">
        <?php
          // the loop
          $query = new WP_query( 'pagename=social-and-emotional-development' );
          $services_id = $query->queried_object->ID;

          if ( $query->have_posts() ){
            while( $query->have_posts() ){
              $query->the_post();
              echo '<h2 class="section-title section--frontpage__entry-title">' . get_the_title() . '</h2>';
              echo '<div class="entry-content section--frontpage__entry">';
              the_content();
              echo '</div>';
            }
          }

          /* Display list of resource links if they exist. See inc/helpers.php */
          print_menu_if_exists('Social And Emotional Resources', 'Social Resources');

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

      </section>
      <section id="organizational-culture" class="section section--frontpage">

         <?php
          // the loop
          $query = new WP_query( 'pagename=organizational-culture' );
          if ( $query->have_posts() ){
            while( $query->have_posts() ){
              $query->the_post();
              echo '<h2 class="section-title section--frontpage__entry-title">' . get_the_title() . '</h2>';
              echo '<div class="entry-content section--frontpage__entry">';
              the_content();
              echo '</div>';
            }
          }

          /* Display list of resource links if they exist. See inc/helpers.php */
          print_menu_if_exists('Organizational Structure Resources', 'Resources');

          wp_reset_postdata();
        ?>

      </section>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
