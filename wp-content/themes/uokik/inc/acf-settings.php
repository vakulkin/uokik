<?php

function my_acf_json_save_point($path)
{
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');


function my_acf_json_load_point($paths)
{
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function gutenberg_blocks_init()
{

	if (function_exists('acf_register_block')) {

		$array_blocks = array(
			'slider' => __('Slider', 'uokik'),
			'title-section' => __('Title section', 'uokik'),
			'image-link-banner' => __('Image link banner', 'uokik'),
			'document-templates' => __('Document templates', 'uokik'),
			'text-banner-button' => __('Text banner with button', 'uokik'),
			'icon-navigation' => __('Icon navigation', 'uokik'),
			'collapsed-menu' => __('Collapsed menu', 'uokik'),
			'info-box' => __('Info box', 'uokik'),
			'info-tabs' => __('Info tabs', 'uokik'),
			'document-list' => __('Document list', 'uokik'),
		);

		foreach ($array_blocks as $key => $block) {

			acf_register_block(array(
				'name'              => $key,
				'title'             => $block,
				'description'       => sprintf(__('A custom %s block.', 'uokik'), $block),
				'render_callback'   => 'my_acf_block_render_callback',
				'category'          => 'formatting',
				'icon'              => 'desktop',
				'mode'              => 'edit',
				'supports'          => array('align' => false),
			));
		}
	}
}
add_action('acf/init', 'gutenberg_blocks_init');

function my_acf_block_render_callback($block)
{
	$slug = str_replace('acf/', '', $block['name']);

	if (file_exists(get_theme_file_path("/gutenberg-blocks/content-{$slug}.php"))) {
		include(get_theme_file_path("/gutenberg-blocks/content-{$slug}.php"));
	}
}


function link_acf($link = null, $class = null)
{
	if (!$link) return;

	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';

	$result = '<a class="' . $class . '" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a>';

	return $result;
}

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=>  __('Theme settings', 'uokik'),
		'menu_title'	=> __('Theme Settings', 'uokik'),
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'install_themes',
		'redirect'		=> false
	));
}

function search_page_image()
{
	if (get_field('search_options', 'options') && $image = get_field('search_options', 'options')['image_search_page']) {
		return '<div class="imageWithShadow">' . wp_get_attachment_image($image, 'full') . '</div>';
	}
}

function load_sidebars_names_to_page($field)
{

	$choices = widgets_name_list();
	$field['choices'] = array();

	foreach ($choices as $choice) {

		$field['choices'][$choice] = $choice;
	}

	return $field;
}
add_filter('acf/load_field/key=field_6357c62dbb0a7', 'load_sidebars_names_to_page');

function load_menus_for_block_collapsed_menu($field)
{
	$menus = wp_get_nav_menus();
	$field['choices'] = array();

	foreach ($menus as $key => $value) {
		$field['choices'][$value->term_id] = $value->name;
	}

	return $field;
}
add_filter('acf/load_field/key=field_6357dd8c149ba', 'load_menus_for_block_collapsed_menu');
