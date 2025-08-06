<?php

if ( ! function_exists( 'protalks_core_include_yith_color_and_label_variations_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function protalks_core_include_yith_color_and_label_variations_plugin_is_installed( $installed, $plugin ) {
		if ( 'yith-color-and-label-variations' === $plugin ) {
			return defined( 'YITH_WCCL' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'protalks_core_include_yith_color_and_label_variations_plugin_is_installed', 10, 2 );
}

if ( ! function_exists( 'protalks_core_reinit_yith_color_and_label_variations' ) ) {
	/**
	 * Function that reinit plugin js when filter/pagination is used
	 *
	 * @return string
	 */
	function protalks_core_reinit_yith_color_and_label_variations( $selectors ) {
		$selectors .= ' protalks_trigger_get_new_posts';

		return $selectors;
	}

	add_filter( 'yith_wccl_set_plugin_compatibility_selectors', 'protalks_core_reinit_yith_color_and_label_variations' );
}
