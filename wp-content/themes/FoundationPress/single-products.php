<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php $prefix = '_ad_products_'; ?>

<?php $parent_product_link = false; ?>
<?php if(isset($_GET['product'])): ?>
    <?php $parent_product_link = get_the_permalink($_GET['product']); ?>
<?php endif; ?>

<?php $finishes_meta = get_post_meta($post->ID, $prefix.'finishes', true); ?>
<?php $ref_meta = get_post_meta($post->ID, $prefix.'ref_code', true); ?>
<?php $gallery_meta = get_post_meta($post->ID, $prefix.'gallery_images', true); ?>
<?php $table_meta = get_post_meta($post->ID, $prefix.'table_dropdown', true); ?>
<?php $accessories_meta = get_post_meta($post->ID, $prefix.'select_accessory', true); ?>
<?php $related_meta = get_post_meta($post->ID, $prefix.'select_r_products', true); ?>
<?php $tech_spec_meta = get_post_meta($post->ID, 'tech_spec_group', true); ?>

<div id="page-full-width" class="single-product" role="main">
	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">

			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>

			<div class="row xxlarge-collapse product__heading">
				<header class="columns medium-4 large-3">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</header>
				<div class="columns medium-8 large-9">
					<?php if($finishes_meta != false): ?>
						<div class="product-finishes__wrapper">

							<span class="product-finishes__title">
								Available in -
							</span>

							<?php foreach($finishes_meta as $finish): ?>
								<div class="product-finish">
									<?php $finish_details_array = finishes_lookup($finish); ?>
									<img src="<?php echo get_stylesheet_directory_uri() . $finish_details_array['img']; ?>" alt="icon for <?php echo $finish_details_array['title']; ?>"/>
									<?php /* <h4><?php echo $finish_details_array['title']; ?></h4> */ ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="row xxlarge-collapse landmark--large">
				<div class="columns large-3">
					<?php if($gallery_meta != false): ?>
						<div class="product-gallery__wrapper">
							<?php include(locate_template('parts/product-gallery.php')); ?>
						</div>
					<?php endif;?>
					<?php if($ref_meta): ?>
					<div class="product-ref__wrapper">
						<span class="product-ref">
							<?php echo $ref_meta; ?>
						</span>
					</div>
					<?php endif; ?>
					<nav class="product__nav">
						<span>
							<a href="#product-description">description</a>
                            <?php if($parent_product_link): ?>
                                <a href="<?php echo $parent_product_link; ?>">return to product</a>
                            <?php else: ?>
                                <a href="#product-accessories">accessories</a>
                            <?php endif; ?>
						</span>
						<span>
							<a href="#product-quote">quote request</a>
						</span>
					</nav>
				</div>
				<div class="columns large-9">
					<?php if($table_meta != false): ?>
						<?php include(locate_template('parts/product-table-loop.php')); ?>
					<?php endif;?>
				</div>
			</div>

			<?php if($related_meta != false): ?>
				<h3>you will also require</h3>
				<div id="product-accessories" class="product-accessories__wrapper row row--flush landmark--large">
					<?php include(locate_template('parts/product-related-loop.php')); ?>
				</div>
			<?php endif; ?>

			<?php if($accessories_meta != false): ?>
				<h3 class="product-accessories__heading"><?php the_title(); ?> accessories</h3>
				<div id="product-accessories" class="product-accessories__wrapper row row--flush landmark--large">
					<?php include(locate_template('parts/product-accessories-loop.php')); ?>
				</div>
			<?php endif; ?>

			<?php if($tech_spec_meta != false): ?>
				<div id="product-description" class="product-tech-spec__wrapper row landmark--large">
					<h3>product information</h3>
					<?php include(locate_template('parts/product-tech-spec-loop.php')); ?>
				</div>
			<?php endif; ?>

			<div id ="product-quote" class="product-enquiry__wrapper" >
				<h3>quote request</h3>
				<div class="columns small-12">
					<?php gravity_form( 1, false, false, false, null, false); ?>
				</div>
			</div>

			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
			</footer>

		</article>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>
</div>
<?php get_footer(); ?>
