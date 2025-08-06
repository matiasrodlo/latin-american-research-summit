<?php

if ( ! function_exists( 'protalks_core_woo_set_qode_quick_view_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function protalks_core_woo_set_qode_quick_view_single_title() {
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h2';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title product_title entry-title">' . wp_kses_post( get_the_title() ) . '</' . esc_attr( $title_tag ) . '>';
	}
}
