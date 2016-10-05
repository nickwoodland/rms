<?php
/*
Template Name: Full Width
*/
get_header(); ?>
<?php
$banner_main_array_keys = array('banner_main_group_1', 'banner_main_group_2', 'banner_main_group_3');
$banner_main_array_meta = array();

foreach($banner_main_array_keys as $key) {
    $meta = get_post_meta($post->ID, $key, true)[0];
    if($meta && ($meta['image_id'] != 0)) {
        $banner_main_array_meta[$key] = $meta;
    }
}

$seconday_banners = get_post_meta($post->ID, 'banner_block_group', true);
?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>">
        <?php if(!empty($banner_main_array_meta)): ?>
            <div class="banner-main">

                <div class="row">

                    <?php foreach($banner_main_array_meta as $grid_block): ?>

                        <?php $block_title = $grid_block['title']; ?>
                        <?php $block_link = $grid_block['link']; ?>
                        <?php $block_image_id = $grid_block['image_id']; ?>
                        <?php $grid_interchange_string = grid_interchange_string($block_image_id); ?>

                        <div class="columns small-12 medium-4">

                            <article class="grid-block grid-block--banner" data-interchange="<?php echo $grid_interchange_string; ?>">

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

        <?php if(!empty($seconday_banners)): ?>
            <div class="banner-secondary">
                <?php foreach($seconday_banners as $seconday_banner): ?>

                    <?php $banner_title = $seconday_banner['title']; ?>
                    <?php $banner_title_colour = $seconday_banner['colour']; ?>
                    <?php $banner_link = $seconday_banner['link']; ?>
                    <?php $banner_image_id = $seconday_banner['image_id']; ?>
                    <?php $grid_interchange_string = banner_interchange_string($banner_image_id); ?>


                    <article class="grid-block grid-block--fullwidth" data-interchange="<?php echo $grid_interchange_string; ?>">

                        <div class="grid-block__inner">

                            <a class="grid-block__link" href="<?php echo $banner_link; ?>">
                                <h3 class="grid-block__title <?php echo $banner_title_colour; ?>"><?php echo $banner_title; ?></h3>
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
