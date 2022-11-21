<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uokik
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="contentSearch">
		<header class="contentSearch__header">
			<?php the_title( sprintf( '<h3 class="contentSearch--title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		</header>
	
		<div class="contentSearch__summary">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
