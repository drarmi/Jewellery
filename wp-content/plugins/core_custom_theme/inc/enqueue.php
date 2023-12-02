<?php
function enqueue_scripts_admin()
{
	$plugin_url = plugin_dir_url(__DIR__);
	wp_enqueue_media();
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('script_admin', $plugin_url . 'public/js/script_admin.js', array('jquery'), '1.0', true);
	wp_enqueue_style('style_admin', $plugin_url . 'public/css/style_admin.css');
}
add_action('admin_enqueue_scripts', 'enqueue_scripts_admin');
