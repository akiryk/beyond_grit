<?php
/**
 * beyond_grit functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beyond_grit
 */

if ( ! function_exists( 'beyond_grit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beyond_grit_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on beyond_grit, use a find and replace
   * to change 'beyond_grit' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'beyond_grit', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'beyond_grit' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See https://developer.wordpress.org/themes/functionality/post-formats/
   */
  add_theme_support( 'post-formats', array(
    // 'aside',
    // 'image',
    // 'video',
    // 'quote',
    'link',
  ) );

  // Set up the WordPress core custom background feature.
  // add_theme_support( 'custom-background', apply_filters( 'beyond_grit_custom_background_args', array(
  //   'default-color' => 'ffffff',
  //   'default-image' => '',
  // ) ) );
}
endif; // beyond_grit_setup
add_action( 'after_setup_theme', 'beyond_grit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beyond_grit_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'beyond_grit_content_width', 640 );
}
add_action( 'after_setup_theme', 'beyond_grit_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beyond_grit_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'beyond_grit' ),
    'id'            => 'blog-sidebar',
    'description'   => 'a simple sidebar for the blog pages',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'beyond_grit_widgets_init' );


// function beyond_grit_blog_info($info, $show) {
//   $exploded = explode(" ", $info);
//   $show = '<span class=\'first-word\'>' . $exploded[0] . '</span> ' . join(' ', array_slice($exploded, 1));
//   return $info;
// }
// add_filter('bloginfo','beyond_grit_blog_info',10,2); // 10=priority; 2=number of arguments to accept


/**
 * Enqueue scripts and styles.
 */
function beyond_grit_scripts() {

  //if ( is_front_page() ){
  wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/beyond-grit-scripts.js', array('jquery'), '20151021' );
  //}

  wp_enqueue_style( 'beyond_grit-style', get_stylesheet_uri() );

  wp_enqueue_style( 'beyond_grit-fonts', 'https://fonts.googleapis.com/css?family=Londrina+Solid|Open+Sans+Condensed:700|Open+Sans:400,400italic,700,700italic');

  if ( is_page_template('page-templates/participating-organizations.php') ) {
    wp_enqueue_script('organizations', get_template_directory_uri() . '/js/map.js');
    wp_enqueue_script('googleMaps', 
      'https://maps.googleapis.com/maps/api/js?key=AIzaSyA9_V4fG-umELVwoyKKRm4jQ8XODuwV9MA&callback=map.init',
       array(), // dependencies
       '1.0.0', // version
       true // in footer 
       );
  } 
}
add_action( 'wp_enqueue_scripts', 'beyond_grit_scripts' );

/**
 * Enqueue Google ReCaptcha for Comments Single Post Pages
 */
function beyond_grit_google_captcha_scripts(){
  if (is_single()) {
    wp_enqueue_script(
      'reCaptchaScript', 
      'https://www.google.com/recaptcha/api.js', 
      array()
    );

    wp_enqueue_script(
      'handleRecaptchaResponse',
      get_template_directory_uri() . '/js/handle-captcha.js', 
      array('jquery'),
      false,
      true
    );
  }
}
add_action( 'wp_enqueue_scripts', 'beyond_grit_google_captcha_scripts' );

/** 
 * Enqueue scripts for the Participating Organizations template
 */
function beyond_grit_template_scripts(){
   
}
//add_action('wp_enqueue_scripts','beyond_grit_template_scripts');



/**
 * Add fonts-loaded class if cookie is set
 */
function beyond_grit_class_names( $classes ) {
  $classes[] = 'fonts-loaded';
  return $classes;
}

/**
 * Handle cookies
 */
function beyond_grit_getcookie() {
  if ( isset( $_COOKIE['fonts-loaded'] ) && $_COOKIE['fonts-loaded'] == 'true' ) {
    add_filter( 'body_class', 'beyond_grit_class_names' );
  }
}
add_action( 'wp_head', 'beyond_grit_getcookie' );

/**
 * Prevent Page Scroll When Clicking the More Link
 * From wp codex: users can prevent the scroll by filtering the content more link with 
 * a simple regular expression.
 */
function remove_more_link_scroll( $link ) {
  $link = preg_replace( '|#more-[0-9]+|', '', $link );
  return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load helpers file.
 */
require get_template_directory() . '/inc/helpers.php';
