<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php $nothing_found_size = of_get_option('nothing_found_size'); ?>
<article class="nothing-found">
	<header class="page-header">
		<h1 class="page-title" <?php echo($nothing_found_size ? 'style="font-size:'. $nothing_found_size .'"' : '')?>><?php _e( 'Nothing Found', 'foundationpress' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'foundationpress' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'foundationpress' ); ?></p>
		<?php // get_search_form(); ?>

		<?php else : ?>

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'foundationpress' ); ?></p>
		<?php  // get_search_form(); ?>

		<?php endif; ?>
	</div>
</article>
