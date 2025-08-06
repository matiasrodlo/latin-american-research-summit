<?php

if ( ! function_exists( 'protalks_core_add_events_list_variation_info_table' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_events_list_variation_info_table( $variations ) {
		$variations['info-table'] = esc_html__( 'Info Table', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_events_list_layouts', 'protalks_core_add_events_list_variation_info_table' );
}
