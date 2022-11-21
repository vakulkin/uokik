<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uokik
 */

$title_post = get_the_title();
$thumbnail_post = get_the_post_thumbnail('', 'full') ?: '<img src="' . get_template_directory_uri() . '/assets/img/thumbnail-' . get_post_type() . '.jpg" alt="' . esc_attr($title_post) . '">';
$file = get_field('file', get_the_ID());

if ($file) { ?>
	<li class="splide__slide">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a href="<?php echo esc_url($file['url']); ?>" class="contentDocumentTemplate" title="<?php echo esc_attr($title_post); ?>" download>
				<header class="contentDocumentTemplate__header">
					<?php echo $thumbnail_post; ?>
				</header>
				<div class="contentDocumentTemplate__body">
					<?php
					the_title('<h6 class="contentDocumentTemplate__body--title">', '</h6>');
					?>
				</div>
			</a>
		</article><!-- #post-<?php the_ID(); ?> -->
	</li>
<?php } ?>