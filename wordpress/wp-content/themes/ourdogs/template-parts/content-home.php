<?php
/**
 * Template Name: Home Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordpress
 */
?>
<?php  get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php $thumbHero = get_the_post_thumbnail_url( $post, 'extra-large'); ?>

    <div class="hero hero--home">
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

<div class="dogs dogs--current-birthday">
  <div class="container">
    <?php
      $current_month = date('m');
      $filter_month = $current_month;

      $args = array(
          'post_type'			=> 'dog',
          'orderby'        => 'meta_value_num',
          'order'          => 'ASC',
          'meta_query' => array(
            array(
              'key'      => 'dog_birth_date',
              'compare'  => 'REGEXP',
              'value'    => '[0-9]{4}' . $filter_month . '[0-9]{2}',
            ),    
          )
      );
    
      $query = new WP_Query($args);     
    ?>

    <?php if ( $query -> have_posts() ) : ?>
       <div class="slider slider--celebrating-dogs js-celebrating-dogs">
      <?php while ( $query -> have_posts() ) : $query -> the_post() ; ?>
        <div class="slider__item">
          <div class="card card--primary">
            <?php $dogImage = wp_get_attachment_image_src(get_post_thumbnail_id(), 'small'); ?>
            <div class="card__image">
                <div class="image-container" style="background-image: url('<?php echo $dogImage[0]; ?>')"></div>
            </div>
            <div class="card__info">
              <h4>
                <?php the_title(); ?>
              </h4>
              <div class="card__item">
                <p class="card__label">Favorite food</p>
                <p><?php the_field('favorite_food'); ?></p>
              </div>
              <?php if( get_field('food_allergies') ): ?>
                <div class="card__item">
                    <p class="card__label">Allergies</p>
                    <p><?php the_field('food_allergies'); ?></p> 
                </div>
              <?php endif; ?>
              <div class="card__item">
                <p class="card__label">Favorite toy</p>
                <p><?php the_field('favorite_toy'); ?></p> 
              </div>
            </div>
          </div>
        </div>  
      <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <h2></h2>
    <?php wp_reset_postdata(); ?>
  </div>
</div>

<?php get_footer(); ?>

