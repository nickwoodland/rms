<?php $accessories_count = count($accessories_meta); ?>
<?php $i = 0; ?>
<?php $product_id = $post->ID; ?>

<?php foreach($accessories_meta as $accessory): ?>

    <?php $accessory_post = get_post($accessory); ?>

    <?php if($accessory_post): ?>

        <?php $post = $accessory_post; ?>
        <?php setup_postdata($post); ?>

        <?php $prefix = '_ad_products_'; ?>
        <?php $accessory_gallery_meta = get_post_meta($post->ID, $prefix.'gallery_images', true); ?>
        <?php $accessory_thumb = array_keys(array_slice($accessory_gallery_meta, 0, 1, true)); ?>
        <?php $accessory_interchange_string = grid_interchange_string($accessory_thumb[0]); ?>
        <?php $accessory_link = add_query_arg( 'product', $product_id, get_the_permalink($post->ID)); ?>


        <?php $i++; ?>

        <div class="columns medium-2 small-6 <?php echo($i == $accessories_count ? 'end' : ''); ?>">
                <div class="accessory-listing">
                <a href="<?php echo $accessory_link; ?>">
                    <img data-interchange="<?php echo $accessory_interchange_string; ?>" />
                    <div class="accessory-listing__title">
                        <h4><?php the_title(); ?></h4>
                    </div>
                </a>
            </div>
        </div>

        <?php wp_reset_postdata(); ?>

    <?php endif; ?>

<?php endforeach; ?>
