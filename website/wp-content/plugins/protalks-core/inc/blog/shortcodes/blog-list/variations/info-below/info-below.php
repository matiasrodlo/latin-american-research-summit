<?php

if ( ! function_exists( 'protalks_core_add_blog_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_blog_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_blog_list_layouts', 'protalks_core_add_blog_list_variation_info_below' );
}

if ( ! function_exists( 'protalks_core_load_blog_list_variation_info_below_assets' ) ) {
	/**
	 * Function that return is global blog asses allowed for variation layout
	 *
	 * @param bool $is_enabled
	 * @param array $params
	 *
	 * @return bool
	 */
	function protalks_core_load_blog_list_variation_info_below_assets( $is_enabled, $params ) {

		if ( 'info-below' === $params['layout'] ) {
			$is_enabled = true;
		}

		return $is_enabled;
	}

	add_filter( 'protalks_core_filter_load_blog_list_assets', 'protalks_core_load_blog_list_variation_info_below_assets', 10, 2 );
}

if ( ! function_exists( 'protalks_core_register_blog_list_info_below_scripts' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function protalks_core_register_blog_list_info_below_scripts( $scripts ) {

		$scripts['wp-mediaelement']    = array(
			'registered' => true,
		);
		$scripts['mediaelement-vimeo'] = array(
			'registered' => true,
		);

		return $scripts;
	}

	add_filter( 'protalks_core_filter_blog_list_register_scripts', 'protalks_core_register_blog_list_info_below_scripts' );
}

if ( ! function_exists( 'protalks_core_register_blog_list_info_below_styles' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $styles
	 *
	 * @return array
	 */
	function protalks_core_register_blog_list_info_below_styles( $styles ) {

		$styles['wp-mediaelement'] = array(
			'registered' => true,
		);

		return $styles;
	}

	add_filter( 'protalks_core_filter_blog_list_register_styles', 'protalks_core_register_blog_list_info_below_styles' );
}
