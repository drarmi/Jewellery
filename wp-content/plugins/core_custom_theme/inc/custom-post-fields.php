<?php
function custom_post_fields_meta_box()
{
	add_meta_box('custom-post-fields', 'Author', 'custom_post_fields_callback', 'post', 'side', 'high');
}
add_action('add_meta_boxes', 'custom_post_fields_meta_box');

// Callback function for the custom meta box
function custom_post_fields_callback($post)
{
	wp_nonce_field('custom_post_fields_nonce', 'custom_post_fields_nonce');

	// Input field
	$value = get_post_meta($post->ID, '_custom_input_field', true);
	echo '<label for="custom_input_field">Author name:</label>';
	echo '<input type="text" id="custom_input_field" name="custom_input_field" value="' . esc_attr($value) . '" style="width: 100%;" />';

	// Image picker
	$image_url = get_post_meta($post->ID, '_custom_image_url', true);
	echo '<label for="custom_image_url">Author avater:</label>';
	echo '<input type="text" id="custom_image_url" name="custom_image_url" value="' . esc_attr($image_url) . '" style="width: 70%;" />';
	echo '<button id="custom_image_picker" class="button">Select Image</button>';
	echo '<div id="custom_image_preview"></div>';
}

// Save custom field values when the post is saved
function custom_post_fields_save_post($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if (!isset($_POST['custom_post_fields_nonce']) || !wp_verify_nonce($_POST['custom_post_fields_nonce'], 'custom_post_fields_nonce')) return;

	// Save custom input field value
	if (isset($_POST['custom_input_field'])) {
		update_post_meta($post_id, '_custom_input_field', sanitize_text_field($_POST['custom_input_field']));
	}

	// Save custom image URL
	if (isset($_POST['custom_image_url'])) {
		update_post_meta($post_id, '_custom_image_url', esc_url($_POST['custom_image_url']));
	}
}
add_action('save_post', 'custom_post_fields_save_post');
