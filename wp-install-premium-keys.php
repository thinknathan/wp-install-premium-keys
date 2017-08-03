<?php
/*
Plugin Name:  Premium Key Installer
Plugin URI:   https://github.com/thinknathan/
Description:  Sets keys for premium WP plugins.
Version:      1.0.1
Author:       Think_Nathan
Author URI:   https://thinknathan.ca/
License:      MIT License
*/

// Gravity Forms
if ( getenv('GFORMS_KEY') ) {
  define( 'GF_LICENSE_KEY', getenv('GFORMS_KEY') );
}

function custom_install_premium_keys() {
  // WP Rocket
  if ( function_exists ('update_rocket_option') && getenv('WP_ROCKET_KEY') ) {
    update_rocket_option( 'consumer_key', getenv('WP_ROCKET_KEY') );
  }
  // Advanced Custom Fields Pro
  if ( class_exists('acf') && getenv('ACF_PRO_KEY') ) {
    update_option( 'acf_pro_license', getenv('ACF_PRO_KEY') );
  }
}
add_action( 'plugins_loaded', 'custom_install_premium_keys' );
