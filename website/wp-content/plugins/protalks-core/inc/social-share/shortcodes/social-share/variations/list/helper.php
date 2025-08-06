<?php

if ( ! function_exists( 'protalks_core_add_social_share_variation_list' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_social_share_variation_list( $variations ) {
		$variations['list'] = esc_html__( 'List', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_social_share_layouts', 'protalks_core_add_social_share_variation_list' );
	add_filter( 'protalks_core_filter_social_share_layout_options', 'protalks_core_add_social_share_variation_list' );
}

if ( ! function_exists( 'protalks_core_set_default_social_share_variation_list' ) ) {
	/**
	 * Function that set default variation layout for this module
	 *
	 * @return string
	 */
	function protalks_core_set_default_social_share_variation_list() {
		return 'list';
	}

	add_filter( 'protalks_core_filter_social_share_layout_default_value', 'protalks_core_set_default_social_share_variation_list' );
}
