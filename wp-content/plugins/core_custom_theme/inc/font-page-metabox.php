<?php
// Register the metabox FEATURED PRODUCTS
function add_product_category_metabox()
{
	add_meta_box(
		'product_category_metabox',
		'FEATURED PRODUCTS',
		'render_product_category_metabox',
		'page',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'add_product_category_metabox');

// Render the metabox content
function render_product_category_metabox($post)
{
	// Get the saved category ID, number, and image ID
	$selected_category1 = get_post_meta($post->ID, '_selected_product_category1', true);
	$selected_category2 = get_post_meta($post->ID, '_selected_product_category2', true);
	$number1 = get_post_meta($post->ID, '_number1', true);
	$number2 = get_post_meta($post->ID, '_number2', true);
	$image_id1 = get_post_meta($post->ID, '_image_id1', true);
	$image_id2 = get_post_meta($post->ID, '_image_id2', true);

	// Get all product categories
	$product_categories = get_terms(array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
	));

	// Output the first dropdown with associated number input and image selector
	echo '<div class="row_meta_featured_wrapp">';
	echo '<div class="row_meta_featured">';
	echo '<div>';
	echo '<label for="product_category1">Select Product Category top:</label>';
	echo '<select name="product_category1" id="product_category1">';

	foreach ($product_categories as $category) {
		echo '<option value="' . $category->term_id . '" ' . selected($selected_category1, $category->term_id, false) . '>' . $category->name . '</option>';
	}

	echo '</select>';
	echo '</div>';
	echo '<div>';
	echo '<label for="number1">Number of products top:</label>';
	echo '<input type="number" name="number1" id="number1" value="' . esc_attr($number1) . '">';
	echo '</div>';

	echo '<div>';
	echo '<label for="image1">Image for Category top:</label>';
	echo $image_id1 ? '<img src="' . esc_url($image_id1) . '" alt="banner" class="uploaded-image">' : '';
	echo '<input type="text" name="image1" id="image1" value="' . esc_attr($image_id1) . '" class="image-upload-field">';
	echo '<button class="upload_image_button button" data-target="image1">Upload Image</button>';


	echo '</div>';


	echo '</div>';

	// Output the second dropdown with associated number input and image selector
	echo '<div class="row_meta_featured">';
	echo '<div>';
	echo '<label for="product_category2">Select Product Category bottom:</label>';
	echo '<select name="product_category2" id="product_category2">';

	foreach ($product_categories as $category) {
		echo '<option value="' . $category->term_id . '" ' . selected($selected_category2, $category->term_id, false) . '>' . $category->name . '</option>';
	}

	echo '</select>';
	echo '</div>';
	echo '<div>';
	echo '<label for="number2">Number of products bottom:</label>';
	echo '<input type="number" name="number2" id="number2" value="' . esc_attr($number2) . '">';
	echo '</div>';

	echo '<div>';
	echo '<label for="image2">Image for Category bottom:</label>';
	echo $image_id2 ? '<img src="' . esc_url($image_id2) . '" alt="banner" class="uploaded-image">' : '';
	echo '<input type="text" name="image2" id="image2" value="' . esc_attr($image_id2) . '" class="image-upload-field">';
	echo '<button class="upload_image_button button" data-target="image2">Upload Image</button>';

	echo '</div>';

	echo '</div>';
	echo '</div>';
}






// Save the selected categories, numbers, and image IDs on page save
function save_product_category_metabox($post_id)
{
	if (isset($_POST['product_category1'])) {
		update_post_meta($post_id, '_selected_product_category1', sanitize_text_field($_POST['product_category1']));
	}
	if (isset($_POST['product_category2'])) {
		update_post_meta($post_id, '_selected_product_category2', sanitize_text_field($_POST['product_category2']));
	}
	if (isset($_POST['number1'])) {
		update_post_meta($post_id, '_number1', intval($_POST['number1']));
	}
	if (isset($_POST['number2'])) {
		update_post_meta($post_id, '_number2', intval($_POST['number2']));
	}
	if (isset($_POST['image1'])) {
		update_post_meta($post_id, '_image_id1', sanitize_text_field($_POST['image1']));
	}
	if (isset($_POST['image2'])) {
		update_post_meta($post_id, '_image_id2', sanitize_text_field($_POST['image2']));
	}
}
add_action('save_post', 'save_product_category_metabox');
