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

			<div class="row collapse" data-equalizer data-equalize-on="large">

				<div class="columns xlarge-9 large-12" data-equalizer-watch>

					<div class="row top-bar__top" >

						<div class="columns medium-6">
							<div class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<img class="site-logo--img" src="<?php echo get_stylesheet_directory_uri(). '/assets/images/site-logo.png'; ?>" />
								</a>
								<h1 class="site-title--primary"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Armorduct</a></h1>
								<h2 class="site-title--secondary"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Cable Management</a></h2>
							</div>
						</div>

						<div class="columns medium-6">
							<div class="header-phone">
								<?php $phone = false; ?>
								<?php $phone = of_get_option('contact_telephone'); ?>
									<?php if($phone && "" != $phone ): ?>
										<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
									<?php endif; ?>
								<?php /* if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
									<?php get_template_part( 'parts/mobile-top-bar' ); ?>
								<?php endif; */ ?>
							</div>
						</div>
					</div>

					<nav class="row collapse top-bar__nav">

						<div class="columns small-1 home-icon__wrapper">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="home-icon">Home</a>
						</div>

						<div class="columns small-9 show-for-large flex-menu">
							<?php foundationpress_primary_menu(); ?>
						</div>

						<div class="columns small-2">
							<?php get_search_form( 'true' ); ?>
						</div>

					</nav>

				</div>

				<div class="columns large-3 show-for-xlarge head-flag__wrapper" data-equalizer-watch>
					<div class="head-flag">
					</div>
				</div>

		</div>

	</header>

	<?php get_template_part( 'parts/mobile-nav' ); ?>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' ); ?>
