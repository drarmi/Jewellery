<?php
function add_tab_custom()
{
	add_menu_page(
		__('Theme Options'),
		__('Theme Options'),
		'manage_options',
		'custom_theme_settings_page',
		'custom_theme_settings_page_fn',
		'dashicons-admin-appearance'
	);

	add_submenu_page(
		'custom_theme_settings_page',
		__('Header'),
		__('Header'),
		'manage_options',
		'custom_header_page',
		'custom_header_page_fn',
	);

	add_submenu_page(
		'custom_theme_settings_page',
		__('Footer'),
		__('Footer'),
		'manage_options',
		'custom_footer_page',
		'custom_footer_page_fn'
	);
}

function custom_theme_settings_page_fn()
{ ?>
	<div class="custom_wrap">
		<?php echo '<h1>Theme Settings</h1>'; ?>
		<div>
			<form method="post" action="options.php">
				<?php
				settings_fields('custom_main_settings');
				do_settings_sections('custom_main_settings');
				?>
				<div class="page_row">
					<label for="option_address"><?php echo esc_html__('Address:', 'textdomain'); ?></label>
					<input type="text" id="option_address" name="option_address" value="<?php echo esc_attr(get_option('option_address')); ?>" />
				</div>

				<div class="page_row">
					<label for="option_phone"><?php echo esc_html__('Phone:', 'textdomain'); ?></label>
					<input type="text" id="option_phone" name="option_phone" value="<?php echo esc_attr(get_option('option_phone')); ?>" />
				</div>

				<div class="page_row">
					<label for="option_fax"><?php echo esc_html__('Fax:', 'textdomain'); ?></label>
					<input type="text" id="option_fax" name="option_fax" value="<?php echo esc_attr(get_option('option_fax')); ?>" />
				</div>

				<div class="page_row">
					<label for="option_footer_tex"><?php echo esc_html__('Fax:', 'textdomain'); ?></label>
					<textarea type="text" id="option_footer_tex" name="option_footer_tex" /><?php echo esc_attr(get_option('option_footer_tex')); ?></textarea>
				</div>

				<div class="page_row">
					<div>
						<label for="logo_foote"><?php echo esc_html__('Logo:', 'textdomain'); ?></label>
						<input type="text" id="logo_foote" name="logo_foote" value="<?php echo esc_attr(get_option('logo_foote')); ?>" />
					</div>
					<img src="<?php echo esc_url(get_option('logo_foote')); ?>" alt="banner" style="max-width: 100%;" />
					<div></div>
					<button class="upload_image_button button">Upload Image</button>
				</div>
				<?php submit_button(); ?>
			</form>
		</div>
	</div>
<?php }

function custom_main_settings()
{
	register_setting('custom_main_settings', 'option_address');
	register_setting('custom_main_settings', 'option_fax');
	register_setting('custom_main_settings', 'option_phone');
	register_setting('custom_main_settings', 'option_footer_tex');
	register_setting('custom_main_settings', 'logo_foote');
}
add_action('admin_init', 'custom_main_settings');




function custom_footer_page_fn()
{ ?>
	<div class="custom_wrap">
		<?php echo '<h1>Footer</h1>'; ?>
		<div>
			<form method="post" action="options.php">
				<h2><?php echo __('OUR STORES'); ?></h2>
				<?php
				settings_fields('custom_footer_settings');
				do_settings_sections('custom_footer_settings');
				?>
				<!-- row1 -->
				<div class="page_row">
					<label for="location_footer_title_1"><?php echo esc_html__('Location title:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_title_1" name="location_footer_title_1" value="<?php echo esc_attr(get_option('location_footer_title_1')); ?>" />
				</div>
				<div class="page_row">
					<label for="location_footer_url_1"><?php echo esc_html__('Location url:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_url_1" name="location_footer_url_1" value="<?php echo esc_attr(get_option('location_footer_url_1')); ?>" />
				</div>
				<!-- row2 -->
				<div class="page_row">
					<label for="location_footer_title_2"><?php echo esc_html__('Location title:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_title_2" name="location_footer_title_2" value="<?php echo esc_attr(get_option('location_footer_title_2')); ?>" />
				</div>
				<div class="page_row">
					<label for="location_footer_url_2"><?php echo esc_html__('Location url:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_url_2" name="location_footer_url_2" value="<?php echo esc_attr(get_option('location_footer_url_2')); ?>" />
				</div>
				<!-- row3 -->
				<div class="page_row">
					<label for="location_footer_title_3"><?php echo esc_html__('Location title:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_title_3" name="location_footer_title_3" value="<?php echo esc_attr(get_option('location_footer_title_3')); ?>" />
				</div>
				<div class="page_row">
					<label for="location_footer_url_3"><?php echo esc_html__('Location url:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_url_3" name="location_footer_url_3" value="<?php echo esc_attr(get_option('location_footer_url_3')); ?>" />
				</div>
				<!-- row4 -->
				<div class="page_row">
					<label for="location_footer_title_4"><?php echo esc_html__('Location title:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_title_4" name="location_footer_title_4" value="<?php echo esc_attr(get_option('location_footer_title_4')); ?>" />
				</div>
				<div class="page_row">
					<label for="location_footer_url_4"><?php echo esc_html__('Location url:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_url_4" name="location_footer_url_4" value="<?php echo esc_attr(get_option('location_footer_url_4')); ?>" />
				</div>
				<!-- row5 -->
				<div class="page_row">
					<label for="location_footer_title_5"><?php echo esc_html__('Location title:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_title_5" name="location_footer_title_5" value="<?php echo esc_attr(get_option('location_footer_title_5')); ?>" />
				</div>
				<div class="page_row">
					<label for="location_footer_url_5"><?php echo esc_html__('Location url:', 'textdomain'); ?></label>
					<input type="text" id="location_footer_url_5" name="location_footer_url_5" value="<?php echo esc_attr(get_option('location_footer_url_5')); ?>" />
				</div>

				<h2><?php echo __('RECENT POSTS'); ?></h2>
				<div class="page_row">
					<label for="footer_post_id_1"><?php echo esc_html__('Post ID:', 'textdomain'); ?></label>
					<input type="text" id="footer_post_id_1" name="footer_post_id_1" value="<?php echo esc_attr(get_option('footer_post_id_1')); ?>" />
				</div>
				<div class="page_row">
					<label for="footer_post_id_2"><?php echo esc_html__('Post ID:', 'textdomain'); ?></label>
					<input type="text" id="footer_post_id_2" name="footer_post_id_2" value="<?php echo esc_attr(get_option('footer_post_id_2')); ?>" />
				</div>

				<?php submit_button(); ?>
			</form>
		</div>
	</div>
<?php }


function custom_footer_settings()
{
	register_setting('custom_footer_settings', 'location_footer_title_1');
	register_setting('custom_footer_settings', 'location_footer_url_1');
	register_setting('custom_footer_settings', 'location_footer_title_2');
	register_setting('custom_footer_settings', 'location_footer_url_2');
	register_setting('custom_footer_settings', 'location_footer_title_3');
	register_setting('custom_footer_settings', 'location_footer_url_3');
	register_setting('custom_footer_settings', 'location_footer_title_4');
	register_setting('custom_footer_settings', 'location_footer_url_4');
	register_setting('custom_footer_settings', 'location_footer_title_5');
	register_setting('custom_footer_settings', 'location_footer_url_5');

	register_setting('custom_footer_settings', 'footer_post_id_2');
	register_setting('custom_footer_settings', 'footer_post_id_1');
}
add_action('admin_init', 'custom_footer_settings');



function custom_header_page_fn()
{ ?>
	<div class="custom_wrap">
		<?php echo '<h1>Header</h1>'; ?>
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
