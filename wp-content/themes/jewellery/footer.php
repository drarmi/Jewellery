<?php wp_footer();
$location_title_1 = esc_attr(get_option('location_footer_title_1'));
$location_url_1 = esc_attr(get_option('location_footer_url_1'));

$location_title_2 = esc_attr(get_option('location_footer_title_2'));
$location_url_2 = esc_attr(get_option('location_footer_url_2'));

$location_title_3 = esc_attr(get_option('location_footer_title_3'));
$location_url_3 = esc_attr(get_option('location_footer_url_3'));

$location_title_4 = esc_attr(get_option('location_footer_title_4'));
$location_url_4 = esc_attr(get_option('location_footer_url_4'));

$location_title_5 = esc_attr(get_option('location_footer_title_5'));
$location_url_5 = esc_attr(get_option('location_footer_url_5'));


$location = esc_attr(get_option('option_address'));;
$phone = esc_attr(get_option('option_phone'));
$fax = esc_attr(get_option('option_fax'));
$footer_tex = esc_attr(get_option('option_footer_tex'));
$footer_logo = esc_attr(get_option('logo_foote'));


function get_footer_post()
{
	$footer_post_id_1 = esc_attr(get_option('footer_post_id_1'));
	$footer_post_id_2 = esc_attr(get_option('footer_post_id_2'));

	$args = array(
		'post_type'      => 'post',
		'post__in'       => array($footer_post_id_1, $footer_post_id_2),
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
			$date = get_the_date();
			$formatted_date = date('F j, Y', strtotime($date));

			$blog_data = array(
				'title'            => $blog_title,
				'thumbnail'        => $thumbnail_url,
				'url'              => $post_url,
				'image_author_url' => $image_author_url,
				'formatted_date'   => $formatted_date,
			);

			$data[] = $blog_data;
		}

		wp_reset_postdata();
	}

	return $data;
}
$data = get_footer_post();

?>
<footer>
	<div class="container-wrapper">
		<div class="container">
			<div class="first_footer_col">
				<div>
					<img src="<?= $footer_logo ?>" alt="logo" loading="lazy" width="112" height="40" />
				</div>
				<div class="footer_tex">
					<?= $footer_tex ?>
				</div>
				<ul>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M10.0078 5.15625C9.42065 5.15625 8.84667 5.33036 8.35846 5.65657C7.87026 5.98278 7.48974 6.44644 7.26505 6.98891C7.04035 7.53138 6.98156 8.12829 7.09611 8.70417C7.21066 9.28006 7.4934 9.80904 7.90859 10.2242C8.32378 10.6394 8.85276 10.9222 9.42864 11.0367C10.0045 11.1513 10.6014 11.0925 11.1439 10.8678C11.6864 10.6431 12.15 10.2626 12.4762 9.77435C12.8024 9.28614 12.9766 8.71216 12.9766 8.125C12.9766 7.33764 12.6638 6.58253 12.107 6.02578C11.5503 5.46903 10.7952 5.15625 10.0078 5.15625ZM10.0078 10.1562C9.60607 10.1562 9.21335 10.0371 8.87931 9.81392C8.54527 9.59073 8.28492 9.27349 8.13118 8.90233C7.97744 8.53116 7.93722 8.12275 8.01559 7.72872C8.09397 7.3347 8.28743 6.97276 8.5715 6.68869C8.85558 6.40461 9.21751 6.21116 9.61154 6.13278C10.0056 6.0544 10.414 6.09463 10.7851 6.24837C11.1563 6.40211 11.4735 6.66246 11.6967 6.9965C11.9199 7.33054 12.0391 7.72326 12.0391 8.125C12.037 8.66309 11.8223 9.17855 11.4418 9.55904C11.0614 9.93953 10.5459 10.1542 10.0078 10.1562ZM10.0078 1.40625C8.22652 1.40832 6.51878 2.11685 5.25922 3.37641C3.99966 4.63597 3.29113 6.34371 3.28906 8.125C3.28906 10.5391 4.41406 13.1016 6.53125 15.5391C7.486 16.6467 8.56318 17.6427 9.74219 18.5078C9.81995 18.5628 9.9126 18.5927 10.0078 18.5938C10.1052 18.5915 10.2001 18.5617 10.2813 18.5078C11.4549 17.639 12.5291 16.6434 13.4844 15.5391C15.6094 13.1016 16.7266 10.5391 16.7266 8.125C16.7245 6.34371 16.016 4.63597 14.7564 3.37641C13.4968 2.11685 11.7891 1.40832 10.0078 1.40625ZM10.0078 17.5391C8.83594 16.6328 4.22656 12.7812 4.22656 8.125C4.22656 6.59172 4.83566 5.12123 5.91985 4.03704C7.00405 2.95284 8.47453 2.34375 10.0078 2.34375C11.5411 2.34375 13.0116 2.95284 14.0958 4.03704C15.18 5.12123 15.7891 6.59172 15.7891 8.125C15.7891 12.7812 11.1797 16.6328 10.0078 17.5391Z" fill="#777777" />
						</svg>
						<span>
							<?= $location; ?>
						</span>
					</li>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M13.9417 1.7207H6.05832C5.53551 1.75211 5.0462 1.98853 4.69669 2.37861C4.34717 2.76869 4.16569 3.28092 4.19166 3.80404V16.1957C4.16569 16.7188 4.34717 17.231 4.69669 17.6211C5.0462 18.0112 5.53551 18.2476 6.05832 18.279H13.9417C14.4645 18.2476 14.9538 18.0112 15.3033 17.6211C15.6528 17.231 15.8343 16.7188 15.8083 16.1957V3.80404C15.8343 3.28092 15.6528 2.76869 15.3033 2.37861C14.9538 1.98853 14.4645 1.75211 13.9417 1.7207ZM14.975 16.1957C15.0004 16.4978 14.9065 16.7978 14.7133 17.0315C14.5202 17.2652 14.2431 17.4139 13.9417 17.4457H6.05832C5.75683 17.4139 5.47981 17.2652 5.28665 17.0315C5.09349 16.7978 4.99956 16.4978 5.02499 16.1957V3.80404C4.99956 3.50194 5.09349 3.2019 5.28665 2.96823C5.47981 2.73457 5.75683 2.58588 6.05832 2.55404H7.33332V2.97904C7.33332 3.20005 7.42112 3.41201 7.5774 3.56829C7.73368 3.72457 7.94564 3.81237 8.16666 3.81237H11.8333C12.0543 3.81237 12.2663 3.72457 12.4226 3.56829C12.5789 3.41201 12.6667 3.20005 12.6667 2.97904V2.55404H13.9417C14.2431 2.58588 14.5202 2.73457 14.7133 2.96823C14.9065 3.2019 15.0004 3.50194 14.975 3.80404V16.1957Z" fill="#777777" />
							<path d="M8.33335 15.7782H11.6667C11.7772 15.7782 11.8832 15.7343 11.9613 15.6561C12.0395 15.578 12.0834 15.472 12.0834 15.3615C12.0834 15.251 12.0395 15.145 11.9613 15.0669C11.8832 14.9887 11.7772 14.9448 11.6667 14.9448H8.33335C8.22285 14.9448 8.11687 14.9887 8.03873 15.0669C7.96059 15.145 7.91669 15.251 7.91669 15.3615C7.91669 15.472 7.96059 15.578 8.03873 15.6561C8.11687 15.7343 8.22285 15.7782 8.33335 15.7782Z" fill="#777777" />
						</svg>
						<a href="tel:<?= $phone; ?>">
							<?php
							echo (__("Phone: "));
							echo ($phone);
							?>
						</a>
					</li>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M17.5 4.0625H2.5C2.41712 4.0625 2.33763 4.09542 2.27903 4.15403C2.22042 4.21263 2.1875 4.29212 2.1875 4.375V15C2.1875 15.2486 2.28627 15.4871 2.46209 15.6629C2.6379 15.8387 2.87636 15.9375 3.125 15.9375H16.875C17.1236 15.9375 17.3621 15.8387 17.5379 15.6629C17.7137 15.4871 17.8125 15.2486 17.8125 15V4.375C17.8125 4.29212 17.7796 4.21263 17.721 4.15403C17.6624 4.09542 17.5829 4.0625 17.5 4.0625ZM10 10.8281L3.30469 4.6875H16.6953L10 10.8281ZM8.17188 10L2.8125 14.9141V5.08594L8.17188 10ZM8.63281 10.4219L9.78906 11.4766C9.8458 11.531 9.92138 11.5614 10 11.5614C10.0786 11.5614 10.1542 11.531 10.2109 11.4766L11.3672 10.4219L16.6953 15.3125H3.30469L8.63281 10.4219ZM11.8281 10L17.1875 5.08594V14.9141L11.8281 10Z" fill="#777777" />
						</svg>
						<a href="tel:<?= $fax; ?>">
							<?php
							echo (__("Fax: "));
							echo ($fax);
							?>
						</a>
					</li>
				</ul>

			</div>
			<div>
				<div>
					<h5><?= __("RECENT POSTS"); ?></h5>
					<?php if ($data && is_array($data)) { ?>
						<div class="featured_product_column">
							<ul>
								<?php foreach ($data as $item) { ?>
									<li>
										<a href="<?= $item["url"]; ?>">
											<div>
												<img src="<?= $item["thumbnail"]; ?>" alt="<?= $item["title"]; ?>" width="65" height="65" loading="lazy">
											</div>
											<div>
												<h6><?= $item["title"]; ?></h6>
												<p class="footer_post_date"><?= $item["formatted_date"]; ?></p>
											</div>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="location_footer_col">
				<div>
					<h5><?= __("OUR STORES"); ?></h5>
					<ul class="our_stores">
						<li><a href="<?= $location_url_1; ?>"><?= $location_title_1; ?></a></li>
						<li><a href="<?= $location_url_2; ?>"><?= $location_title_2; ?></a></li>
						<li><a href="<?= $location_url_3; ?>"><?= $location_title_3; ?></a></li>
						<li><a href="<?= $location_url_4; ?>"><?= $location_title_4; ?></a></li>
						<li><a href="<?= $location_url_5; ?>"><?= $location_title_5; ?></a></li>
					</ul>
				</div>
				<div class="mobile_footer_nav">
					<h5><?= __("USEFUL LINKS"); ?></h5>
					<?php
					wp_nav_menu(array(
						'theme_location'  => 'footer_nav'
					));
					?>
				</div>
			</div>
			<div class="nav_footer_col">
				<div>
					<h5><?= __("USEFUL LINKS"); ?></h5>
					<?php
					wp_nav_menu(array(
						'theme_location'  => 'footer_nav'
					));
					?>
				</div>
			</div>
		</div>
	</div>
</footer>

</body>

</html>