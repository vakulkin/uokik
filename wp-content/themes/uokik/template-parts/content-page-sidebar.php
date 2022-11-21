<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uokik
 */

$sidebar = get_field('sidebar_area');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php showTitle(); ?>

	<div class="flex flex-wrap">
		<div class="flex-12 flex-lg-8">
			<div class="entry-content contentSidebar">
				<?php

				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'uokik'),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div>

		<div class="flex-12 flex-lg-4">
			<asiide class="sidebarPage">
				<?php dynamic_sidebar($sidebar); ?>
			</asiide>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->