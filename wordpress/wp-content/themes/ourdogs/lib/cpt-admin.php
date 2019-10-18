<?php

/*
* Add columns to dog post list
*/

function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'dog_birth_date' => __ ( 'Birth Date' )
   ) );
}

add_filter ( 'manage_dog_posts_columns', 'add_acf_columns' );

/*
 * Add columns to dog post list
 */
function manage_dog_posts_custom_column ( $column, $post_id ) {
  if ( 'dog_birth_date' === $column ) {
    $dogBirthDate = get_post_meta ( $post_id, 'dog_birth_date', true );
    $date = new DateTime($dogBirthDate);

    if ( ! $dogBirthDate ) {
      _e( 'n/a' );  
    } else {
      echo $date->format('d/m/Y');
    }
  }

}

add_action ( 'manage_dog_posts_custom_column', 'manage_dog_posts_custom_column', 10, 2 );

?>