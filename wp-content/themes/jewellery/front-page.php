<?
/*
Template Name: front-page
*/
get_header();

$font_page_group = get_field("font_page");

get_template_part('template-parts/donec_sollicitudin', get_post_format(), array(
	'donec_sollicitudin_image' => $font_page_group["donec_sollicitudin_image"] ?? "",
	'donec_sollicitudin_text' => $font_page_group["donec_sollicitudin_text"] ?? "",
	'shop_now_button' => $font_page_group["shop_now_button"] ? $font_page_group["shop_now_button"]["url"] : "",
	'viev_more_button' => $font_page_group["viev_more_button"] ? $font_page_group["viev_more_button"]["url"] : "",
));

get_template_part('template-parts/featured', get_post_format());

get_template_part('template-parts/special_offer', get_post_format(), array(
	'top_section_image_' => $font_page_group["top_section_image_"] ?? "",
	'top_section_title' => $font_page_group["top_section_title"] ?? "",
	'top_section_button' => $font_page_group["top_section_button"] ? $font_page_group["top_section_button"]["url"] : "",
));

get_template_part('template-parts/discount', get_post_format(), array(
	'center_section_image' => $font_page_group["center_section_image"] ?? "",
	'center_section_title' => $font_page_group["center_section_title"] ?? "",
	'center_section_text' => $font_page_group["center_section_text"] ?? "",
	'center_section_list' => json_encode($font_page_group["center_section_list"] ?? array()),
	'center_section_button_go_to_shop' => $font_page_group["center_section_button_go_to_shop"] ? $font_page_group["center_section_button_go_to_shop"] : "",
	'center_section_button_view_more' => $font_page_group["center_section_button_view_more"] ? $font_page_group["center_section_button_view_more"] : "",
));

get_template_part('template-parts/special_offer_bottom', get_post_format());

get_template_part('template-parts/blog', get_post_format());

get_footer();
