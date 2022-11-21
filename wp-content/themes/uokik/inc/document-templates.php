<?php

/**
 * Document templates
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!class_exists('Document_Template')) {

    class Document_Template
    {

        public function __construct()
        {

            add_action('init', array($this, 'register_post_type'));
        }


        public function register_post_type()
        {

            $labels = array(
                'name' => __('Document templates', 'uokik'),
                'singular_name' => __('Document templates', 'uokik'),
                'add_new' => __('Add New', 'uokik'),
                'add_new_item' => __('Add New Document template', 'uokik'),
                'edit_item' => __('Edit Document template', 'uokik'),
                'new_item' => __('New Document template', 'uokik'),
                'view_item' => __('View Document template', 'uokik'),
                'search_items' => __('Search Document templates', 'uokik'),
                'not_found' => __('No Document template found', 'uokik'),
                'not_found_in_trash' => __('No Document templates found in Trash', 'uokik'),
                'parent_item_colon' => __('Parent Document template:', 'uokik'),
                'menu_name' => __('Documents', 'uokik'),
            );

            $args = array(
                'labels'                => $labels,
                'public'                => false,
                'show_ui'               => true,
                'menu_position'         => 5,
                'supports'              => array('title', 'thumbnail'),
                'menu_icon'             => 'dashicons-media-document',
            );

            register_post_type('document-template', $args);
        }
    }

    new Document_Template;
}
