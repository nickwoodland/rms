<?php $subtitle = get_post_meta($post->ID, '_page_subtitle', true); ?>
<?php $subtitle_colour = get_post_meta($post->ID, '_page_title_colour', true); ?>
<?php $slider_images = get_post_meta($post->ID, '_page_slide_images', true); ?>
<header class="bg--header header--subtitle <?php echo $subtitle_colour; ?> <?php echo(!$slider_images ? 'header--margin' : ''); ?>">
    <div class="row row--pad">
        <div class="columns small-12">
          <div class="header__inner">
               <h1 class="entry-title"><?php the_title(); ?></h1>
               <?php if($subtitle): ?>
                   <h2 class="entry-subtitle"><?php echo $subtitle; ?></h2>
               <?php endif; ?>
          </div>
        </div>
    </div>
</header>
<?php if($slider_images): ?>
    <div id="header-carousel" class="banner-slider">
        <?php foreach($slider_images as $slide_id => $slide_url): ?>
            <?php $slide_interchange_string = banner_interchange_string($slide_id); ?>
            <img data-interchange="<?php echo $slide_interchange_string; ?>" />
        <?php endforeach; ?>
    </div>
<?php endif; ?>
