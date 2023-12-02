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
		<div class="container-wrapper header-wrapp" style="background: <?= $additional_header_color ?>">
			<div class="container" style="background: url(<?= $banner_image ?>)">
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