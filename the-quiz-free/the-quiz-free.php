<?php

/*
  Plugin Name:  The Quiz Free
  Description:  Plugin para realizar encuestas Online.
  Plugin URI:   https://facebook.com/carlos.ortube
  Author:       Juan Carlos Ortube
  Version:      1.0
  Text Domain:  the-quiz-free
  Domain Path:  /languages
  License:      GPL v2 or later
  License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
 */



// disable direct file access
if (!defined('ABSPATH')) {

    exit;
}


// include plugin dependencies: admin only
if (is_admin()) {

    require_once plugin_dir_path(__FILE__) . 'admin/admin-acerca-de.php';
    require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
    require_once plugin_dir_path(__FILE__) . 'admin/admin-category.php';
    require_once plugin_dir_path(__FILE__) . 'admin/admin-question.php';
    // $grid_category = new AdminCategory();
    // $grid_category->grid_category();
}

function publico($atts) {
    $p = shortcode_atts(array(
        'id' => '1'
            ), $atts);
    global $wpdb;
    $v = $p['id'];
    $tabla = $wpdb->prefix . "plugin_quiz_category where id=$v";
    $consulta = "Select * from {$tabla}  ";
    $resultado = $wpdb->get_results($consulta);
    $i = 1;
    foreach ($resultado as $fila) {
        $output = $fila->name;
    }
    // return output
    echo $output;
}

add_shortcode('quiz', 'publico');

// Verifico si no existen mis tablas dependientes para crearlas
require_once plugin_dir_path(__FILE__) . 'includes/createtable.php';
register_activation_hook(__FILE__, array('CreateTable', 'on_activate'));



