<?php
/**
 * Template Name: All Dogs Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordpress
 */
?>
<?php  get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php $thumbHero = get_the_post_thumbnail_url( $post, 'extra-large'); ?>

    <div class="hero hero--dogs-all">
        <div class="hero__image">
          <div class="image-container" style="background-image: url('<?php echo $thumbHero; ?>')">
            <div class="container">
                <div class="hero__text">
                    <?php the_content(); ?>
                </div>
            </div>
          </div>
        </div>
    </div>

<?php endwhile; endif; ?>

<?php

    $args = array(
        'post_type'         => 'dog',
        'post_per_page'     => -1,
        'orderby' => 'meta_value_num',
        'order'	=> 'ASC',
        'meta_type' => 'DATE',
        'meta_key' => 'dog_birth_date'
    );

    $query = new WP_Query($args);
?>
<div class="filter">
    <div class="container">
        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
            <label>
                <span>Dogs with allergies</span>
                <input type="checkbox" name="allergies" />
            </label>
            <div class="select__container">
                <?php
                    if( $terms = get_terms( array( 'taxonomy' => 'breed', 'orderby' => 'name' ) ) ) : 
            
                        echo '<select name="breed"><option value="">Select category...</option>';
                        foreach ( $terms as $term ) :
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                        endforeach;
                        echo '</select>';
                    endif;
                ?>
            </div>
            <input type="hidden" name="action" value="filter_dogs">
        </form>
    </div>
</div>

<div class="dogs dogs--all">
    <div class="container">
        <?php if( $query->have_posts() ) : ?>
            <div class="grid grid--dogs-all">
                <?php while( $query->have_posts() ) : $query->the_post(); ?> 
                    <div class="grid--3 dogs__item">
                        <div class="card card--oldest">
                            <?php $dogImage = wp_get_attachment_image_src(get_post_thumbnail_id(), 'small'); ?>
                            <div class="card__image">
                                <div class="image-container" style="background-image: url('<?php echo $dogImage[0]; ?>')"></div>
                            </div>
                            <div class="card__info">
                                <h4>
                                    <?php the_title(); ?>
                                </h4>
                                <div class="card__item">
                                    <p class="card__label">Birth Date</p>
                                    <p><?php the_field('dog_birth_date'); ?></p>
                                </div>
                                <div class="card__item">
                                    <p class="card__label">Owners Name</p>
                                    <p><?php the_field('dog_owners_name'); ?></p>
                                </div>
                                <div class="card__item">
                                    <p class="card__label">Favorite food</p>
                                    <p><?php the_field('favorite_food'); ?></p>
                                </div>
                                <div class="card__item">
                                    <p class="card__label">Favorite toy</p>
                                    <p><?php the_field('favorite_toy'); ?></p> 
                                </div>
                                <div class="card__item">
                                    <p class="card__label">Allergies</p>
                                    <?php if( get_field('food_allergies') ): ?>
                                        <p><?php the_field('food_allergies'); ?></p> 
                                    <?php else : ?>
                                        <p>-</p>
                                    <?php endif; ?>
                                </div>
                                <div class="card__item">
                                    <p class="card__label">Breed</p>
                                    <?php the_terms( $post->ID, 'breed', ' ', ' / ' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>


<?php get_footer(); ?>

