<?php
$selected_offer1 = get_post_meta($post->ID, '_selected_special_offer1', true) ?? "";
$selected_offer2 = get_post_meta($post->ID, '_selected_special_offer2', true) ?? "";
$image_offer = get_post_meta($post->ID, '_special_offer_image', true) ?? "";
$input_title = get_post_meta($post->ID, '_input_field_featured1', true) ?? "";
$input_subtitle = get_post_meta($post->ID, '_input_field_featured2', true) ?? "";
$input_btn_URL = get_post_meta($post->ID, '_input_field_featured2', true) ?? "";



function get_products_by_ID($id_category)
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
	$count = 0;
	$query = new WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts() && $count < 3) {
			$count += 1;
			$query->the_post();
			$product = wc_get_product(get_the_ID());
			$product_title = get_the_title();
			$product_price = $product->get_price();
			$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$product_url = get_permalink();

			$product_data = array(
				'title'     => $product_title,
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

$column1 = get_products_by_ID($selected_offer1);
$column2 = get_products_by_ID($selected_offer2);
?>

<section>
	<div class="container-wrapper">
		<div class="container special_offer_bottom">
			<div class="special_offer_bottom_image_wrapp" style="background: url(<?= $image_offer; ?>);">
				<div></div>
				<div class="special_offer_bottom_image_content">
					<p><?= __("Special offer") ?></p>
					<h3><?= $input_title; ?></h3>
					<p><?= $input_subtitle; ?></p>
					<div class="button_wrapp">
						<?php if ($input_btn_URL) { ?>
							<a class="button" href="<?= $input_btn_URL; ?>"><?= __("view more"); ?></a>
						<?php }
						?>
					</div>
				</div>
			</div>

			<div class="featured_product_column_wrapper">
				<div class="featured_product_column">
					<h5><?= __("FEATURED PRODUCTS"); ?></h5>
					<?php if ($column1 && is_array($column1)) { ?>
						<ul>
							<?php foreach ($column1 as $item) { ?>
								<li>
									<a href="<?= $item['url']; ?>">
										<div>
											<img src="<?= $item['thumbnail']; ?>" alt="<?= $item['title']; ?>" width="65" height="65" loading="lazy">
										</div>
										<div>
											<h6><?= $item['title']; ?></h6>
											<p class="slide_price"><?= $item['price'] ? "$" . $item['price'] : ""; ?></p>
										</div>
									</a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
				<div class="featured_product_column">
					<h5><?= __("NEW PRODUCTS"); ?></h5>
					<?php if ($column2 && is_array($column2)) { ?>
						<ul>
							<?php foreach ($column2 as $item) { ?>
								<li>
									<a href="<?= $item['url']; ?>">
										<div>
											<img src="<?= $item['thumbnail']; ?>" alt="<?= $item['title']; ?>" width="65" height="65" loading="lazy">
										</div>
										<div>
											<h6><?= $item['title']; ?></h6>
											<p class="slide_price"><?= $item['price'] ? "$" . $item['price'] : ""; ?></p>
										</div>
									</a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
</section>
<?php
