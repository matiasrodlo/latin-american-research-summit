<?php

if ( ! function_exists( 'protalks_core_filter_clients_list_image_only_move' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_filter_clients_list_image_only_move( $variations ) {
		$variations['move'] = esc_html__( 'move', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_clients_list_image_only_animation_options', 'protalks_core_filter_clients_list_image_only_move' );
}

if ( ! function_exists( 'protalks_core_set_move_as_clients_list_image_only_default_animation_option' ) ) {
	/**
	 * Function that add default hover option layout for this layout
	 */
	function protalks_core_set_move_as_clients_list_image_only_default_animation_option() {
		return 'move';
	}

	add_filter( 'protalks_core_filter_clients_list_image_only_default_animation_option', 'protalks_core_set_move_as_clients_list_image_only_default_animation_option' );
}
