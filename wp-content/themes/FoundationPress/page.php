<?php
/*
Template Name: Full Width
*/
get_header(); ?>
<?php $body_font_size = of_get_option('general_text_size'); ?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php include(locate_template('parts/banner-header.php')); ?>
    <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <?php // get_template_part( 'parts/featured-image' ); ?>
      <div class="entry-content">
          <div class="row collapse">
              <div class="columns small-12 large-10 large-offset-1">
                  <div class="page-content" <?php echo($body_font_size ? 'style="font-size:'. $body_font_size .'"' : '')?>>
                      <?php the_content(); ?>
                  </div>
              </div>
          </div>
      </div>
      <footer>
          <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
          <p><?php the_tags(); ?></p>
      </footer>
      <?php do_action( 'foundationpress_page_before_comments' ); ?>
      <?php comments_template(); ?>
      <?php do_action( 'foundationpress_page_after_comments' ); ?>
    </article>

<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
