<?php
$top_section_image = $args['top_section_image_'];
$top_section_title = $args['top_section_title'];
$top_section_button = $args['top_section_button'];


?>
<section>
	<div class="container-wrapper">
		<div class="container special_offer_top">
			<div>
				<img src="<?= $top_section_image ?>" alt="Special offer image" loading="lazy" width="581" height="327">
			</div>
			<div class="special_offer_top_content">
				<p class="section_italic_gold"><?= __("Special offer"); ?></p>
				<h2 class="section_header_two_size">
					<?= $top_section_title ?>
				</h2>

				<div class="button_wrapp">
					<?php if ($top_section_button) { ?>
						<a class="button" href="<?= $top_section_button; ?>"><?= __("Check Now"); ?></a>
					<?php }
					?>
				</div>
			</div>
		</div>
	</div>
</section>