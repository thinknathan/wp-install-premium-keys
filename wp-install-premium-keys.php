<?php
/*
Plugin Name:  Premium Key Installer
Plugin URI:   https://github.com/thinknathan/
Description:  Sets keys for premium WP plugins.
Version:      1.0.0
Author:       Think_Nathan
Author URI:   https://thinknathan.ca/
License:      MIT License
*/

// Advanced Custom Fields Pro
if ( class_exists('acf') && ACF_PRO_KEY ) {
  update_option( 'acf_pro_license', ACF_PRO_KEY );
}

// Gravity Forms
if ( class_exists('GFForms') && GFORMS_KEY ) {
  define( 'GF_LICENSE_KEY', GFORMS_KEY );
}

// WP Rocket
if ( function_exists ('update_rocket_option') && WP_ROCKET_KEY ) {
  update_rocket_option( 'consumer_key', WP_ROCKET_KEY );
}
