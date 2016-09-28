<?php $child_term_count = count($child_terms); ?>
<?php $i = 0; ?>
<?php foreach($child_terms as $grid_term): ?>

    <?php $lone_term_product = false; ?>

    <?php $i++; ?>
    <?php $term_count = $grid_term->count; ?>

    <?php if($term_count == 1): ?>
        <?php  $lone_term_product = get_posts(
                    array(
                        'post_type'=>'products',
                        'posts_per_page'=>1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product-types',
                                'field' => 'term_id',
                                'terms' => $grid_term->term_id
                            ),
                        )
                    )
                );
        ?>
    <?php endif; ?>

    <div class="columns small-6 medium-4 large-3  <?php echo($i == $child_term_count ? 'end' : ''); ?>">

        <?php $term_image_id = get_term_meta( $grid_term->term_id, '_product_type_image_id', 1 ); ?>
        <?php $grid_interchange_string = grid_interchange_string($term_image_id); ?>

        <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">
            <div class="grid-block__inner">
                <a class="grid-block__link" href="<?php echo ($lone_term_product ? get_permalink($lone_term_product[0]->ID) : get_term_link($grid_term)); ?>">
                    <h3 class="grid-block__title"><?php echo $grid_term->name; ?></h3>
                </a>
            </div>
        </article>

    </div>
<?php endforeach; ?>
