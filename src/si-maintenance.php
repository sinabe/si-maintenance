<?php

/*
Plugin Name: Sinabe Maintenance plugin
Plugin URI:  https://sinabe.ch
Description: Allow only admin to view website. Other user see a 503.php page or a simple maintenance text.
Version:     1.0.0
Author:      Sinabe Sàrl
Author URI:  https://sinabe.ch
*/

/**
 * WordPress Maintenance mode
 * To deactivet this function comment the add_action
 */

function maintenace_mode()
{
    if (!current_user_can( 'edit_themes' ) || !is_user_logged_in()) {
        if (file_exists(get_stylesheet_directory() . '/503.php')) {
            require get_stylesheet_directory() . '/503.php';
            die();
        } elseif (file_exists(plugin_dir_path( __FILE__ ) . '/503.php')) {
            require plugin_dir_path( __FILE__ ) . '/503.php';
            die();
        } else {
            wp_die('Maintenance.');
        }
    }
}

add_action('get_header', 'maintenace_mode');
