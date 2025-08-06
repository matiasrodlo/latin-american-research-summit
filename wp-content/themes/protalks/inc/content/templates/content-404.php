<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<main id="qodef-page-content" role="main">
	<?php
	// Include 404 template.
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo apply_filters( 'protalks_filter_404_page_template', protalks_get_template_part( '404', 'templates/404' ) );
	?>
</main>
