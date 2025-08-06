<?php

if ( ! function_exists( 'protalks_core_add_blog_list_variation_side_by_side' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_blog_list_variation_side_by_side( $variations ) {
		$variations['side-by-side'] = esc_html__( 'Side By Side', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_blog_list_layouts', 'protalks_core_add_blog_list_variation_side_by_side' );
	add_filter( 'protalks_core_filter_simple_blog_list_widget_layouts', 'protalks_core_add_blog_list_variation_side_by_side' );
}
