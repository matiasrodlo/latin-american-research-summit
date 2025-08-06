<?php

if ( ! function_exists( 'protalks_core_add_social_share_variation_text' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_social_share_variation_text( $variations ) {
		$variations['text'] = esc_html__( 'Text', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_social_share_layouts', 'protalks_core_add_social_share_variation_text' );
	add_filter( 'protalks_core_filter_social_share_layout_options', 'protalks_core_add_social_share_variation_text' );
}
