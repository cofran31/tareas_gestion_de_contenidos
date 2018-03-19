W<?php
/*
  Plugin Name: Security Example:Data sanitization
  Description: Welcome to WordPress plugin development.
  Plugin URI:  https://something.com/
  Author:      Ana Loyo
  Version:     1.0
  License:     GPLv2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 */

// Despliega formulario
function myplugin_form_favorite_movie() {
    ?>

    <form method="post">
        <p><label for="movie">Cuál es tu película favorita?</label></p>
        <p><input id="movie" type="text" name="myplugin-favorite-movie"></p>
        <p><label for="movie">Cuál es tu libro favorita?</label></p>
        <p><input id="book" type="text" name="myplugin-favorite-book"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <?php
}

// Procesa el envío del formulario
function myplugin_process_favorite_movie() {

    if (isset($_POST['myplugin-favorite-movie']) || isset($_POST['myplugin-favorite-book'])) {

        $fav_movie = sanitize_text_field($_POST['myplugin-favorite-movie']);
        $fav_book = sanitize_text_field($_POST['myplugin-favorite-book']);
        if (!empty($fav_movie)) {
            echo '<p>Tu película favorita es ' . $fav_movie . '.</p><hr/>';
        } else {
            echo '<p>Por favor escribe tu película favorita!</p>';
        }
        if (!empty($fav_book)) {
            echo '<p>Tu libro favorito es ' . $fav_book . '.</p>';
        } else {
            echo '<p>Por favor escribe tu Book favorito!</p>';
        }
    }
}

/*
  Añadiendo el menú y las configuraciones de página
 */

// añade top-level menu
function security_example_sanitization_add_toplevel_menu() {

    //add_menu_page(
     //       'Security Example: Data Sanitization', 'Data Sanitization', 'manage_options', 'security-example-sanitization', 'security_example_sanitization_display_settings_page', 'dashicons-admin-generic', null
   // );
  //  add_menu_page('','','','','','');
   add_submenu_page('tools.php', 'Security Example: Data Sanitization', 'Data Sanitization', 'manage_options', 'security-example-sanitization', 'security_example_sanitization_display_settings_page');
}

add_action('admin_menu', 'security_example_sanitization_add_toplevel_menu');

// Despliega la configuración de la página
function security_example_sanitization_display_settings_page() {
    // check if user is allowed access
    if (!current_user_can('manage_options'))
        return;
    ?>

    <div class="wrap">

        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

        <?php myplugin_form_favorite_movie(); ?>
        <?php myplugin_process_favorite_movie(); ?>

    </div>

    <?php
}
