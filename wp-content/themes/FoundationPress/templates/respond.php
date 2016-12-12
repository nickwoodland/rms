<?php
/*
Template Name: Respond
*/
get_header();
$respond_graphic = get_post_meta($post->ID, '_respond_graphic', true);
$respond_heading = get_post_meta($post->ID, '_respond_heading', true);
$respond_link = get_post_meta($post->ID, '_respond_link', true);
?>
<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php include(locate_template('parts/banner-header.php')); ?>
    <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <?php // get_template_part( 'parts/featured-image' ); ?>
      <div class="entry-content">

          <div class="row collapse">

              <div class="columns medium-12 xlarge-10 xlarge-offset-1">

                    <?php if($respond_graphic): ?>

                        <?php $phone = of_get_option('contact_telephone'); ?>
                        <?php $email = of_get_option('contact_email'); ?>


                        <div class="respond__graphic" style="background-image:url('<?php echo $respond_graphic; ?>')">
                            <?php if($respond_link){?><a class="respond__link" href="<?php echo $respond_link; ?>"></a><?php }?>
                            <div class="respond__flex">
                                <div class="respond__details">
                                    <?php if($respond_heading): ?>
                                        <h3 class="respond__heading"><?php echo $respond_heading; ?></h3>
                                    <?php endif; ?>

                                    <?php if($phone): ?>
                                        <a class="respond__phone" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                                    <?php endif; ?>

                                    <?php if($email): ?>
                                        <a class="respond__email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                <?php endif; ?>

                <div class="page-content">
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
