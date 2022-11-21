<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uokik
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php showTitle(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'uokik'),
				'after'  => '</div>',
			)
		);
		?>

		<?php if (!is_front_page()) { ?>
			<asiide class="sidebarPage">
				<?php dynamic_sidebar('sidebar-2'); ?>
			</asiide>
		<?php } ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->