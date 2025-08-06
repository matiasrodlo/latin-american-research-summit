<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-top-holder">
			<div class="qodef-e-info">
				<?php
				// Include post category info.
				protalks_template_part( 'blog', 'templates/parts/post-info/categories' );
				
				// Include post date info.
				protalks_template_part( 'blog', 'templates/parts/post-info/date' );
				?>
			</div>
			<?php
			// Include post title.
			protalks_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h2' ) );
			?>
		</div>
		<?php
		// Include post media.
		protalks_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
	</div>
</article>
