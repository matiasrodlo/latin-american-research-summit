<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<footer id="qodef-page-footer" <?php protalks_class_attribute( implode( ' ', apply_filters( 'protalks_filter_footer_holder_classes', array() ) ) ); ?> role="contentinfo">
	<?php
	// Hook to include additional content before page footer content.
	do_action( 'protalks_action_before_page_footer_content' );

	// Include module content template.
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo apply_filters( 'protalks_filter_footer_content_template', protalks_get_template_part( 'footer', 'templates/footer-content' ) );

	// Hook to include additional content after page footer content.
	do_action( 'protalks_action_after_page_footer_content' );
	?>
</footer>
