<?php

function registerThemeSupport() {
    // Images
    add_theme_support('post-thumbnails');
    add_image_size( 'hero-image', 1200);
}

add_action('init', 'registerThemeSupport');