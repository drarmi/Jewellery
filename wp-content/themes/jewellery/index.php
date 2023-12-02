<?php
get_header();
?>
<div class="container-wrapper">
	<div class="container">
		<?php
		if (have_posts()) : while (have_posts()) : the_post();
				$post_title = get_the_title();
				$post_content = get_the_content();
				$post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'full');
				echo '<h1>' . $post_title . '</h1>';
				echo '<div class="post-content">' . $post_content;
				if ($post_thumbnail) {
					echo '<div class="post-thumbnail">' . $post_thumbnail . '</div>';
				}
				echo '</div>';
			endwhile;
		endif;
		?>
	</div>
</div>
<?php
get_footer();
?>