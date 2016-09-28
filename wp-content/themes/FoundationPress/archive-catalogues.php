<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php $form_submit = isset($_GET['form_submit']) ? $_GET['form_submit'] : false; ?>
<div class="row collapse" data-equalizer data-equalize-on="large">
	<div class="columns xlarge-9 large-12" id="post-<?php the_ID(); ?>" data-equalizer-watch>
		<article class="main-content catalogues-sidebar">

			<?php if ( have_posts() ) : ?>

				<?php if($form_submit): ?>

					<?php include(locate_template('parts/catalogues-loop-enabled.php')); ?>

				<?php else : ?>

					<?php include(locate_template('parts/catalogues-loop-disabled.php')); ?>

				<?php endif; ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php } ?>

		</article>

	</div>
	<div class="columns large-3 catalogues-form__wrapper" data-equalizer-watch>
		<div class="catalogues__sidebar-form">
			<?php if($form_submit): ?>
				Thanks! Download your catalogues by clicking on them to the left.
			<?php else: ?>
				<?php gravity_form( 3, false, false, false, null, false); ?>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>
