<?php

if ( ! function_exists( 'protalks_core_add_blog_list_variation_minimal' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_blog_list_variation_minimal( $variations ) {
		$variations['minimal'] = esc_html__( 'Minimal', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_blog_list_layouts', 'protalks_core_add_blog_list_variation_minimal' );
	add_filter( 'protalks_core_filter_simple_blog_list_widget_layouts', 'protalks_core_add_blog_list_variation_minimal' );
}
