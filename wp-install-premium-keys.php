<?php
/*
Plugin Name:  Premium Key Installer
Plugin URI:   https://github.com/thinknathan/
Description:  Sets keys for premium WP plugins.
Version:      1.0.4
Author:       Think_Nathan
Author URI:   https://thinknathan.ca/
License:      GPL-2.0 license or any newer version
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
