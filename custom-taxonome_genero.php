<?php
/*
Plugin Name: Custom Taxonomy genero
Description: Example demonstrating how to add a Custom Taxonomy via plugin.
Plugin URI:   https://something.com
Author:       Nombre del Autor
Version:      1.0
*/

// add custom taxonomy
function myplugin_add_custom_taxonomy_genero() {

	/*

		register_taxonomy(
			string       $taxonomy,
			array|string $object_type,
			array|string $args = array()
		)

		For a list of $args, check out:
		https://developer.wordpress.org/reference/functions/register_taxonomy/

	*/

	$args = array(
		'labels'            => array( 'name' => 'Genero' ),
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy( 'genero', 'book', $args );

}
add_action( 'init', 'myplugin_add_custom_taxonomy_genero' );