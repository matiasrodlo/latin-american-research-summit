<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'protalks_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function protalks_load_page_mobile_header() {
		// Include mobile header template.
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo apply_filters( 'protalks_filter_mobile_header_template', protalks_get_template_part( 'mobile-header', 'templates/mobile-header' ) );
	}

	add_action( 'protalks_action_page_header_template', 'protalks_load_page_mobile_header' );
}

if ( ! function_exists( 'protalks_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function protalks_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'protalks_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'protalks' ) ) );

		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}

	add_action( 'protalks_action_after_include_modules', 'protalks_register_mobile_navigation_menus' );
}
