<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

// Hook to include additional content before page header.
do_action( 'protalks_action_before_page_header' );
?>
<header id="qodef-page-header" <?php protalks_class_attribute( apply_filters( 'protalks_filter_header_class', array() ) ); ?> role="banner">
	<?php
	// Hook to include additional content before page header inner.
	do_action( 'protalks_action_before_page_header_inner' );
	?>
	<div id="qodef-page-header-inner" <?php protalks_class_attribute( apply_filters( 'protalks_filter_header_inner_class', array(), 'default' ) ); ?>>
		<?php
		// Include module content template.
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo apply_filters( 'protalks_filter_header_content_template', protalks_get_template_part( 'header', 'templates/header-content' ) );
		?>
	</div>
	<?php
	// Hook to include additional content after page header inner.
	do_action( 'protalks_action_after_page_header_inner' );
	?>
</header>
