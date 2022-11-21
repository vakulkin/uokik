<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uokik
 */

$title_site = get_bloginfo('name');
$menu_footer = 	wp_nav_menu(
	array(
		'theme_location'	=> 'footer',
		'menu_id'        	=> 'footer-menu',
		'echo' 			 	=> FALSE,
		'fallback_cb' 		=> '__return_false',
		'depth' => 1,
	)
);

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="flex flex-wrap flex-alings-center">
			<div class="flex-12 flex-lg-10">

				<div class="site-info flex flex-alings-center">
					<?php
					if ($footer_logo = get_theme_mod('footer_logo')) {
						echo 	'<div class="site-branding-footer">
											<a href="http://uokik/" class="custom-logo-link" rel="home" aria-current="page">
												<img src="' . $footer_logo . '" class="custom-logo" alt="' . esc_attr($title_site) . '">
											</a>
										</div>';
					}

					if (!empty($menu_footer)) {
						echo $menu_footer;
					}

					?>
				</div>

			</div>

			<div class="flex-12 flex-lg-2 text-center text-lg-end">
				<a href="#top" class="scrollToTop"><?php echo __('Go to top', 'uokik') ?></a>
			</div>

		</div>
	</div>
</footer><!-- #colophon -->

<div class="copyrights">
	<div class="container">
		<div class="flex flex-wrap">
			<div class="flex-12">
				<span>
					<?php
					printf(esc_html__('%s %s. All rights reserved.', 'uokik'), $title_site, date('Y'));
					?>
				</span>
			</div>
		</div>
	</div>
</div>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>