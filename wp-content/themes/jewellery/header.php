<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php
	$additional_header = esc_attr(get_option('additional_header')) ?? "";
	$main_title_header = esc_attr(get_option('main_title_header')) ?? "";
	$banner_text_header = esc_attr(get_option('banner_text_header')) ?? "";
	$banner_image = get_option('banner_image');
	$shop_now_URL = esc_attr(get_option('shop_now'));
	$view_more_URL  = esc_attr(get_option('view_more_url'));
	$additional_header_color  = esc_attr(get_option('additional_header_color'));
	?>
	<header>
		<div class="container-wrapper nav" style="background: <?= $additional_header_color ?>">
			<div class="container">
				<?php
				$logo = get_custom_logo();

				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object($locations['header_nav']);
				$menu_items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC')) ?? [];
				?>
				<ul>
					<?php
					if ($menu_items && is_array($menu_items)) { ?>
						<li class="logo"><?= $logo; ?></li>
						<?php foreach ($menu_items as $menu_item) { ?>
							<li class="nav_item"><a class="border_bottom" href="<?= $menu_item->url ?>"><?= $menu_item->title ?></a></li>
						<?php } ?>

						<?php if (is_user_logged_in()) { ?>
							<li class="log_button"><a class="border_bottom" href="<?= home_url() . '/' . 'my-account' . '/' ?>"><?= __('My account'); ?></a></li>
						<?php } else { ?>
							<li class="log_button">
								<a class="border_bottom" href="<?= home_url() . '/' . 'login' . '/' ?>"><?= __('Logi/Register'); ?></a>
							</li>
						<?php } ?>

						<li class="cart">
							<div>
								<svg class="open_search-js" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M7.08871 0C11.0017 0 14.1774 3.17574 14.1774 7.08871C14.1774 11.0017 11.0017 14.1774 7.08871 14.1774C3.17574 14.1774 0 11.0017 0 7.08871C0 3.17574 3.17574 0 7.08871 0ZM7.08871 12.6021C10.1345 12.6021 12.6021 10.1345 12.6021 7.08871C12.6021 4.04214 10.1345 1.57527 7.08871 1.57527C4.04214 1.57527 1.57527 4.04214 1.57527 7.08871C1.57527 10.1345 4.04214 12.6021 7.08871 12.6021ZM13.7718 12.6581L16 14.8855L14.8855 16L12.6581 13.7718L13.7718 12.6581Z" fill="white" />
								</svg>
								<input type="text" placeholder="Search for products" />
								<svg class="close_search-js" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z" fill="white" />
								</svg>
							</div>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M15.0869 8.61436L15.9905 3.65906C16.0062 3.57396 16.0024 3.48638 15.9793 3.40296C15.9562 3.31955 15.9144 3.24248 15.8571 3.17761C15.8024 3.11063 15.7335 3.05663 15.6554 3.01949C15.5772 2.98234 15.4919 2.96298 15.4054 2.96281H3.4588L3.09588 0.970319C3.04575 0.698292 2.90206 0.452371 2.68969 0.275159C2.47732 0.0979457 2.20966 0.000605077 1.93308 0H0.592514C0.435369 0 0.284661 0.0624303 0.173543 0.173557C0.0624253 0.284684 0 0.435404 0 0.592561C0 0.749718 0.0624253 0.900438 0.173543 1.01157C0.284661 1.12269 0.435369 1.18512 0.592514 1.18512H1.93308L3.96243 12.3697C3.6731 12.6246 3.46054 12.9551 3.34863 13.3241C3.23672 13.6931 3.22989 14.086 3.32891 14.4587C3.42794 14.8313 3.62889 15.169 3.90919 15.4338C4.1895 15.6986 4.53807 15.8799 4.91576 15.9576C5.29344 16.0352 5.68528 16.0059 6.04727 15.8732C6.40926 15.7404 6.72707 15.5093 6.96501 15.2059C7.20294 14.9024 7.35158 14.5387 7.39423 14.1554C7.43688 13.7722 7.37185 13.3847 7.20645 13.0363H11.1615C10.9689 13.4424 10.9134 13.9 11.0033 14.3403C11.0933 14.7805 11.3237 15.1797 11.6601 15.4777C11.9965 15.7757 12.4205 15.9563 12.8684 15.9924C13.3163 16.0286 13.7638 15.9182 14.1436 15.678C14.5234 15.4378 14.8149 15.0808 14.9742 14.6606C15.1335 14.2404 15.1521 13.7798 15.0271 13.3482C14.9021 12.9166 14.6403 12.5372 14.281 12.2672C13.9218 11.9972 13.4846 11.8512 13.0353 11.8512H5.0734L4.74751 10.0735H13.339C13.755 10.0733 14.1578 9.92719 14.4772 9.66056C14.7966 9.39393 15.0123 9.0237 15.0869 8.61436ZM6.22139 13.9252C6.22139 14.101 6.16927 14.2728 6.07161 14.419C5.97395 14.5652 5.83514 14.6791 5.67274 14.7464C5.51034 14.8136 5.33164 14.8312 5.15923 14.7969C4.98683 14.7627 4.82846 14.678 4.70417 14.5537C4.57987 14.4294 4.49522 14.271 4.46093 14.0986C4.42664 13.9262 4.44424 13.7475 4.5115 13.585C4.57877 13.4226 4.69269 13.2838 4.83885 13.1861C4.985 13.0885 5.15684 13.0363 5.33262 13.0363C5.56834 13.0363 5.7944 13.13 5.96108 13.2967C6.12775 13.4634 6.22139 13.6894 6.22139 13.9252ZM13.9241 13.9252C13.9241 14.101 13.8719 14.2728 13.7743 14.419C13.6766 14.5652 13.5378 14.6791 13.3754 14.7464C13.213 14.8136 13.0343 14.8312 12.8619 14.7969C12.6895 14.7627 12.5311 14.678 12.4068 14.5537C12.2825 14.4294 12.1979 14.271 12.1636 14.0986C12.1293 13.9262 12.1469 13.7475 12.2142 13.585C12.2814 13.4226 12.3954 13.2838 12.5415 13.1861C12.6877 13.0885 12.8595 13.0363 13.0353 13.0363C13.271 13.0363 13.4971 13.13 13.6638 13.2967C13.8304 13.4634 13.9241 13.6894 13.9241 13.9252ZM3.67358 4.14793H14.6943L13.9241 8.39955C13.8997 8.53687 13.8276 8.66118 13.7206 8.7506C13.6136 8.84002 13.4784 8.88882 13.339 8.88842H4.53273L3.67358 4.14793Z" fill="white" />
								</svg>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="container-wrapper header-wrapp" style="background: <?= $additional_header_color ?>">
			<div class="container">
			</div>
			<div class="container header" style="background: url(<?= $banner_image ?>)">
				<div class="header_content">
					<p class="additional_header"><?= $additional_header; ?></p>
					<h1><?= $main_title_header; ?></h1>
					<p class="banner_text_header"><?= $banner_text_header; ?></p>
					<div class="button_wrapp">
						<?php if ($shop_now_URL) { ?>
							<a class="button" href="<?= $shop_now_URL; ?>"><?= __("shop now"); ?></a>
						<?php }
						if ($view_more_URL) { ?>
							<a class="button" href="<?= $view_more_URL; ?>"><?= __("VIEW MORE"); ?></a>
						<?php }
						?>
					</div>
				</div>
				<div></div>
			</div>
		</div>
	</header>