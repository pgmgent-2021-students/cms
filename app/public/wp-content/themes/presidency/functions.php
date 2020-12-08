<?php

require_once locate_template('functions/files.php');
require_once locate_template('functions/menus.php');
require_once locate_template('functions/images.php');
require_once locate_template('functions/support.php');
require_once locate_template('functions/widgets.php');
require_once locate_template('functions/woocommerce.php');

function loadTextDomain() {
    load_theme_textdomain( 'presidency', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'loadTextDomain' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );