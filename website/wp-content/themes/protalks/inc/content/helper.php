<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'protalks_get_page_wrapper_classes' ) ) {
	/**
	 * Function that return classes for the page wrapper div from header.php
	 *
	 * @return string
	 */
	function protalks_get_page_wrapper_classes() {
		return apply_filters( 'protalks_filter_page_wrapper_classes', '' );
	}
}

if ( ! function_exists( 'protalks_get_page_inner_classes' ) ) {
	/**
	 * Function that return classes for the page inner div from header.php
	 *
	 * @return string
	 */
	function protalks_get_page_inner_classes() {
		$classes = 'qodef-content-grid';

		if ( is_page_template( 'page-full-width.php' ) ) {
			$classes = 'qodef-content-full-width';
		} elseif (
			protalks_is_installed( 'framework' ) &&
			protalks_is_installed( 'core' ) &&
			is_singular( 'team' )
		) {
			$team_single_content_in_grid = 'no' !== protalks_core_get_post_value_through_levels( 'qodef_team_single_content_in_grid' );
			if ( ! $team_single_content_in_grid ) {
				$classes = 'qodef-content-full-width';
			}
		}

		return apply_filters( 'protalks_filter_page_inner_classes', $classes );
	}
}

if ( ! function_exists( 'protalks_get_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @return string
	 */
	function protalks_get_grid_gutter_classes() {
		return apply_filters( 'protalks_filter_grid_gutter_classes', '' );
	}
}

if ( ! function_exists( 'protalks_get_grid_gutter_styles' ) ) {
	/**
	 * Function that returns grid gutter styles
	 *
	 * @return string
	 */
	function protalks_get_grid_gutter_styles() {
		return protalks_get_inline_style( apply_filters( 'protalks_filter_grid_gutter_styles', array() ) );
	}
}
