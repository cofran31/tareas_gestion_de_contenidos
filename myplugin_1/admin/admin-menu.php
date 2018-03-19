<?php // MyPlugin - Admin Menu



// deshabilita acceso directo a archivo
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// añade un sub menú administrativo
function myplugin_add_sublevel_menu() {

	/*
	Recuerda la configuración para el sub menú
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);

	*/

	add_submenu_page(
		'options-general.php',
		esc_html__('MyPlugin Settings', 'myplugin'),
		esc_html__('MyPlugin', 'myplugin'),
		'manage_options',
		'myplugin',
		'myplugin_display_settings_page'
	);

}
add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );



// añade un menú administrativo
function myplugin_add_toplevel_menu() {

	/*

	add_menu_page(
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = '',
		string   $icon_url = '',
		int      $position = null
	)

	*/

	add_menu_page(
		esc_html__('MyPlugin Settings', 'myplugin'),
		esc_html__('MyPlugin', 'myplugin'),
		'manage_options',
		'myplugin',
		'myplugin_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
//está deahabilitado porque lo estamos añadiendo a nivel sub menú
// add_action( 'admin_menu', 'myplugin_add_toplevel_menu' );
