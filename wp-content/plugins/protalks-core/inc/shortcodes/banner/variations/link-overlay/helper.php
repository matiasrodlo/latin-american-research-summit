<?php

if ( ! function_exists( 'protalks_core_add_banner_variation_link_overlay' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_banner_variation_link_overlay( $variations ) {
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_banner_layouts', 'protalks_core_add_banner_variation_link_overlay' );
}
