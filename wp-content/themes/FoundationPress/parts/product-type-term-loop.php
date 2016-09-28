<?php $product_term_count = count($product_type_terms); ?>
<?php $i = 0; ?>

<?php foreach($product_type_terms as $grid_term): ?>

    <?php $i ++; ?>
    <div class="columns small-6 medium-4 large-3 <?php echo($i == $product_term_count && $painting_finishing != true ? 'end' : ''); ?>">

        <?php $term_image_id = get_term_meta( $grid_term->term_id, '_product_type_image_id', 1 ); ?>
        <?php $grid_interchange_string = grid_interchange_string($term_image_id); ?>

        <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">
            <div class="grid-block__inner">
                <a class="grid-block__link" href="<?php echo get_term_link($grid_term); ?>">
                    <h3 class="grid-block__title"><?php echo $grid_term->name; ?></h3>
                </a>
            </div>
        </article>

    </div>
<?php endforeach; ?>
