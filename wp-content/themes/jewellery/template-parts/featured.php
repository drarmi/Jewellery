<?php
$id_category1 = get_post_meta($post->ID, '_selected_product_category1', true) ?? "";
$id_category2 = get_post_meta($post->ID, '_selected_product_category2', true) ?? "";

$featured_number1 = get_post_meta($post->ID, '_number1', true) ?? 4;
$featured_number2 = get_post_meta($post->ID, '_number2', true) ?? 4;

$category1 = $id_category1 ? get_term($id_category1, 'product_cat') : "";
$category2 = $id_category2 ? get_term($id_category2, 'product_cat') : "";

$category_url_1 = $category1 ? get_term_link($category1, 'product_cat') : "";
$category_url_2 = $category2 ? get_term_link($category2, 'product_cat') : "";

$image_1 = get_post_meta($post->ID, '_image_id1', true) ?? "";
$image_2 = get_post_meta($post->ID, '_image_id2', true) ?? "";

function get_products_by_category($id_category)
{
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'tax_query'      => array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => $id_category,
			),
		),
	);

	$data = array();

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			$product = wc_get_product(get_the_ID());
			$term_id = $product->get_category_ids();
			$parent_category_name = '';
			$product_title = get_the_title();
			if (!empty($term_id)) {
				$parent_category = get_term($term_id[0], 'product_cat');
				$parent_category_name = $parent_category->name;
			}
			$product_price = $product->get_price();
			$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$product_url = get_permalink();

			$product_data = array(
				'title'     => $product_title,
				'category'  => $parent_category_name,
				'price'     => $product_price,
				'thumbnail' => $thumbnail_url,
				'url'       => $product_url,
			);

			$data[] = $product_data;
		}

		wp_reset_postdata();
	}

	return $data;
}

$slide1 = get_products_by_category($id_category1);
$slide2 = get_products_by_category($id_category2);

?>
<div class="container-wrapper">
	<div class="container featured">
		<p><?= __("Adipisicing elit"); ?></p>
		<h4><?= __("FEATURED PRODUCTS"); ?></h4>
		<p><?= __("There are many variations of passages of lorem ipsum available."); ?></p>

		<div class="slide_wrapper_top">
			<a href="<?= $category_url_1 ?>" class="row_category_img" style="background: url(<?= $image_1; ?>);">
				<p><?= $category1 ? $category1->name : ""; ?></p>
				<p><?= $category1 ? $category1->description : ""; ?></p>
			</a>
			<div>
				<div class="slider1 slider_slick">
					<?php if ($slide1 && is_array($slide1)) {
						foreach ($slide1 as $item) { ?>
							<a href="<?= $item["url"] ?>">
								<img src="<?= $item["thumbnail"] ?>" alt="<?= $product_title ?>" loading="lazy" width="250" height="270">
								<h5><?= $item["title"] ?></h5>
								<p class="slide_category"><?= $item["category"] ?></p>
								<p class="slide_price"><?= $item["price"] ? '$' . $item["price"] : ""; ?></p>
							</a>
					<?php }
					} ?>
				</div>
				<div class="slider1_nav">
					<span class="prev">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
							<path d="M19.275 9.2625L13.5375 15L19.275 20.7375L17.5 22.5L9.99999 15L17.5 7.5L19.275 9.2625Z" fill="#777777" />
						</svg>
					</span>
					<span class="next">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
							<path d="M10.725 20.7375L16.4625 15L10.725 9.2625L12.5 7.5L20 15L12.5 22.5L10.725 20.7375Z" fill="#777777" />
						</svg>
					</span>
				</div>
			</div>
		</div>

		<div class="slide_wrapper_bottom">
			<a href="<?= $category_url_2 ?>" class="row_category_img bottom" style="background: url(<?= $image_2; ?>);">
				<p><?= $category2 ? $category2->name : ""; ?></p>
				<p><?= $category2 ? $category2->description : ""; ?></p>
			</a>
			<div>
				<div class="slider2 slider_slick">
					<?php if ($slide2 && is_array($slide2)) {
						foreach ($slide2 as $item) { ?>
							<a href="<?= $item["url"] ?>">
								<img src="<?= $item["thumbnail"] ?>" alt="<?= $product_title ?>" loading="lazy" width="250" height="270">
								<h5><?= $item["title"] ?></h5>
								<p class="slide_category"><?= $item["category"] ?></p>
								<p class="slide_price"><?= $item["price"] ? '$' . $item["price"] : ""; ?></p>
							</a>
					<?php }
					} ?>
				</div>
				<div class="slider2_nav">
					<span class="prev">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
							<path d="M19.275 9.2625L13.5375 15L19.275 20.7375L17.5 22.5L9.99999 15L17.5 7.5L19.275 9.2625Z" fill="#777777" />
						</svg>
					</span>
					<span class="next">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
							<path d="M10.725 20.7375L16.4625 15L10.725 9.2625L12.5 7.5L20 15L12.5 22.5L10.725 20.7375Z" fill="#777777" />
						</svg>
					</span>
				</div>
			</div>
		</div>

	</div>
</div>
<?php
