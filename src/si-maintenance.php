<?php

/*
Plugin Name: Sinabe Maintenance plugin
Plugin URI:  https://sinabe.ch
Description: Allow only admin to view website. Other user see a 503.php page or a simple maintenance text.
Version:     1.0.1
Author:      Sinabe Sàrl
Author URI:  https://sinabe.ch
*/

/**
 * WordPress Maintenance mode
 * To deactivet this function comment the add_action
 */

function maintenace_mode()
{
    /**
     * Default maintenance page file.
     * @var string File name.
     */
    $defautlMaintenaceFile = '503.php';
    
    if (!current_user_can( 'edit_themes' ) || !is_user_logged_in()) {
        if (file_exists(get_stylesheet_directory() . $defautlMaintenaceFile)) {
            require get_stylesheet_directory() . $defautlMaintenaceFile;
            die();
        } elseif (file_exists(plugin_dir_path( __FILE__ ) . $defautlMaintenaceFile)) {
            require plugin_dir_path( __FILE__ ) . $defautlMaintenaceFile;
            die();
        } else {
            wp_die('Maintenance.');
        }
    }
}

add_action('get_header', 'maintenace_mode');
