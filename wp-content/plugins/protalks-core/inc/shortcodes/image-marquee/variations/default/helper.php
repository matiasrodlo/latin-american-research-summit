<?php

if ( ! function_exists( 'protalks_core_add_image_marquee_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_image_marquee_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_image_marquee_layouts', 'protalks_core_add_image_marquee_variation_default' );
}
