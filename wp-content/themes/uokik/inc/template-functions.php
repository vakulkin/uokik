<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package uokik
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function uokik_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'uokik_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function uokik_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'uokik_pingback_header');

/**
 * Svg files enable
 */
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

define('ALLOW_UNFILTERED_UPLOADS', true);

function fix_svg_thumb_display()
{
	echo 	'<style>
				  td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
					  width: 100% !important; 
					  height: auto !important; 
				  }
			</style>';
}
add_action('admin_head', 'fix_svg_thumb_display');


/**
 * Search form
 */

function wpdocs_my_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
					<label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
					<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Enter a keyword', 'uokik') . '" />
					<input type="submit" id="searchsubmit" value=""/>
			</form>';

	return $form;
}
add_filter('get_search_form', 'wpdocs_my_search_form');


function search_result_count()
{
	global $wp_query;
	$all_posts = $wp_query->found_posts;

	if ($all_posts == 0) {
		return printf('<p class="postPerPageCount"><strong>%s</strong>  ' . __('displayed results.', 'uokik') . '</p>', $all_posts);
	}

	if (!is_paged()) {
		$first_post = absint($wp_query->get('paged') - 1);
	} else {
		$first_post = absint($wp_query->get('paged') - 1) * $wp_query->get('posts_per_page') + 1;
	}

	$last_post = $first_post + $wp_query->post_count - 1;

	return printf('<p class="postPerPageCount"><strong>%s - %s</strong> ' . __('of', 'uokik') . ' <strong>%s</strong>  ' . __('displayed results.', 'uokik') . '</p>', $first_post, $last_post, $all_posts);
}

function toggle_search_results()
{
	if (isset($_GET['s']) && $search_text = $_GET['s']) {
		global $wp_query;

		if (isset($_GET['post_type']) && $_GET['post_type'] == 'document-template') {
			$active_post = 'document-template';
			$count_document = $wp_query->found_posts;
			$args = array(
				's'			=> $_GET['s']
			);
			$query = new WP_Query($args);
			$count_post = $query->found_posts;
		} else {
			$active_post = 'post';
			$count_post = $wp_query->found_posts;
			$args = array(
				'post_type' => 'document-template',
				's'			=> $_GET['s']
			);
			$query = new WP_Query($args);
			$count_document = $query->found_posts;
		}

		return	'<ul class="changeReusltSearch flex">' .
			'<li class="changeReusltSearch__item' . ($active_post == 'post' ? ' active' : '') . '">
						<a href="' . get_site_url() . '?s=' . $search_text . '" class="changeReusltSearch__link" title="' . __('Search results', 'uokik') . '">' .
			__('All', 'uokik') . ' (' . $count_post . ')
						</a>
					</li>' .
			'<li class="changeReusltSearch__item' . ($active_post == 'post' ? '' : ' active') . '">
						<a href="' . get_site_url() . '?s=' . $search_text . '&post_type=document-template" class="changeReusltSearch__link" title="' . __('Search documents results', 'uokik') . '">' .
			__('Documents', 'uokik') . ' (' . $count_document . ')
						</a>
					</li>' .
			'</ul>';
	}
}

function the_breadcrumb()
{
	$sep = ' > ';

	if (!is_front_page()) {

		echo '<div class="breadcrumbsTheme">';
		echo '<a href="';
		echo get_option('home');
		echo '">';
		echo __('Homepage', 'uokik');
		echo '</a>' . $sep;

		if (is_category() || is_single()) {
			the_category('title_li=');
		} elseif ((is_archive() || is_single()) && !is_search()) {
			if (is_day()) {
				printf(__('%s', 'uokik'), get_the_date());
			} elseif (is_month()) {
				printf(__('%s', 'uokik'), get_the_date(_x('F Y', 'monthly archives date format', 'uokik')));
			} elseif (is_year()) {
				printf(__('%s', 'uokik'), get_the_date(_x('Y', 'yearly archives date format', 'uokik')));
			} else {
				_e('Blog Archives', 'uokik');
			}
		}

		if (is_single()) {
			echo $sep;
			the_title();
		}

		if (is_page()) {
			$parent_pages = get_post_ancestors(get_the_ID());
			if ($parent_pages) {
				foreach ($parent_pages as $key => $parent) {
					echo '<a href="' . esc_url(get_permalink($parent)) . '">' . get_the_title($parent) . '</a>' . $sep;
				}
			}
			the_title();
		}

		if (is_home()) {
			global $post;
			$page_for_posts_id = get_option('page_for_posts');
			if ($page_for_posts_id) {
				$post = get_post($page_for_posts_id);
				setup_postdata($post);
				the_title();
				rewind_posts();
			}
		}

		if (is_search()) {
			_e('Search result', 'uokik');
		}

		echo '</div>';
	}
}


function wp_nav_menu_slide_menu($items, $args)
{
	foreach ($items as &$item) {

		if (in_array('menu-item-has-children', $item->classes)) {
			$item->classes[] =  'submenu--toggle';
		}
	}

	return $items;
}
add_filter('wp_nav_menu_objects', 'wp_nav_menu_slide_menu', 10, 2);
