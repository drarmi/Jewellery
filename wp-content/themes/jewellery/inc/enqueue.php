<?php
function enqueue_scripts()
{
	wp_enqueue_style('style', get_template_directory_uri() . '/public/css/style.css', array(), '1.0', 'all');
	wp_enqueue_script('script', get_template_directory_uri() . '/public/js/script.js', array('jquery'), '1.0', true);

	/* slick */
	wp_enqueue_style('slick_style', get_template_directory_uri() . '/assets/slick/slick.css', array(), '1.8.1', 'all');
	wp_enqueue_script('slick_js', get_template_directory_uri() . '/assets/slick/slick.min.js', array(), '1.8.1', true);

}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
