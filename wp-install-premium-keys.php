<?php
/*
Plugin Name:  Premium Key Installer
Plugin URI:   https://github.com/thinknathan/
Description:  Sets keys for premium WP plugins.
Version:      1.0.3
Author:       Think_Nathan
Author URI:   https://thinknathan.ca/
License:      MIT License
*/

// Gravity Forms
if ( getenv('GFORMS_KEY') ) {
  define( 'GF_LICENSE_KEY', getenv('GFORMS_KEY') );
}

// WP Rocket
if ( getenv('WP_ROCKET_KEY') ) {
	define( 'WP_ROCKET_KEY', getenv('WP_ROCKET_KEY') );
}

if ( getenv('WP_ROCKET_EMAIL') ) {
	define( 'WP_ROCKET_EMAIL', getenv('WP_ROCKET_EMAIL') );
}

// ACF Solution - Austin Ginder - https://anchor.host/2017/05/16/preloading-advanced-custom-fields-pro-license-key/

function custom_install_premium_keys() {
  if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

    // Loads ACF plugin
    include_once( ABSPATH . '../app/plugins/advanced-custom-fields-pro/acf.php');

    // connect
    $post = array(
      'acf_license'	=> getenv('ACF_PRO_KEY'),
      'acf_version'	=> acf_get_setting('version'),
      'wp_name'			=> get_bloginfo('name'),
      'wp_url'			=> home_url(),
      'wp_version'	=> get_bloginfo('version'),
      'wp_language'	=> get_bloginfo('language'),
      'wp_timezone'	=> get_option('timezone_string'),
    );

    // connect
    $response = acf_updates()->request('v2/plugins/activate?p=pro', $post);

    // ensure response is expected JSON array (not string)
    if( is_string($response) ) {
      $response = new WP_Error( 'server_error', esc_html($response) );
    }

    // success
    if( $response['status'] == 1 ) {
      acf_pro_update_license( $response['license'] ); // update license
    }
    echo $response['message']; // show message

  }
}
add_action( 'switch_theme', 'custom_install_premium_keys' );
