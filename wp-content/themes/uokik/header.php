<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uokik
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#01172d">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<div class="headerTop">
			<a class="skip-link headerTop--skip btn btn-primary" href="#primary"><?php esc_html_e('Skip to content', 'uokik'); ?></a>
		</div>

		<header id="masthead" class="site-header">

			<div class="container">
				<div class="flex flex-wrap flex-alings-center">

					<div class="flex-8 flex-lg-6">
						<div class="site-branding">
							<?php the_custom_logo(); ?>
						</div><!-- .site-branding -->
					</div>

					<div class="d-to-lg-none flex-4 togglerArea">
						<button class="menu-toggle navbarToggler" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'uokik'); ?>">
							<span class="navbarToggler--line top"></span>
							<span class="navbarToggler--line middle"></span>
							<span class="navbarToggler--line bottom"></span>
						</button>
					</div>

					<div class="flex-12 flex-lg-6">
						<?php get_search_form(); ?>
					</div>

					<div class="flex-12">
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'header',
									'menu_id' => 'primary-menu',
									'depth' => 2,
								)
							);
							?>
						</nav><!-- #site-navigation -->
					</div>

				</div>
			</div>
		</header><!-- #masthead -->