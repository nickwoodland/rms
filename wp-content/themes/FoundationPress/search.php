<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 columns" role="main">
        <div class="row collapse">
          <div class="columns small-12 large-10 large-offset-1">

        		<?php do_action( 'foundationpress_before_content' ); ?>

        		<h2 class="search-heading"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h2>

            	<?php if ( have_posts() ) : ?>

            		<?php while ( have_posts() ) : the_post(); ?>
            			<?php include(locate_template('parts/search-listing.php'));?>
            		<?php endwhile; ?>

            		<?php else : ?>
            			<?php get_template_part( 'content', 'none' ); ?>

            	<?php endif;?>

            	<?php do_action( 'foundationpress_before_pagination' ); ?>

            	<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>

            		<nav id="post-nav">
            			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
            			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
            		</nav>
            	<?php } ?>

            	<?php do_action( 'foundationpress_after_content' ); ?>

            </div>
        </div>
	</div>
</div>
<?php get_footer(); ?>
