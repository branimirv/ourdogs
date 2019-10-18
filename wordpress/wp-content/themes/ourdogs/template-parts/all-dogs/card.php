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