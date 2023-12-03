<?php
function get_selected_post()
{
	$font_page_group = get_field("font_page");
	$blog = $font_page_group["blog"] ?? "";

	$args = array(
		'post_type'      => 'post',
		'post__in'       => $blog,
		'post_status'    => 'publish',
		'posts_per_page' => -1,
	);

	$data = array();

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			$blog_title = get_the_title();
			$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$post_url = get_permalink();
			$image_author_url = get_post_meta(get_the_ID(), '_custom_image_url', true);
			$author_name = get_post_meta(get_the_ID(), '_custom_input_field', true);
			$categories = get_the_category();
			$parent_category_name = !empty($categories) ? $categories[0]->name : '';
			$formatted_date = date_i18n('j M', strtotime(get_the_date()));
			$content = get_the_content();

			$blog_data = array(
				'title'            => $blog_title,
				'category'         => $parent_category_name,
				'thumbnail'        => $thumbnail_url,
				'url'              => $post_url,
				'author_name'      => $author_name,
				'image_author_url' => $image_author_url,
				'formatted_date'   => $formatted_date,
				'content'          => $content,
			);

			$data[] = $blog_data;
		}

		wp_reset_postdata();
	}

	return $data;
}
$data = get_selected_post();

?>
<section>
	<div class="container-wrapper">
		<div class="container featured blog">
			<p class='section_italic_gold'><?= __("Adipisicing elit"); ?></p>
			<h4><?= __("JEWELRY DESIGN BLOG"); ?></h4>
			<p><?= __("There are many variations of passages of lorem ipsum available."); ?></p>

			<div class="slide_wrapper_blog">
				<div>
					<div class="slider3 slider_slick">
						<?php if ($data && is_array($data)) {
							foreach ($data as $item) { ?>
								<a href="<?= $item["url"] ?>" class="blog_slide_item">
									<div class="blog_img_slide">
										<img src="<?= $item["thumbnail"] ?>" alt="<?= $item["title"] ?>" loading="lazy" width="345" height="261">
										<p class="blog_category"><?= $item["category"] ?></p>
										<p class="blog_date"><?= $item["formatted_date"] ?></p>
										<div class="span_dots"><span></span><span></span><span></span></div>
									</div>
									<h5><?= $item["title"] ?></h5>
									<div class="blog_author"><span><?= __("Posted by") ?></span><img src="<?= $item["image_author_url"] ?>" alt="<?= $item["author_name"] ?>" loading="lazy" width="20" height="" 20><span><?= $item["author_name"] ?></span></div>
									<p class="blog_content"><?= $item["content"] ?></p>
									<p class="continue_reading"><?= __("Continue reading"); ?></p>
								</a>
						<?php }
						} ?>
					</div>
					<div class="slider3_nav">
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
</section>
<?php
