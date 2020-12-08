<?php

function addEventPostTypes() {
    register_post_type('event', array(
        'label' => 'Event',
        'rewrite' => array('slug' => 'events'),
        'labels' => array(
            'add_new_item' =>  'Add new Event',
        ),
        'public' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'show_in_rest' => true,
        'taxonomies' => array('location'),
        'has_archive' => true
    ));
}

add_action('init', 'addEventPostTypes');