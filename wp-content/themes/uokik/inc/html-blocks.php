<?php

/**
 * Info tabs
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!class_exists('InfoTabs')) {

    class InfoTabs
    {
        public function __construct()
        {
            add_action('init', array($this, 'register_post_type'));
        }

        public function register_post_type()
        {
            $labels = array(
                'name' => __('HTML blocks', 'uokik'),
                'singular_name' => __('HTML blocks', 'uokik'),
                'add_new' => __('Add New', 'uokik'),
                'add_new_item' => __('Add New HTML block', 'uokik'),
                'edit_item' => __('Edit HTML block', 'uokik'),
                'new_item' => __('New HTML block', 'uokik'),
                'view_item' => __('View HTML block', 'uokik'),
                'search_items' => __('Search HTML blocks', 'uokik'),
                'not_found' => __('No HTML block found', 'uokik'),
                'not_found_in_trash' => __('No HTML blocks found in Trash', 'uokik'),
                'parent_item_colon' => __('Parent HTML block:', 'uokik'),
                'menu_name' => __('HTML blocks', 'uokik'),
            );

            $args = array(
                'labels'                => $labels,
                'public'                =>  false,
                'show_ui'               =>  true,
                'menu_position'         =>  5,
                'supports'              =>  array('title', 'editor'),
                'show_in_rest'          =>  true,
                'menu_icon'             =>  'dashicons-editor-code',
            );

            register_post_type('html-block', $args);
        }
    }

    new InfoTabs;
}
