<?php
/*
Template Name: Manufacture
*/
get_header();
$man_grid = get_post_meta($post->ID, 'man_grid_block_group', true);
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
              <div class="columns small-12 large-10 large-offset-1">
                  <div class="page-content">
                      <?php the_content(); ?>
                  </div>
              </div>
          </div>
          <?php if(!empty($man_grid)): ?>
            <?php $i = 0; ?>
            <?php $count = count($man_grid); ?>
            <div class="row collapse ">
                <div class="columns small-12 large-8 large-offset-2">
                    <div class="row manufacture-grid">
                        <?php foreach($man_grid as $grid_block): ?>
                            <?php $i++; ?>

                            <?php $banner_title = false; ?>
                            <?php $banner_link = false; ?>
                            <?php $banner_image_id = false; ?>
                            <?php $grid_interchange_string = false; ?>
                            <?php $banner_title_colour = false; ?>

                            <?php if(isset($grid_block['title'])): ?>
                            <?php $banner_title = $grid_block['title']; ?>
                            <?php endif; ?>

                            <?php if(isset($grid_block['colour'])): ?>
                            <?php $banner_title_colour = $grid_block['colour']; ?>
                            <?php endif; ?>

                            <?php if(isset($grid_block['link'])): ?>
                            <?php $banner_link = $grid_block['link']; ?>
                            <?php endif; ?>

                            <?php if($banner_title): ?>
                                <div class="columns small-6 medium-4 <?php echo($i == $count ? 'end' : ''); ?>">

                                    <div class="grid-block grid-block--manufacture">

                                        <div class="grid-block__title-wrapper">
                                            <?php if($banner_link){ echo"<a href='" . $banner_link . "'>"; } ?>
                                                <h3 class="grid-block__title <?php echo $banner_title_colour; ?>"><?php echo $banner_title; ?></h3>
                                            <?php if($banner_link){ echo"</a>"; } ?>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
          <?php endif; ?>
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
