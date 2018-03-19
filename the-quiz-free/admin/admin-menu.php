<?php

// MyPlugin - Admin Menu
// disable direct file access
if (!defined('ABSPATH')) {

    exit;
}
if (!class_exists("AdminMenu")) {

    class AdminMenu {

        public function __construct() {
            
        }

        public function menu_submenu() {

            add_menu_page('The Quiz Free', 'The Quiz Free', 'manage_options', 'the-quiz-free', 'acerca_de');
            $cat = new AdminCategory();
            add_submenu_page('the-quiz-free', 'The Quiz Free', 'Nuevo Cuestionario', 'manage_options', 'my-top-level-slug', array($cat, 'admin_categoria'));
            $que = new AdminQuestion();
            add_submenu_page('the-quiz-free', 'The Quiz Free', 'Gestion de Preguntas', 'manage_options', 'my-secondary-slug', array($que, 'admin_question'));
        }

    }

    $adm = new AdminMenu();
    add_action('admin_menu', array($adm, 'menu_submenu'));
}
