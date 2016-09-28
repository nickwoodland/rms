<?php

// Hooks the main query object before it retrieves posts, and allows us to modify it here instead of in the
// templates themselves.

function site_query_controller($query) {

    //don't want to affect admin pages!

    if(!is_admin()) :

        if($query->is_main_query()) : // don't affect custom queries that we might be running

            //Global params, will affect all querys on the site. Set these to fairly ubiquitous values.
            // We use alphabetical ordering for most post types.
/*
            $query->set('posts_per_page','12');
            $query->set('orderby','menu_order title');
            $query->set('order','ASC');
            $query->set('post_status','publish');
*/
            //Further conditionalise based on archive type

            /*if(is_home() || is_category()) : // In the context of WP, 'home' is the main posts archive page

                $query->set('orderby', 'date');
                $query->set('order','DESC');
                $query->set('posts_per_page', 9);

            endif;*/


            // Conditionalise for a CPT archive

            /*if(is_post_type_archive('products') ) :
                //$query->set('posts_per_page','9');
                $query->set('orderby','title');
                $query->set('order','DESC');
            endif;*/
            if(is_home()) :
                $query->set('posts_per_page', 16);
            endif;

            // Conditionalise for a CPT Tax/term archive

            if(is_tax('product-types') ) :
                //$query->set('posts_per_page','9');
                $query->set('orderby','menu_order title');
                $query->set('order','ASC');
            endif;

            if(is_search() ):
                $query->set('posts_per_page', 24);
            endif;


           // endif; //service archive check

        endif; //main query check

    endif;  //admin check

    return $query;
}
add_action('pre_get_posts', 'site_query_controller');
