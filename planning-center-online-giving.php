<?php

/**
 *
 * @link              http://wpchurch.team
 * @since             1.0.0
 * @package           Planning_Center_Online_Giving
 *
 * @wordpress-plugin
 * Plugin Name:       Planning Center Online Giving
 * Plugin URI:        http://wpchurch.team/pco
 * Description:       Use the Planning Center Online 'Giving' widget on your site
 * Version:           1.0.0
 * Author:            Jordesign, WP Church Team
 * Author URI:        http://wpchurch.team/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       Planning_Center_Online_Giving
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}


/******* Settings Page ******/
require_once plugin_dir_path( __FILE__ ) . 'settings.php';

/******* Shortcode ******/
require_once plugin_dir_path( __FILE__ ) . 'shortcode.php';




/******* Register Javascript Snippet ******/
add_action( 'wp_enqueue_scripts', 'wpct_pco_script' );

function wpct_pco_script() {
	wp_register_script( 'pco-giving', 'https://js.churchcenter.com/modal/v1', array(), '1.0.0', true );
}

