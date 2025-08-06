<?php

if ( ! function_exists( 'protalks_core_add_clients_list_variation_image_only' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_clients_list_variation_image_only( $variations ) {
		$variations['image-only'] = esc_html__( 'Image Only', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_clients_list_layouts', 'protalks_core_add_clients_list_variation_image_only' );
}
