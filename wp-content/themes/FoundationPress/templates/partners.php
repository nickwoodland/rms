<?php
/*
Template Name: Partners
*/
get_header(); ?>
<?php $connected_form = get_post_meta($post->ID, '_partners_page_form_dropdown', true); ?>
<?php $downloads =  get_post_meta($post->ID, 'partners_file_download_group', true); ?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="row collapse">
        <div class="page-flag-sidebar columns xlarge-9 large-12" id="post-<?php the_ID(); ?>">
            <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
              <header>
                  <h1 class="entry-title"><?php the_title(); ?></h1>
              </header>
              <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
              <?php // get_template_part( 'parts/featured-image' ); ?>
              <div class="entry-content">
                  <?php the_content(); ?>
              </div>
              <?php if($downloads): ?>
                  <div class="row collapse">
                      <?php foreach($downloads as $download): ?>
                          <div class="columns small-12 medium-6 large-4 <?php echo ($i == $post_count ? 'end' : ''); ?>">

                              <?php $thumb = $download['image_id']; ?>
                              <?php $title = $download['title']; ?>
                              <?php $grid_interchange_string = grid_interchange_string($thumb); ?>
                              <?php $download_link = $download['link']; ?>

                              <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">
                                  <div class="grid-block__inner">
                                      <a class="grid-block__link" href="<?php echo $download_link; ?>" target="_blank">
                                          <?php if($title != ""): ?>
                                              <h3 class="grid-block__title"><?php echo $title; ?></h3>
                                          <?php endif; ?>
                                      </a>
                                  </div>
                              </article>

                          </div>
                      <?php endforeach; ?>
                  </div>
              <?php endif; ?>
              <?php if($connected_form): ?>
                  <div class="row">
                      <div class="form-wrapper columns small-12">
                          <div class="form__inner">
                              <?php gravity_form( $connected_form, false, false, false, null, false); ?>
                          </div>
                      </div>
                  </div>
              <?php endif; ?>
              <footer>
                  <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
                  <p><?php the_tags(); ?></p>
              </footer>
              <?php do_action( 'foundationpress_page_before_comments' ); ?>
              <?php comments_template(); ?>
              <?php do_action( 'foundationpress_page_after_comments' ); ?>
            </article>
        </div>
        <div class="columns large-3 show-for-xlarge fp-flag__wrapper">
            <div class="fp-flag">
            </div>

            <?php include(locate_template('parts/sidebar-slider.php')); ?>

        </div>
    </div>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
