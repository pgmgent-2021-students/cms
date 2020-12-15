<?php

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


// Hooks
function beforeProductLoop() {
    echo '<div class="row">';
    echo '<div class="col-md-4">';
    // Sidebar
    echo '</div>';
    echo '<div class="col-md-8">';
}

function afterProductLoop() {
    echo '</div>';
}

function wrapProductDropdown() {
    echo '<div class="bg-success">';
    woocommerce_catalog_ordering();
    echo '</div>';
}

add_action('woocommerce_before_shop_loop', 'beforeProductLoop', 10);
add_action('woocommerce_before_shop_loop', 'wrapProductDropdown', 10);
add_action('woocommerce_after_shop_loop ', 'afterProductLoop', 10);

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


add_filter('woocommerce_show_page_title', function() {
    return false;
});

