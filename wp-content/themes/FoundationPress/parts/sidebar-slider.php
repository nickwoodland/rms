<?php $sidebar_img_1 = of_get_option('sidebar_img_1'); ?>
<?php $sidebar_img_2 = of_get_option('sidebar_img_2'); ?>
<?php $sidebar_img_3 = of_get_option('sidebar_img_3'); ?>
<?php $products_archive = get_post_type_archive_link('products'); ?>

<?php if($sidebar_img_1 || $sidebar_img_2 || $sidebar_img_3): ?>
<a href="<?php echo $products_archive; ?>">
    <div id="sidebar-carousel" class="sidebar-slider">
        <?php if($sidebar_img_1): ?>
            <div class=""><img src="<?php echo $sidebar_img_1; ?>" /></div>
        <?php endif; ?>
        <?php if($sidebar_img_2): ?>
            <div class=""><img src="<?php echo $sidebar_img_2; ?>" /></div>
        <?php endif; ?>
        <?php if($sidebar_img_3): ?>
            <div class=""><img src="<?php echo $sidebar_img_3; ?>" /></div>
        <?php endif; ?>
    </div>
</a>
<?php endif; ?>
