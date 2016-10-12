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

$secondary_banners = get_post_meta($post->ID, 'banner_block_group', true);
?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>">
        <?php if(!empty($banner_main_array_meta)): ?>
            <div class="banner-main row">

                <div class="columns small-12">

                    <div class="row row--pad">

                        <?php foreach($banner_main_array_meta as $grid_block): ?>

                            <?php $block_title = false; ?>
                            <?php $block_subtitle = false; ?>
                            <?php $block_link = false; ?>
                            <?php $block_image_id = false; ?>
                            <?php $grid_interchange_string = false; ?>

                            <?php $block_title = $grid_block['title']; ?>
                            <?php $block_subtitle = $grid_block['subtitle']; ?>
                            <?php $block_colour = $grid_block['colour']; ?>
                            <?php $block_link = $grid_block['link']; ?>
                            <?php $block_image_id = $grid_block['image_id']; ?>
                            <?php $grid_interchange_string = grid_interchange_string($block_image_id); ?>

                            <div class="columns small-12 medium-4">

                            <div class="grid-block--circle">
                                <div class="grid-block__title-wrapper">
                                    <div class="grid-block__title <?php echo $block_colour; ?>">
                                        <?php if($block_title): ?>
                                            <h3><?php echo $block_title; ?></h3>
                                        <?php endif; ?>
                                        <?php if($block_subtitle):?>
                                            <h4><?php echo $block_subtitle; ?></h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="grid-block__zoom">
                                    <article class="grid-block grid-block--banner" data-interchange="<?php echo $grid_interchange_string; ?>">

                                        <div class="grid-block__inner">

                                            <a class="grid-block__link" href="<?php echo $block_link; ?>">
                                            </a>

                                        </div>

                                    </article>
                                </div>
                            </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

        <?php endif; ?>

        <?php if(!empty($secondary_banners)): ?>
            <div class="banner-secondary">
                <?php foreach($secondary_banners as $secondary_banner): ?>

                    <?php $banner_title = false; ?>
                    <?php $banner_link = false; ?>
                    <?php $banner_image_id = false; ?>
                    <?php $grid_interchange_string = false; ?>
                    <?php $banner_title_colour = false; ?>

                    <?php if(isset($secondary_banner['title'])): ?>
                        <?php $banner_title = $secondary_banner['title']; ?>
                    <?php endif; ?>

                    <?php if(isset($secondary_banner['colour'])): ?>
                        <?php $banner_title_colour = $secondary_banner['colour']; ?>
                    <?php endif; ?>

                    <?php if(isset($secondary_banner['link'])): ?>
                        <?php $banner_link = $secondary_banner['link']; ?>
                    <?php endif; ?>

                    <?php if(isset($secondary_banner['image_id'])): ?>
                        <?php $banner_image_id = $secondary_banner['image_id']; ?>
                    <?php endif; ?>

                    <?php $grid_interchange_string = banner_interchange_string($banner_image_id); ?>

                    <div class="grid-block--fullwidth">

                        <div class="grid-block__title-wrapper">
                            <h3 class="grid-block__title <?php echo $banner_title_colour; ?>"><?php echo $banner_title; ?></h3>
                        </div>

                        <div class="grid-block__zoom">
                            <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">

                                <div class="grid-block__inner">

                                    <a class="grid-block__link" href="<?php echo $banner_link; ?>">
                                    </a>

                                </div>

                            </article>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
