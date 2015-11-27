<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package beyond_grit
 */

/**
 * Print a menu only if that menu exists and has content.
 *
 * @param string $menu_name Name of the wp_nav_menu.
 * @param string $menu_title Title to go with menu
 */
function print_menu_if_exists( $menu_name, $menu_title = '') {

	/* Get reference to menu without printing the menu. 
	 * This reference will point to $menu_name if it exists and to wp_page_menu
	 * if it doesn't. 
	 */
	$menu = wp_nav_menu(
	    array (
	        'echo'            => false,
	        'menu'            => $menu_name,
	        'fallback_cb'     => '__return_false'
	    )
	);

	/*
	 *  Make sure menu both has content and is the right menu with name
	 *  of [menu_name]. Otherwise, it could be pointing to wp_page_menu.
	 *  
	 */
	if ( !empty ($menu) && is_nav_menu( $menu_name ) ) {

	  $defaults = array(
	    'menu'            => $menu_name,
	    'container'       => false,
	    'menu_class'      => 'resource-links'
	  );

	  echo '<div class="section--frontpage__resources">';

	  if ( !empty( $menu_title ) ) {
	  	echo '<h5 class="resources__title">' . $menu_title . '</h5>';
	  }  
	  
	  wp_nav_menu( $defaults );

	  echo '</div>'; 
	}
}