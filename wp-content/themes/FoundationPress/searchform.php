<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
 ?>
<div class="search__wrapper">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" value="" name="s" id="s" class="searchtext" placeholder="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>">
		<input type="hidden" name="post_type" value="products" />
        <input type="hidden" name="post_type" value="post" />
        <input type="hidden" name="post_type" value="page" />
		<input type="submit" id="searchsubmit" value="" class="searchsubmit searchsubmit--icon">
		<i class="search-icon fa fa-search"></i>
	</form>
</div>
