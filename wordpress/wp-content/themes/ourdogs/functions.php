<?php

if (!function_exists('ourdogs_setup')) {
    function ourdogs_setup()
    {
        ourdogs_includes();
    }

    function ourdogs_includes()
    {
        $path = get_stylesheet_directory() . '/lib/';

        require_once($path . 'enqueue-assets.php');
        require_once($path . 'image-size.php');
        require_once($path . 'custom-post-type.php');
        require_once($path . 'custom-taxonomies.php');
        require_once($path . 'cpt-admin.php');
        require_once($path . 'filter.php');
    }
}

add_action('after_setup_theme', 'ourdogs_setup');

