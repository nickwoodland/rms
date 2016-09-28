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

<?php $current_term = get_queried_object(); ?>
<?php $child_term_args = array(
    'parent' => $current_term->term_id,
    'hide_empty' => false
); ?>
<?php $child_terms = get_terms('product-types',$child_term_args ); ?>

<div id="page-full-width" role="main">

        <?php if(!empty($child_terms)): ?>

            <div class="row collapse">

                <?php include(locate_template('parts/product-type-child-term-loop.php')); ?>

            </div>

        <?php else : ?>

        	<?php if ( have_posts() ) : ?>

                <div class="row collapse">

                    <?php include(locate_template('parts/product-type-products-loop.php')); ?>

                </div>

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

        <?php endif; ?>

</div>

<?php get_footer(); ?>
