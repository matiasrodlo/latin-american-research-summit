<?php

if ( ! function_exists( 'protalks_core_register_fullscreen_search_layout' ) ) {
	/**
	 * Function that add variation layout into global list
	 *
	 * @param array $search_layouts
	 *
	 * @return array
	 */
	function protalks_core_register_fullscreen_search_layout( $search_layouts ) {
		$search_layouts['fullscreen'] = 'ProTalksCore_Fullscreen_Search';

		return $search_layouts;
	}

	add_filter( 'protalks_core_filter_register_search_layouts', 'protalks_core_register_fullscreen_search_layout' );
}
