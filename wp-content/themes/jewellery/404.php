<?php

/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>
<div class="container_wrapp nf">
	<div class="container">
		<div>
			404!
		</div>
		<div>
			<a class="return_blog" href="<?= home_url(); ?>"><?= __("To the main page") ?></a>
			<button class="return_blog" onclick="history.go(-1);">
				<?= __("Back") ?>
			</button>
		</div>
	</div>
</div>
<?php
get_footer();
