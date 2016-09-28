<?php /* Start the Loop */ ?>
<?php global $wp_query;?>
<?php $post_count = count($wp_query->posts); ?>
<?php $i = 0; ?>

<div class="disabled__wrapper">
    <div class="disabled__overlay">
        <strong>please complete the form to the right for access to our catalogues, or to order via post.</strong>
    </div>
    <div class="row row--flush">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php $i ++; ?>
            <div class="columns small-12 medium-6 large-4 <?php echo ($i == $post_count ? 'end' : ''); ?>">

                <?php $thumb = get_post_thumbnail_id(); ?>
                <?php $grid_interchange_string = grid_interchange_string($thumb); ?>
                <?php // $download_link = get_post_meta($post->ID, '_ad_catalogues_download_link', true); ?>

                <article class="grid-block grid-block--catalogue" data-interchange="<?php echo $grid_interchange_string; ?>">
                    <div class="grid-block__inner">
                        <a class="grid-block__link" href="<?php /* echo $download_link; */ ?>">
                            <h3 class="grid-block__title"><?php the_title(); ?></h3>
                        </a>
                    </div>
                </article>

            </div>
        <?php endwhile; ?>
    </div>
</div>
