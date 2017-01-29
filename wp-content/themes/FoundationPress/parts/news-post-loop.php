<?php /* Start the Loop */ ?>
<?php global $wp_query;?>
<?php $post_count = count($wp_query->posts); ?>
<?php $i = 0; ?>
<?php $title_font_size = of_get_option('case_studies_title_size_grid'); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php $i++; ?>
    <div class="columns small-6 medium-4 large-3  <?php echo ($i == $post_count ? 'end' : ''); ?>">

        <?php $featured_img_id = get_post_thumbnail_id(); ?>

        <?php $grid_interchange_string = grid_interchange_string($featured_img_id); ?>

        <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">
            <div class="grid-block__inner">
                <a class="grid-block__link" href="<?php the_permalink(); ?>">
                    <h3 class="grid-block__title" <?php echo($title_font_size ? 'style="font-size:'. $title_font_size .'"' : '')?> ><?php the_title(); ?></h3>
                </a>
            </div>
        </article>

    </div>
<?php endwhile; ?>
