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

