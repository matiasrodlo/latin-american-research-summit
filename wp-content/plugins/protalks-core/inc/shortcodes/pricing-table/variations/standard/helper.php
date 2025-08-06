<?php

if ( ! function_exists( 'protalks_core_add_pricing_table_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_pricing_table_variation_standard( $variations ) {

		$variations['standard'] = esc_html__( 'Standard', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_pricing_table_layouts', 'protalks_core_add_pricing_table_variation_standard' );
}
