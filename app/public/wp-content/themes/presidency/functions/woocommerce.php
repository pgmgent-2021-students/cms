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

function addLikeButton() {
    global $product;
    $product_id = $product->get_id();

    $metaQuery = array(
        array(
            'key' => 'liked_product_id',
            'compare' => '=',
            'value' => $product_id
        )
    );

    $likesQuery = new WP_Query(array(
        'post_type' => 'post',
        'meta_query' => $metaQuery
    ));

    $userLikesQuery = new WP_Query(array(
        'author' => get_current_user_id(),
        'post_type' => 'like',
        'meta_query' => $metaQuery
    ));

    $likesCount = $likesQuery->found_posts;
    $hasUserLikedPost = $userLikesQuery->found_posts;

    if(is_user_logged_in()) {
        if($hasUserLikedPost) {
            echo "<button class='btn btn-danger'>" . $likesCount ."</button>";
        } else {
            echo "<button class='btn btn-outline-danger'>" . $likesCount ."</button>";
        }
    } else {
        echo 'Likes: ' . $likesCount;
    }
}

add_action('woocommerce_single_product_summary', 'addLikeButton', 25);