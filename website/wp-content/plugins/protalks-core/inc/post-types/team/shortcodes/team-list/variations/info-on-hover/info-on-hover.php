<?php

if ( ! function_exists( 'protalks_core_add_team_list_variation_info_on_hover' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_team_list_variation_info_on_hover( $variations ) {
		$variations['info-on-hover'] = esc_html__( 'Info on Hover', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_team_list_layouts', 'protalks_core_add_team_list_variation_info_on_hover' );
}
