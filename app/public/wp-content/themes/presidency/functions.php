<?php

require_once locate_template('functions/files.php');
require_once locate_template('functions/menus.php');
require_once locate_template('functions/images.php');
require_once locate_template('functions/support.php');
require_once locate_template('functions/widgets.php');
require_once locate_template('functions/woocommerce.php');
require_once locate_template('functions/registration.php');
require_once locate_template('functions/rest.php');

function loadTextDomain() {
    load_theme_textdomain( 'presidency', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'loadTextDomain' );

function meks_which_template_is_loaded() {
	if ( is_super_admin() ) {
		global $template;
		print_r( $template );
	}
}

add_action( 'wp_footer', 'meks_which_template_is_loaded' );