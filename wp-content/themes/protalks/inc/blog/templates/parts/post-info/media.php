<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			protalks_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			protalks_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			protalks_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			protalks_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	}
	?>
</div>
