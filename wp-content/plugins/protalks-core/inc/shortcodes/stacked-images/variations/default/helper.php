<?php

if ( ! function_exists( 'protalks_core_add_stacked_images_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_stacked_images_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_stacked_images_layouts', 'protalks_core_add_stacked_images_variation_default' );
}
