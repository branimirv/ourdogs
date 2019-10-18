<?php

function skojochild_assets()
{
    global $wp_query;

    $base_uri = get_stylesheet_directory_uri() . '/dist';

    wp_enqueue_style('skojochild-style', $base_uri . '/bundle.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('skojochild-script', $base_uri . '/bundle.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'skojochild_assets');


?>