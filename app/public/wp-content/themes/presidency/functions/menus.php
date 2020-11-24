<?php

function registerMenuLocations() {
    register_nav_menus(array(
        'header-nav' => 'Header Menu'
    ));
}

add_action( 'init', 'registerMenuLocations' );