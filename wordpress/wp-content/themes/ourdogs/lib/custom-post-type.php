<?php

/**
 * Custom Post Type - Dogs
 */

function cpt_dogs() {
	$labels = array(
		'name' => 'Dogs',
		'singular_name' => 'Dog',
		'add_new' => 'Add Dog',
		'all_items' => 'All Dogs',
		'add_new_item' => 'Add Dog',
		'edit_item' => 'Edit Dog',
		'new_item' => 'New Dog',
		'view_item' => 'View Dog',
		'search_item' => 'Search Dogs',
		'not_found' => 'No dogs found',
		'not_found_in_trash' => 'No dogs found in trash',
		'parent_item_colon' => 'Parent Dog'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		// 'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 25,
		'exclude_from_search' => false,
	);
	register_post_type('dog', $args);
}

add_action('init', 'cpt_dogs');

?>