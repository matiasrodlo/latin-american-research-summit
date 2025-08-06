<?php

if ( ! function_exists( 'protalks_core_add_banner_variation_link_button' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_banner_variation_link_button( $variations ) {
		$variations['link-button'] = esc_html__( 'Link Button', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_banner_layouts', 'protalks_core_add_banner_variation_link_button' );
}
