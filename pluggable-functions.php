<?php
/*
Plugin Name: Pluggable functions
Description: Welcome to WordPress plugin development.
Plugin URI:  https://something.com/
Author:      Ana Loyo
Version:     1.0
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.txt
*/
// pluggable function
// Archivo de ejemplo cuando se cierra la session
/*
function wp_logout() {
      // destruir session y limpiar las cookies 
	wp_destroy_current_session();
	wp_clear_auth_cookie();

	myplugin_custom_logout();

	/**
	 * Fires after a user is logged-out.
	 *
	 * @since 1.5.0
}	
 *  */



do_action( 'wp_logout' );


// customize logout function
function myplugin_custom_logout() {


	// Hace algo cuando el usuario sale logs out..

}
// al metodo wp_logout se puede aumentar otras cosas que yo quiera  liena 564 pluggable.php
add_action( 'wp_logout', 'myplugin_custom_logout' );
