<?php

function filter_dogs () {
    $allergies = $_POST['allergies'];
    $breed = $_POST['breed'];

    $breed_tax_args = [];
    $allergies_meta_args = [];
    
    switch ($breed) {
        case $breed:
            $breed_tax_args = [
                array(
                    array(
                        'taxonomy' => 'breed',
                        'field' => 'id',
                        'terms' => $_POST['breed']
                    )
            
                )
            ];
            
            break;

        case 0:
            $breed_tax_args = [
                array(
                    array(
                        'taxonomy' => 'breed',
                    )
                )
            ];

            break;
    }

    switch ($allergies) {
        case 'on':
            $allergies_meta_args = [
                array(
                    'key' => 'food_allergies',
                    'value'   => '',
                    'compare' => '!='
                )
            ];

            break;
        case 0:
            $allergies_meta_args = [
                array(
                    'key' => 'food_allergies',
                    'value'   => '',
                    'compare' => '='
                )
            ];

            break;
    }
    

    $args = array(
        'post_type' => 'dog',
        'tax_query' => $breed_tax_args,
        'meta_query' => $allergies_meta_args,
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