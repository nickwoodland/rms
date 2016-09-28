<?php if(count($gallery_meta) == 1): ?>

    <?php foreach($gallery_meta as $img_id => $url): ?>
        <?php $gallery_interchange_string = grid_interchange_string($img_id); ?>
        <div class="product-gallery__single">
            <img data-interchange="<?php echo $gallery_interchange_string; ?>" />
        </div>
    <?php endforeach; ?>

<?php else : ?>

    <div class="sync-carousel--head__wrapper">
        <ul id="sync-carousel--head" class="sync-carousel sync-carousel--head">
            <?php foreach($gallery_meta as $img_id => $url): ?>
                <?php $gallery_interchange_string = grid_interchange_string($img_id); ?>
                <li class="item">
                    <img data-interchange="<?php echo $gallery_interchange_string; ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="sync-carousel--nav__wrapper">
        <ul id="sync-carousel--nav" class="sync-carousel sync-carousel--nav">
            <?php foreach($gallery_meta as $img_id => $url): ?>
                <?php $gallery_interchange_string = grid_interchange_string($img_id); ?>
                <li class="item">
                    <img data-interchange="<?php echo $gallery_interchange_string; ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
