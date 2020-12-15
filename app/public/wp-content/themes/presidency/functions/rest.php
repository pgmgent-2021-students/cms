<?php

function addCustomFieldRestApi() {
    register_rest_field('post', 'authorName', array(
        'get_callback' => function() {
            return get_the_author();
        }
    ));
}

add_action('rest_api_init', 'addCustomFieldRestApi');


function simplifySearchResults($data) {
    $posts = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        's' => sanitize_text_field($data['q'])
    ));

    $simplePosts = array();

    while($posts->have_posts()) {
        $posts->the_post();

        array_push($simplePosts, array(
            'title' => get_the_title(),
            'url' => get_the_permalink()
        ));
    }

    return $simplePosts;
}

function setCustomSearchApi() {
    register_rest_route('presidency', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'simplifySearchResults'
    ));
}


add_action('rest_api_init', 'setCustomSearchApi');



function concatResults($data) {
    $postsAndEvents = new WP_Query(array(
        'post_type' => array('post', 'event'),
        'posts_per_page' => -1,
        's' => sanitize_text_field($data['q'])
    ));

    $simplifiedResults = array(
        'posts' => array(),
        'events' => array(),
    );

    while($postsAndEvents->have_posts()) {
        $postsAndEvents->the_post();

        if(get_post_type() === 'post') {
            array_push($simplifiedResults['posts'], array(
                'title' => get_the_title(),
                'url' => get_the_permalink(),
            ));
        } else if(get_post_type() === 'event') {
            array_push($simplifiedResults['events'], array(
                'title' => get_the_title(),
                'url' => get_the_permalink(),
                'id' => get_the_ID()
            ));
        }
    }

    if($simplifiedResults['events']) {
        $eventMetaQuery = array('relation' => 'OR');

        foreach ($simplifiedResults['events'] as $event) {
            array_push($eventMetaQuery, array(
                array(
                    'key' => 'related_event',
                    'compare' => 'LIKE',
                    'value' => "'" . $event['id'] ."'"
                 )
            ));
        }

        $postWithRelatedEvents = new WP_Query(array(
            'post_type' => 'post',
            'meta_query' => $eventMetaQuery));

        while($postWithRelatedEvents->have_posts()) {
            $postWithRelatedEvents->the_post();

            array_push($simplifiedResults['posts'], array(
                'title' => get_the_title(),
                'url' => get_the_permalink(),
            ));
        }
    }

    $simplifiedResults['posts'] = array_values(array_unique($simplifiedResults['posts'], SORT_REGULAR));

    return $simplifiedResults;
}

function setCustomApi() {
    register_rest_route('presidency', 'p-and-e', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'concatResults'
    ));
}


add_action('rest_api_init', 'setCustomApi');

