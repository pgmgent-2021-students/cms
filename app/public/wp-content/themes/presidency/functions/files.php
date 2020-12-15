<?php

function loadFiles() {
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');

    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script( 'main-js', get_theme_file_uri('app.js', NULL, '1.0', true));

    $data = 'const testData = ' . json_encode(array(
        'rootUrl' => get_site_url(),
    ));

    wp_add_inline_script( 'main-js', $data, 'before');
}

add_action('wp_enqueue_scripts', 'loadFiles');