<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php $title_font_size = of_get_option('case_studies_title_size_single'); ?>
<?php $body_font_size = of_get_option('general_text_size'); ?>
<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
          <div class="row collapse">
              <div class="columns small-12 large-10 large-offset-1">
                	<header>
                		<h1 class="entry-title"  <?php echo($title_font_size ? 'style="font-size:'. $title_font_size .'"' : '')?> ><?php the_title(); ?></h1>
                		<?php // foundationpress_entry_meta(); ?>
                	</header>
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
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php // get_sidebar(); ?>
</div>
<?php get_footer(); ?>
