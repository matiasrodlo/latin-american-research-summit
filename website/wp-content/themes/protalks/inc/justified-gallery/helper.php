<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'protalks_register_justified_gallery_scripts' ) ) {
	/**
	 * Function that register module 3rd party scripts
	 */
	function protalks_register_justified_gallery_scripts() {
		// phpcs:ignore WordPress.WP.EnqueuedResourceParameters.NoExplicitVersion
		wp_register_script( 'jquery-justified-gallery', PROTALKS_INC_ROOT . '/justified-gallery/assets/js/plugins/jquery.justifiedGallery.min.js', array( 'jquery' ), '', true );
	}

	add_action( 'protalks_action_before_main_js', 'protalks_register_justified_gallery_scripts' );
}

if ( ! function_exists( 'protalks_include_justified_gallery_scripts' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts
	 *
	 * @param array $atts
	 */
	function protalks_include_justified_gallery_scripts( $atts ) {

		if ( isset( $atts['behavior'] ) && 'justified-gallery' === $atts['behavior'] ) {
			wp_enqueue_script( 'jquery-justified-gallery' );
		}
	}

	add_action( 'protalks_core_action_list_shortcodes_load_assets', 'protalks_include_justified_gallery_scripts' );
}

if ( ! function_exists( 'protalks_register_justified_gallery_scripts_for_list_shortcodes' ) ) {
	/**
	 * Function that set module 3rd party scripts for list shortcodes
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function protalks_register_justified_gallery_scripts_for_list_shortcodes( $scripts ) {

		$scripts['jquery-justified-gallery'] = array(
			'registered' => true,
		);

		return $scripts;
	}

	add_filter( 'protalks_core_filter_register_list_shortcode_scripts', 'protalks_register_justified_gallery_scripts_for_list_shortcodes' );
}
