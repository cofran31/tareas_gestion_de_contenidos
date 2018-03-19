<?php //Myplugin - Callback
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
// validar configuración del plugin
function myplugin_validate_options($input) {

	// añadir validaciones de funcionalidad

	return $input;

}


// callback: login
function myplugin_callback_section_login() {

	echo '<p>Esta configuración habilita la configuración de la entrada a wordpress.</p>';

}



// callback: admin section
function myplugin_callback_section_admin() {

	echo '<p>These settings enable you to customize the WP Admin Area.</p>';

}


// callback: text field
function myplugin_callback_field_text( $args ) {

	// todo: add callback functionality..

	echo 'This will be a text field.';

}



// callback: radio field
function myplugin_callback_field_radio( $args ) {

	// todo: add callback functionality..

	echo 'This will be a radio field.';

}



// callback: textarea field
function myplugin_callback_field_textarea( $args ) {

	// todo: add callback functionality..

	echo 'This will be a textarea.';

}



// callback: checkbox field
function myplugin_callback_field_checkbox( $args ) {

	// todo: add callback functionality..

	echo 'This will be a checkbox.';

}



// callback: select field
function myplugin_callback_field_select( $args ) {

	// todo: add callback functionality..

	echo 'This will be a select menu.';

}
