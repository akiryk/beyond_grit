<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beyond_grit
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'beyond_grit' ); ?></a>


  <?php if ( is_front_page() ) { ?>

    <header id="welcome" class="section section__welcome" role="banner">

      <h1 class="welcome-title"><?php bloginfo( 'name' ); ?></h1>
      <div class="welcome-subtitle">A Resource For Learning sssAbout Youth Organizing</div>

      <nav class="hero-wrapper" role="navigation">
        <ul class="hero">
          <li class="hero__primary">
          </li>
          <li class="hero__callout hero__callout--left"><a href="#critical-thinking"><span class="callout-text">Critical Thinking and Analysis</span></a></li>
          <li class="hero__callout hero__callout--center"><a href="#community"><span class="callout-text">Community Leadership and Action</span></a></li>
          <li class="hero__callout hero__callout--right"><a href="#social-emotional"><span class="callout-text">Social and Emotional Development</span></a></li>
        </ul>  
      </nav>

      <nav class="section section--home-navigation" role="navigation">
          <?php wp_nav_menu( array ( 'menu' => 'Front Page Menu', 'menu_class' => 'menu menu--home',) ); ?>
      </nav>

    </header>

  <?php } else { ?> <!-- Not the front page! -->

  <header id="masthead" class="site-header section--masthead" role="banner">
    <div class="site-branding">
      <div class="logo-wrapper"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home"></a></div>
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'title' ); ?></a></p>
    </div><!-- .site-branding -->
    <nav id="site-navigation" class="page-navigation" role="navigation">
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Show Menu', 'beyond_grit' ); ?></button>
      <?php wp_nav_menu( array( 
        'theme_location' => 'primary', 
        'menu_id' => 'primary-menu',
        'menu_class'      => 'menu menu--page', ) ); 
      ?>
    </nav><!-- #site-navigation -->
  </header>
  
  <?php } ?>