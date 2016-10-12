<?php
$title = false;
$subtitle = false;
$colour = false;
$post_type = get_query_var( 'post_type', FALSE );
if($post_type):
    if('products' == $post_type):
        $page = get_page_by_path('supply');
    elseif('catalogues' == $post_type):
        $page = get_page_by_path('catalogues');
    endif;
endif;
if($page):
    $title = $page->post_title;
    $subtitle = get_post_meta($page->ID, '_page_subtitle', true);
    $colour = get_post_meta($page->ID, '_page_title_colour', true);
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
