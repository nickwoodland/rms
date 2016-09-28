<?php foreach($tech_spec_meta as $tech ): ?>

    <?php $tech_title = (isset($tech['title']) && "" != $tech['title']  ?  $tech['title'] : false); ?>
    <?php $tech_image = (isset($tech['image']) && "" != $tech['image']  ?  $tech['image_id'] : false); ?>
    <?php $tech_content = (isset($tech['content']) && "" != $tech['content']  ?  $tech['content'] : false); ?>
    <?php $tech_interchange_string = false; ?>

    <div class="tech-spec row">
        <?php if($tech_title): ?>
            <div class="columns small-12">
                <h4 class="tech-spec__heading">
                    <?php echo $tech_title; ?>
                </h4>
            </div>
        <?php endif; ?>

        <?php if($tech_image): ?>
            <div class="columns medium-2">
                <?php $tech_interchange_string = grid_interchange_string($tech_image); ?>
                <img data-interchange="<?php echo $tech_interchange_string; ?>" />
            </div>
        <?php endif; ?>

        <?php if($tech_content): ?>
            <div class="columns <?php echo ($tech_image ? 'medium-10' : 'small-12'); ?> tech-spec__content">
                <?php echo apply_filters('the_content', $tech_content); ?>
            </div>
        <?php endif; ?>
    </div>

<?php endforeach; ?>
