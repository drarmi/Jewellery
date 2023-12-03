<?php
$donec_sollicitudin_image = $args['donec_sollicitudin_image'];
$donec_sollicitudin_text = $args['donec_sollicitudin_text'];
$shop_now_button = $args['shop_now_button'];
$viev_more_button = $args['viev_more_button'];

?>
<section>
	<div class="container-wrapper">
		<div class="container donec_sollicitudin">
			<div>
				<img src="<?= $donec_sollicitudin_image ?>" alt="donec sollicitudin image" loading="lazy" width="624" height="500">
			</div>
			<div class="donec_sollicitudin_content">
				<p class="section_italic_gold"><?= __("Donec sollicitudin"); ?></p>
				<h2 class="section_header_two_size">
					<span><?= __("JEWELLERY"); ?></span>
					<br>
					<span><?= __("STORE"); ?></span>
				</h2>
				<div>
					<?= $donec_sollicitudin_text; ?>
				</div>
				<div class="button_wrapp">
					<?php if ($shop_now_button) { ?>
						<a class="button" href="<?= $shop_now_button; ?>"><?= __("shop now"); ?></a>
					<?php }
					if ($viev_more_button) { ?>
						<a class="button" href="<?= $viev_more_button; ?>"><?= __("VIEW MORE"); ?></a>
					<?php }
					?>
				</div>
			</div>
		</div>
	</div>
</section>