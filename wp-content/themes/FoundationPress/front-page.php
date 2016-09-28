<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="row collapse">
        <div class="columns xlarge-9 large-12" id="post-<?php the_ID(); ?>">
            <?php $grid_meta = get_post_meta($post->ID, 'grid_block_group', true); ?>

            <?php if(!empty($grid_meta)): ?>
                <div class="grid">
                    <div class="row collapse">
                        <?php foreach($grid_meta as $grid_block): ?>

                            <?php $block_title = $grid_block['title']; ?>
                            <?php $block_link = $grid_block['link']; ?>
                            <?php $block_image_id = $grid_block['image_id']; ?>
                            <?php $grid_interchange_string = grid_interchange_string($block_image_id); ?>

                            <div class="columns small-6 medium-4">
                                <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">

                                    <div class="grid-block__inner">

                                        <a class="grid-block__link" href="<?php echo $block_link; ?>">
                                            <h3 class="grid-block__title grid-block__title--hidden"><?php echo $block_title; ?></h3>
                                        </a>

                                    </div>

                                </article>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="columns large-3 show-for-xlarge fp-flag__wrapper">
            <div class="fp-flag">
            </div>
            <?php include(locate_template('parts/sidebar-slider.php')); ?>
        </div>

<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
