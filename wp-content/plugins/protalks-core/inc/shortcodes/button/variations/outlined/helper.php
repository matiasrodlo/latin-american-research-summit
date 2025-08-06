<?php

if ( ! function_exists( 'protalks_core_add_button_variation_outlined' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_button_variation_outlined( $variations ) {
		$variations['outlined'] = esc_html__( 'Outlined', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_button_layouts', 'protalks_core_add_button_variation_outlined' );
}
