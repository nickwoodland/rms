<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Register all navigation menus */
require_once( 'library/query-controller.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** content locking for partners page */
require_once( 'library/login-handling.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Set WP IMG sizes */
require_once( 'library/img-sizes.php' );

/** interchange string generation functions */
require_once( 'library/img-interchange.php' );

/** CMB2 Show On Filters */
require_once( 'library/cmbs-show-on-filters.php' );

/** Products CPT */
require_once( 'library/cpt-products.php' );

/** Products CPT */
require_once( 'library/cpt-catalogues.php');
/** Products CMB */
require_once( 'library/cmbs-products.php' );

/** Products CMB */
require_once( 'library/cmbs-catalogues.php' );

/** Products CMB */
require_once( 'library/cmbs-product-type.php' );

/** front page CMB */
require_once( 'library/cmbs-fp.php' );

/** partners page CMB */
require_once( 'library/cmbs-partners.php' );

/** finishes lookup array */
require_once( 'library/finishes-lookup.php' );

/** gform hooks for catalogue functionality */
require_once( 'library/gforms-catalogues.php' );

/** relevanssi hooks */
require_once( 'library/search-hooks.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

?>
