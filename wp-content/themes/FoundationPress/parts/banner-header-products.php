<?php
$title = 'Supply';
$subtitle = false;
$colour = false;
$product_type = get_queried_object();
if($product_type):
    $subtitle = $product_type->name;
else:
    $subtitle = 'Product Range';
endif;
?>
<header class="bg--header header--subtitle product <?php echo $colour; ?>">
    <div class="row row--pad">
      <div class="columns small-12">
          <div class="header__inner">
               <h1 class="entry-title"><?php echo $title; ?></h1>
               <h2 class="entry-subtitle"><?php echo $subtitle; ?></h2>
          </div>
      </div>
    </div>
</header>
