<?php $r_products_count = count($related_meta); ?>
<?php $i = 0; ?>
<?php foreach($related_meta as $r_product): ?>

    <?php $r_product_post = get_post($r_product); ?>

    <?php if($r_product_post): ?>

        <?php $post = $r_product_post; ?>
        <?php setup_postdata($post); ?>

        <?php $prefix = '_ad_products_'; ?>
        <?php $r_product_gallery_meta = get_post_meta($post->ID, $prefix.'gallery_images', true); ?>
        <?php $r_product_thumb = array_keys(array_slice($r_product_gallery_meta, 0, 1, true)); ?>

        <?php $r_product_interchange_string = grid_interchange_string($r_product_thumb[0]); ?>

        <?php $i++; ?>

        <div class="columns medium-2 small-6 <?php echo($i == $r_products_count ? 'end' : ''); ?>">
                <div class="accessory-listing">
                <a href="<?php the_permalink(); ?>">
                    <img data-interchange="<?php echo $r_product_interchange_string; ?>" />
                    <div class="accessory-listing__title">
                        <h4><?php the_title(); ?></h4>
                    </div>
                </a>
            </div>
        </div>

        <?php wp_reset_postdata(); ?>

    <?php endif; ?>

<?php endforeach; ?>
