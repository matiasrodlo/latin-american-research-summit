<?php

if ( ! function_exists( 'protalks_core_add_button_variation_textual' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_button_variation_textual( $variations ) {
		$variations['textual'] = esc_html__( 'Textual', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_button_layouts', 'protalks_core_add_button_variation_textual' );
}
