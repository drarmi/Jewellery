<?php
function add_tab_custom()
{
	add_menu_page(
		__('Header'),
		__('Header'),
		'manage_options',
		'custom_header_page',
		'custom_header_page_fn',
		'dashicons-admin-appearance'
	);
}

function custom_header_page_fn()
{ ?>
	<div class="custom_wrap">
		<div>
			<h2><?php echo __('Banner option'); ?></h2>
			<form method="post" action="options.php">
				<?php
				settings_fields('custom_header_settings');
				do_settings_sections('custom_header_settings');
				?>
				<div class="page_row">
					<label for="additional_header"><?php echo esc_html__('Additional header:', 'textdomain'); ?></label>
					<input type="text" id="additional_header" name="additional_header" value="<?php echo esc_attr(get_option('additional_header')); ?>" />
				</div>


				<div class="page_row">
					<label for="main_title_header"><?php echo esc_html__('Main title:', 'textdomain'); ?></label>
					<input id="main_title_header" name="main_title_header" value="<?php echo esc_attr(get_option('main_title_header')); ?>" />
				</div>

				<div class="page_row">
					<label for="banner_text_header"><?php echo esc_html__('Banner text:', 'textdomain'); ?></label>
					<textarea id="banner_text_header" name="banner_text_header"><?php echo esc_attr(get_option('banner_text_header')); ?></textarea>
				</div>

				<div class="page_row">
					<div>
						<label for="banner_image"><?php echo esc_html__('Banner Image:', 'textdomain'); ?></label>
						<input type="text" id="banner_image" name="banner_image" value="<?php echo esc_attr(get_option('banner_image')); ?>" />
					</div>
					<img src="<?php echo get_option('banner_image'); ?>" alt="banner">
					<div></div>
					<button class="upload_image_button button">Upload Image</button>
				</div>

				<div class="page_row">
					<label for="additional_header_color"><?php echo esc_html__('Header Color:', 'textdomain'); ?></label>
					<input type="text" id="additional_header_color" name="additional_header_color" class="color-picker" value="<?php echo esc_attr(get_option('additional_header_color', '#000000')); ?>" />
				</div>

				<div class="page_row">
					<label for="shop_now"><?php echo esc_html__('Shop now URL:', 'textdomain'); ?></label>
					<input id="shop_now" name="shop_now" value="<?php echo esc_attr(get_option('shop_now')); ?>" />
				</div>

				<div class="page_row">
					<label for="view_more_url"><?php echo esc_html__('View more URL:', 'textdomain'); ?></label>
					<input id="view_more_url" name="view_more_url" value="<?php echo esc_attr(get_option('view_more_url')); ?>" />
				</div>

				<?php submit_button(); ?>
			</form>
		</div>
	</div>
<?php }

function custom_header_settings()
{
	register_setting('custom_header_settings', 'additional_header');
	register_setting('custom_header_settings', 'main_title_header');
	register_setting('custom_header_settings', 'banner_text_header');
	register_setting('custom_header_settings', 'banner_image');
	register_setting('custom_header_settings', 'shop_now');
	register_setting('custom_header_settings', 'view_more_url');
	register_setting('custom_header_settings', 'additional_header_color');
}



add_action('admin_menu', 'add_tab_custom', 99);
add_action('admin_init', 'custom_header_settings');
