<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

// Hook to include additional content before 404 page content.
do_action( 'protalks_action_before_404_page_content' );

// Include module content template.
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo apply_filters( 'protalks_filter_404_page_content_template', protalks_get_template_part( '404', 'templates/404-content', '', protalks_get_404_page_parameters() ) );

// Hook to include additional content after 404 page content.
do_action( 'protalks_action_after_404_page_content' );
