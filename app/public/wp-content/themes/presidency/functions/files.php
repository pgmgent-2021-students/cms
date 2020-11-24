<?php

function loadFiles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script( 'main-js', get_theme_file_uri('app.js', NULL, '1.0', true));
}

add_action('wp_enqueue_scripts', 'loadFiles');