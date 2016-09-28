<?php
function partners_template_redirect()
{
    global $post;

    $current_post = $post->ID;
    $partners_page = get_page_by_path('partners');
    $partners_children = get_pages(array('child_of'=>$partners_page->ID));
    $partners_children_array = array();

    foreach($partners_children as $child):
        $partners_children_array[]= $child->ID;
    endforeach;

    if( in_array($current_post, $partners_children_array) && ! is_user_logged_in() )
    {
        wp_redirect( home_url( '/partners/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'partners_template_redirect' );

add_filter( 'auth_cookie_expiration', 'extend_auth_cookie_duration' );

function extend_auth_cookie_duration( $expirein ) {
   return 31556926; // 1 year in seconds
}

/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */

function login_redirect_conf( $redirect_to, $request, $user ) {
    //is there a user to check?
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        //check for admins
        if ( in_array( 'administrator', $user->roles ) || in_array('supereditor', $user->roles) || in_array('editor', $user->roles)) {
            // redirect them to the default place
            return admin_url();
        } else {
            return home_url( '/partners/' );
        }
    } else {

        return home_url( '/partners/' );
    }
}

add_filter( 'login_redirect', 'login_redirect_conf', 10, 3 );

function login_fail_conf ( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( add_query_arg( array('action' => 'failed'), home_url('/partners') ) );  // append failed login info
      exit;
   }
}

add_action( 'wp_login_failed', 'login_fail_conf' );  // hook failed login


function login_empty_conf ( $username, $pwd ) {

  $request = $_SERVER['REQUEST_URI'];

  if (!strstr($request,'wp-admin')  ) {
      if(empty( $username ) || empty( $pwd ) ){
          wp_redirect( add_query_arg( array('action' => 'empty'), home_url('/partners') ) );
          exit();
      }
  }
}

add_action( 'wp_authenticate', 'login_empty_conf', 1, 2 );


function cc_hide_admin_bar() {
    show_admin_bar(false);
}
add_action('set_current_user', 'cc_hide_admin_bar');
