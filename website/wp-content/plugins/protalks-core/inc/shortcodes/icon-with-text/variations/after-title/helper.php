<?php

if ( ! function_exists( 'protalks_core_add_icon_with_text_variation_after_title' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_icon_with_text_variation_after_title( $variations ) {
		$variations['after-title'] = esc_html__( 'After Title', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_icon_with_text_layouts', 'protalks_core_add_icon_with_text_variation_after_title' );
}
