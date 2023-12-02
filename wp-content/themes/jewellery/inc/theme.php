<?php
function custom_theme_init()
{
	register_nav_menus(array(
		'header_nav' => 'Header Navigation',
		'footer_nav' => 'Footer Navigation'
	));

	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_post_type_support('page', 'excerpt');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',));
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));
	add_theme_support('custom-logo', array('flex_height' => true, 'flex_width' => true));
}
add_action('after_setup_theme', 'custom_theme_init', 0);


if (function_exists('acf_add_options_page') && function_exists('acf_add_options_sub_page')) {
	acf_add_options_page(array(
		'page_title' => esc_html__('Theme options', 'custom'),
		'menu_title' => esc_html__('Theme options', 'custom'),
		'menu_slug' => 'theme-general',
		'capability' => 'edit_posts',
		'redirect' => false,
		'post_id' => "theme-general",
	));
}
