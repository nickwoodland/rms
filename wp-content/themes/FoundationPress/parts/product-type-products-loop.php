<?php /* Start the Loop */ ?>
<?php global $wp_query;?>
<?php $post_count = count($wp_query->posts); ?>
<?php $i = 0; ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php $i++; ?>
    <div class="columns small-6 medium-4 large-3 <?php echo ($i == $post_count ? 'end' : ''); ?>">

        <?php $product_gallery = get_post_meta($post->ID, '_ad_products_gallery_images', true); ?>
        <?php $product_gallery_ids = array_keys($product_gallery); ?>
        <?php $product_featured_id = array_slice($product_gallery_ids ,0,1); ?>

        <?php $grid_interchange_string = grid_interchange_string($product_featured_id[0]); ?>

        <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">
            <div class="grid-block__inner">
                <a class="grid-block__link" href="<?php the_permalink(); ?>">
                    <h3 class="grid-block__title"><?php the_title(); ?></h3>
                </a>
            </div>
        </article>

    </div>
<?php endwhile; ?>
