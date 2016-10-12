<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">

		<div class="main-navigation top-bar">

            <div class="row row--pad">

            <div class="columns small-12">

    			<div class="row top-bar__top" >

    				<div class="columns medium-4">
    					<div class="site-title">
    						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    							<img class="site-logo--img" src="<?php echo get_stylesheet_directory_uri(). '/assets/images/site-logo.png'; ?>" />
    						</a>
    						<h1 class="site-title--primary"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">RMS</a></h1>
    						<h2 class="site-title--secondary"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Specialists In Cable Management</a></h2>
    					</div>
    				</div>

    				<div class="columns medium-8">

    					<?php $phone = false; ?>
                        <?php $email = false; ?>
    					<?php $phone = of_get_option('contact_telephone'); ?>
                        <?php $email = of_get_option('contact_email'); ?>

    					<div class="header-phone">
    						<?php if($phone && "" != $phone ): ?>
    							<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
    						<?php endif; ?>
    					</div>

                        <div class="header-email">
    						<?php if($email && "" != $email ): ?>
    							<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
    						<?php endif; ?>
                        </div>

    					<nav class="row collapse top-bar__nav">
    						<div class="show-for-large flex-menu">
    							<?php foundationpress_primary_menu(); ?>
    						</div>

    						<?php get_search_form( 'true' ); ?>
    					</nav>

    				</div>

                </div>

            </div>

            </div>
		</div>

	</header>

	<?php get_template_part( 'parts/mobile-nav' ); ?>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' ); ?>
