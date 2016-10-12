<?php
/*
Template Name: Full Width
*/
get_header(); ?>
<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
        <?php include(locate_template('parts/banner-header.php')); ?>
        <div class="row collapse">
            <div class="columns small-12 large-10 large-offset-1">
                <div class="page-content">
                    <div class="row">

                        <div class="columns medium-6">
                            <div class="contact__address">
                				<?php if("" != $post->post_content): ?>
                					<?php the_content(); ?>
                				<?php endif; ?>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9713.951573407414!2d-2.145787!3d52.506509!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe7a15cf6e84c2c8d!2sArmorduct+Systems+Ltd!5e0!3m2!1sen!2sin!4v1457686639658" width="95%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="form-wrapper columns medium-6">
                            <div class="form__inner">
                                <?php gravity_form( 'Contact', false, false, false, null, false); ?>
                            </div>
                        </div>
            		</div>
                </div>
            </div>
        </div>
    </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
