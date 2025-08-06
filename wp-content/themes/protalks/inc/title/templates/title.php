<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-page-title qodef-m <?php echo esc_attr( protalks_get_page_title_classes() ); ?>">
	<?php
	// Hook to include additional content before page title inner.
	do_action( 'protalks_action_before_page_title_inner' );
	?>
	<div class="qodef-m-inner">
		<?php
		// Include module content template.
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo apply_filters( 'protalks_filter_title_content_template', protalks_get_template_part( 'title', 'templates/title-content' ) );
		?>
	</div>
	<?php
	// Hook to include additional content after page title inner.
	do_action( 'protalks_action_after_page_title_inner' );
	?>
</div>
