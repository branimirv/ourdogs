<?php 

function filter_dogs () {
    $allergies = $_POST['allergies'];
    $breed = $_POST['breed'];

    // for taxonomies / categories
	if( isset( $_POST['breed'] ) )
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'breed',
                'field' => $term->term_id,
                'terms' => $_POST['breed']
            )
        );

    // if allergies is set
	if( isset( $_POST['allergies'] ) && $_POST['allergies'] == 'on' )
        $args['meta_query'][] = array(
            'key' => 'food_allergies',
            'value'   => '',
            'compare' => '!='
        );

    // if( $allergies == 'on' && !isset($breed)  )
    //     $args = array(
    //         'post_type' => 'dog',
    //         'post_per_page' => -1,
    //         'orderby' => 'meta_value_num',
    //         'order'	=> 'ASC',
    //         'meta_type' => 'DATE',
    //         'meta_key' => 'dog_birth_date',
    //         'meta_query' => array(
    //             'key' => 'food_allergies',
    //             'value'   => '',
    //             'compare' => '!='
    //         )
    //     );
    
    // if( $allergies == '' && !$isset($breed)  )
    //     return $args;
    
    // if( $allergies == 'on' && isset($breed) )
    //     $args = array(
    //         'post_type' => 'dog',
    //         'post_per_page' => -1,
    //         'orderby' => 'meta_value_num',
    //         'order'	=> 'ASC',
    //         'meta_type' => 'DATE',
    //         'meta_key' => 'dog_birth_date',
    //         'meta_query' => array(
    //             'key' => 'food_allergies',
    //             'value'   => '',
    //             'compare' => '!='
    //         ),
    //         'tax_query' => array(
    //             array(
    //                 'taxonomy' => 'breed',
    //                 'field' => 'id',
    //                 'terms' => $_POST['breed']
    //             )
    //         )
    //     );

    
    // if( $allergies == '' && isset($breed) )
    // $args = array(
    //     'post_type' => 'dog',
    //     'post_per_page' => -1,
    //     'orderby' => 'meta_value_num',
    //     'order'	=> 'ASC',
    //     'meta_type' => 'DATE',
    //     'meta_key' => 'dog_birth_date',
    //     'meta_query' => array(
    //         'key' => 'food_allergies',
    //         'value'   => '',
    //         'compare' => '='
    //     )

    // );

    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        $count = 0;
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