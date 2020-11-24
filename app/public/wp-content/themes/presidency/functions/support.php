<?php

function addTitleTag() {
    add_theme_support('title-tag');
}

function addCustomLogo() {
    add_theme_support( 'custom-logo', array(
        'height'      => 200,
        'width'       => 600,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false,
    ));
}

add_action('init', 'addTitleTag');
add_action('init', 'addCustomLogo');