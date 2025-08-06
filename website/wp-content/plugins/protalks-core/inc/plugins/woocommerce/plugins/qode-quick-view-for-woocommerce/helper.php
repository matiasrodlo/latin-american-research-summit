<?php

if ( ! function_exists( 'protalks_core_include_qode_quick_view_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool   $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function protalks_core_include_qode_quick_view_plugin_is_installed( $installed, $plugin ) {
		if ( 'qode-quick-view' === $plugin ) {
			return defined( 'QODE_QUICK_VIEW_FOR_WOOCOMMERCE_VERSION' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'protalks_core_include_qode_quick_view_plugin_is_installed', 10, 2 );
}
