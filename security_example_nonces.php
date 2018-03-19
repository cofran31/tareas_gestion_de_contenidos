<?php
/*
Plugin Name: Security Example: Nonces
Description: Welcome to WordPress plugin development.
Plugin URI:  https://something.com/
Author:      Ana Loyo
Version:     1.0
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.txt
*/
//NONCE - number used once
// Form
function myplugin_form_favorite_music() {

	?>

	<form method="post">
		<p><label for="music">Cuál es tu música favorita?</label></p>
		<p><input id="music" type="text" name="myplugin-favorite-music"></p>
		<p><input type="submit" value="Enviar"></p>

		<?php wp_nonce_field( 'myplugin_form_action', 'myplugin_nonce_field', false ); ?>

	</form>

<?php

}



// process submitted form
function myplugin_process_favorite_music() {

	// get the nonce
	if ( isset( $_POST['myplugin_nonce_field'] ) ) {

		$nonce = $_POST['myplugin_nonce_field'];

	} else {

		$nonce = false;

	}

	// process form
	if ( isset( $_POST['myplugin-favorite-music'] ) ) {

		// verify nonce
		if ( ! wp_verify_nonce( $nonce, 'myplugin_form_action' ) ) {

			wp_die( 'Incorrecto!' );

		} else {

			$fav_music = sanitize_text_field( $_POST[ 'myplugin-favorite-music' ] );

			if ( ! empty( $fav_music ) ) {

				echo '<p>Su música favorita es '. $fav_music .'.</p>';

			} else {

				echo '<p>Por favor escriba su música favorita!</p>';

			}

		}

	}

}

// Añade top-level menu
function security_example_nonces_add_toplevel_menu() {

	add_menu_page(
		'Security Example: Nonces',
		'Nonce Security',
		'manage_options',
		'security-example-nonces',
		'security_example_nonces_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
add_action( 'admin_menu', 'security_example_nonces_add_toplevel_menu' );



// Muestra la página de configuración
function security_example_nonces_display_settings_page() {

	// checa si el usuario tiene acceso permitido
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">

		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<?php myplugin_form_favorite_music(); ?>
		<?php myplugin_process_favorite_music(); ?>

	</div>

<?php

}


