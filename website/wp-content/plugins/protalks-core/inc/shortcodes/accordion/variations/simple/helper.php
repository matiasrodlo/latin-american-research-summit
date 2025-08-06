<?php

if ( ! function_exists( 'protalks_core_add_accordion_variation_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_accordion_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_accordion_layouts', 'protalks_core_add_accordion_variation_simple' );
}
