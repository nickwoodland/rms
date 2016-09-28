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
<?php $product_type_args = array(
    'parent'        => 0,
    'hide_empty' => false,
); ?>
<?php $accessories_term = get_term_by('slug', 'accessories', 'product-types'); ?>
<?php if($accessories_term): ?>
    <?php $product_type_args['exclude'] = $accessories_term->term_id; ?>
<?php endif; ?>

<?php $painting_finishing = false; ?>
<?php $painting_finishing = get_page_by_path('painting-finishing'); ?>

<?php $product_type_terms = get_terms('product-types',$product_type_args ); ?>
<div id="page-full-width" role="main">

        <?php if(!empty($product_type_terms)): ?>

            <div class="row collapse">

                <?php include(locate_template('parts/product-type-term-loop.php')); ?>

                <?php if($painting_finishing): ?>
                    <div class="columns small-6 medium-4 large-3 end">

                        <?php $term_image_id = get_post_thumbnail_id($painting_finishing->ID); ?>
                        <?php $grid_interchange_string = grid_interchange_string($term_image_id); ?>

                        <article class="grid-block" data-interchange="<?php echo $grid_interchange_string; ?>">
                            <div class="grid-block__inner">
                                <a class="grid-block__link" href="<?php echo get_permalink($painting_finishing->ID); ?>">
                                    <h3 class="grid-block__title"><?php echo get_the_title($painting_finishing->ID); ?></h3>
                                </a>
                            </div>
                        </article>

                    </div>
                <?php endif; ?>

            </div>

        <?php else : ?>

        		<?php get_template_part( 'content', 'none' ); ?>

        <?php endif; // End have_posts() check. ?>

</div>

<?php get_footer(); ?>
