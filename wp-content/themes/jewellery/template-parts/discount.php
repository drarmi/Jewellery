<?php
$center_section_image = $args['center_section_image'];
$center_section_title = $args['center_section_title'];
$center_section_text = $args['center_section_text'];
$center_section_list = $args['center_section_list'] ? json_decode($args['center_section_list']) : "";
$center_section_button_go_to_shop = $args['center_section_button_go_to_shop'];
$center_section_button_view_more = $args['center_section_button_view_more'];
?>

<section>
	<div class="container-wrapper">
		<div class="container donec_sollicitudin">
			<div class="donec_sollicitudin_content discount">
				<h2 class="section_header_two_size">
					<?= $center_section_title; ?>
				</h2>
				<div>
					<?= $center_section_text ?>
				</div>
				<ul>
					<?php if ($center_section_list && is_array($center_section_list)) {
						foreach ($center_section_list as $item) { ?>
							<li><?= $item->item; ?></li>
					<?php }
					} ?>
				</ul>
				<div class="button_wrapp">
					<?php if ($center_section_button_go_to_shop) { ?>
						<a class="button" href="<?= $center_section_button_go_to_shop; ?>"><?= __("Go to shop"); ?></a>
					<?php }
					if ($center_section_button_view_more) { ?>
						<a class="button" href="<?= $center_section_button_view_more; ?>"><?= __("VIEW MORE"); ?></a>
					<?php }
					?>
				</div>
			</div>
			<div>
				<img src="<?= $center_section_image ?>" alt="donec sollicitudin image" loading="lazy" width="624" height="500">
			</div>
		</div>
	</div>
</section>