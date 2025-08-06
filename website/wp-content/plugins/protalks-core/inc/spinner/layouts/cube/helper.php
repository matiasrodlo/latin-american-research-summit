<?php

if ( ! function_exists( 'protalks_core_add_cube_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts - module layouts
	 *
	 * @return array
	 */
	function protalks_core_add_cube_spinner_layout_option( $layouts ) {
		$layouts['cube'] = esc_html__( 'Cube', 'protalks-core' );

		return $layouts;
	}

	add_filter( 'protalks_core_filter_page_spinner_layout_options', 'protalks_core_add_cube_spinner_layout_option' );
}
