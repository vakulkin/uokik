<?php

/**
 * Block Name: Document templates
 */

$id = 'documentTemplates-' . $block['id'];

$block_class = 'documentTemplates';

if (!empty($block['className'])) {
	$block_class .= ' ' . $block['className'];
}

// variable acf
$post_ids = get_field('post_ids');

$args = array(
	'post_type'			=> 'document-template',
	'posts_per_page' 	=> 12,
	'post__in'  		=> $post_ids,
	'orderby'			=> 'post__in',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
?>

	<div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">
		<div class="splide documentTemplates--carousel">
			<div class="splide__slider">
				<div class="splide__track">
					<ul class="splide__list">
						<?php
						while ($query->have_posts()) {
							$query->the_post();
							get_template_part('template-parts/content-document-template');
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="text-end documentTemplates__button">
			<?php
			echo 	'<a href="' . get_post_type_archive_link('document-template') . '" class="borderLink" title="' . __('Archive document templates', 'uokik') . '">' .
				__('View all document templates', 'uokik') .
				'</a>';
			?>
		</div>
	</div>

<?php
}
