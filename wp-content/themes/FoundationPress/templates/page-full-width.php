<?php
/*
Template Name: Full Width
*/
get_header(); ?>
<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
      <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <?php // get_template_part( 'parts/featured-image' ); ?>
      <div class="entry-content">
          <div class="row collapse">
              <div class="columns small-12 large-10 large-offset-1">
                  <?php the_content(); ?>
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
