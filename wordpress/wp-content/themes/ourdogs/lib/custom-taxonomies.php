<?php

/**
 * Custom Taxonomy - Dogs
 */

function taxonomy_dogs() {
	$labels = array(
		'name' => 'Breeds',
		'singular_name' => 'Breed',
		'search_items' => 'Search Breeds',
    'all_items' => 'All Breeds',
    'parent_item' => 'Parent Breed',
    'parent_item_colon' => 'Parent Breed:',
    'edit_item' => 'Edit Breed',
    'update_item' => 'Update Breed',
    'add_new_item' => 'Add New Breed',
    'new_item_name' => 'New Breed Name',
    'menu_name' => 'Breed'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
		'rewrite' => array('slug' => 'breed'),
	);
	register_taxonomy( 'breed', array('dog'), $args );
}

add_action('init', 'taxonomy_dogs');

?>