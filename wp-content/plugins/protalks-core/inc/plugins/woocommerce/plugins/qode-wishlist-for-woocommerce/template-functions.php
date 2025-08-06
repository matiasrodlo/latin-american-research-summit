<?php

if ( ! function_exists( 'protalks_core_woo_set_qode_wishlist_table_headings' ) ) {
	/**
	 * Function that modify wishlist table heading
	 *
	 * @param $params
	 *
	 * @return array
	 */
	function protalks_core_woo_set_qode_wishlist_table_headings( $params ) {
		$params['name']['label']         = esc_html__( 'Product', 'protalks-core' );
		$params['stock-status']['label'] = esc_html__( 'Stock', 'protalks-core' );

		return $params;
	}

	add_filter( 'qode_wishlist_for_woocommerce_filter_wishlist_table_items_args', 'protalks_core_woo_set_qode_wishlist_table_headings' );
}
