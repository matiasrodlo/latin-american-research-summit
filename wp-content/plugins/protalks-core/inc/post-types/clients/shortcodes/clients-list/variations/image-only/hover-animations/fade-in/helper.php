<?php

if ( ! function_exists( 'protalks_core_filter_clients_list_image_only_fade_in' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_filter_clients_list_image_only_fade_in( $variations ) {
		$variations['fade-in'] = esc_html__( 'Fade In', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_clients_list_image_only_animation_options', 'protalks_core_filter_clients_list_image_only_fade_in' );
}
