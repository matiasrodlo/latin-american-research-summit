<?php

if ( ! function_exists( 'protalks_core_add_image_with_text_variation_text_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_image_with_text_variation_text_below( $variations ) {
		$variations['text-below'] = esc_html__( 'Text Below', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_image_with_text_layouts', 'protalks_core_add_image_with_text_variation_text_below' );
}
