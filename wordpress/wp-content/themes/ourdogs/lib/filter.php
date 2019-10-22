<?php

function filter_dogs () {
    $args = array(
        'post_type' => 'dog',
        'tax_query' => array(),
        'meta_query' => array(),
    );


    if( isset( $_POST['allergies'] ) && $_POST['allergies'] == 'on' )
        $args['meta_query'][] = array(
            array(
                'key' => 'food_allergies',
                'value'   => array(''),
                'compare' => 'NOT IN'
            )
        );

	if( isset( $_POST['breed'] ) && !empty( $_POST['breed'] ) )
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'breed',
                'field' => 'id',
                'terms' => $_POST['breed']
            )
        );

    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post();
            get_template_part('template-parts/all-dogs/card');
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;

    
    die();
}

add_action('wp_ajax_filter_dogs', 'filter_dogs');
add_action('wp_ajax_nopriv_filter_dogs', 'filter_dogs');