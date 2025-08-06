<?php

if ( ! function_exists( 'protalks_core_generate_events_single_layout' ) ) {
	/**
	 * Function that return default layout for custom post type single page
	 *
	 * @return string
	 */
	function protalks_core_generate_events_single_layout() {
		$template = 'default';

		return $template;
	}

	add_filter( 'protalks_core_filter_events_single_layout', 'protalks_core_generate_events_single_layout' );
}

if ( ! function_exists( 'protalks_core_generate_events_archive_with_shortcode' ) ) {
	/**
	 * Function that executes events list shortcode with params on archive pages
	 *
	 * @param string $tax - type of taxonomy
	 * @param string $tax_slug - slug of taxonomy
	 */
	function protalks_core_generate_events_archive_with_shortcode( $tax, $tax_slug ) {
		$params = array();

		$params['additional_params'] = 'tax';
		$params['tax']               = $tax;
		$params['tax_slug']          = $tax_slug;

		echo ProTalksCore_Events_List_Shortcode::call_shortcode( $params );
	}
}

if ( ! function_exists( 'protalks_core_add_events_for_general_meta_box' ) ) {
	function protalks_core_add_events_for_general_meta_box( $cpts ) {
		$cpts[] = 'event-item';

		return $cpts;
	}

	add_filter( 'protalks_core_filter_general_meta_box_scope', 'protalks_core_add_events_for_general_meta_box' );
}
