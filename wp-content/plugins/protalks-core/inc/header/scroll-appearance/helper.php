<?php

if ( ! function_exists( 'protalks_core_dependency_for_scroll_appearance_options' ) ) {
	/**
	 * Function which return dependency values for global module options
	 *
	 * @return array
	 */
	function protalks_core_dependency_for_scroll_appearance_options() {
		return apply_filters( 'protalks_core_filter_header_scroll_appearance_hide_option', array() );
	}
}
