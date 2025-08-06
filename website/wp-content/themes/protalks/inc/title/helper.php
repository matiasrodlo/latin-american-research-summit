<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'protalks_is_page_title_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 */
	function protalks_is_page_title_enabled() {
		return apply_filters( 'protalks_filter_enable_page_title', true );
	}
}

if ( ! function_exists( 'protalks_load_page_title' ) ) {
	/**
	 * Function which loads page template module
	 */
	function protalks_load_page_title() {

		if ( protalks_is_page_title_enabled() ) {
			// Include title template.
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo apply_filters( 'protalks_filter_title_template', protalks_get_template_part( 'title', 'templates/title' ) );
		}
	}

	add_action( 'protalks_action_page_title_template', 'protalks_load_page_title' );
}

if ( ! function_exists( 'protalks_get_page_title_classes' ) ) {
	/**
	 * Function that return classes for page title area
	 *
	 * @return string
	 */
	function protalks_get_page_title_classes() {
		$classes = apply_filters( 'protalks_filter_page_title_classes', array() );

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'protalks_get_page_title_text' ) ) {
	/**
	 * Function that returns current page title text
	 */
	function protalks_get_page_title_text() {
		$title = get_the_title( protalks_get_page_id() );

		if ( ( is_home() && is_front_page() ) || is_singular( 'post' ) ) {
			$title = get_option( 'blogname' );
		} elseif ( is_tag() ) {
			$title = single_term_title( '', false ) . esc_html__( ' Tag', 'protalks' );
		} elseif ( is_date() ) {
			$title = get_the_time( 'F Y' );
		} elseif ( is_author() ) {
			$title = esc_html__( 'Author: ', 'protalks' ) . get_the_author();
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_archive() ) {
			$title = esc_html__( 'Archive', 'protalks' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results for: ', 'protalks' ) . get_search_query();
		} elseif ( is_404() ) {
			$title = esc_html__( '404 - Page not found', 'protalks' );
		}

		return apply_filters( 'protalks_filter_page_title_text', $title );
	}
}
