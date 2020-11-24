<?php

function registerWidgets() {
    register_sidebar( array(
        'name' => __( 'Footer Area', 'footer_form' ),
        'id' => 'footer-form',
        'description' => __( 'Description', 'footer_form' ),
        'before_widget' => '<div class="footer-form">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}

add_action( 'widgets_init', 'registerWidgets' );