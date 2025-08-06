<?php

if ( ! function_exists( 'protalks_core_are_background_grid_lines_enabled' ) ) {
	/**
	 * Function that check is option enabled
	 *
	 * @return bool
	 */
	function protalks_core_are_background_grid_lines_enabled() {
		return 'yes' === protalks_core_get_post_value_through_levels( 'qodef_enable_background_grid_lines' );
	}
}

if ( ! function_exists( 'protalks_core_set_background_grid_lines_body_classes' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function protalks_core_set_background_grid_lines_body_classes( $classes ) {

		if ( protalks_core_are_background_grid_lines_enabled() ) {
			$classes[] = 'qodef-background-grid-lines--enabled';
		}

		return $classes;
	}

	add_filter( 'body_class', 'protalks_core_set_background_grid_lines_body_classes' );
}

if ( ! function_exists( 'protalks_core_load_background_grid_lines' ) ) {
	/**
	 * Loads Spinners HTML
	 */
	function protalks_core_load_background_grid_lines() {

		if ( protalks_core_are_background_grid_lines_enabled() ) {
			$params         = array();
			$holder_classes = array(
				'qodef-m-background-grid-lines',
			);
			$holder_styles  = array();

			$number_of_lines        = protalks_core_get_post_value_through_levels( 'qodef_background_grid_lines_number' );
			$lines_color            = protalks_core_get_post_value_through_levels( 'qodef_background_grid_lines_color' );
			$lines_decoration_color = protalks_core_get_post_value_through_levels( 'qodef_background_grid_lines_decoration_color' );
			$holder_classes[]       = 'qodef-m-background-grid-lines--' . $number_of_lines;
			$holder_styles[]        = ! empty( $lines_color ) ? '--qode-grid-lines-color: ' . $lines_color : '';
			$holder_styles[]        = ! empty( $lines_decoration_color ) ? '--qode-grid-lines-decoration-color: ' . $lines_decoration_color : '';

			$params['number_of_lines'] = ! empty( $number_of_lines ) ? intval( $number_of_lines ) : 3;
			$params['holder_classes']  = $holder_classes;
			$params['holder_styles']   = $holder_styles;

			protalks_core_template_part( 'background-grid-lines', 'templates/background-grid-lines', '', $params );
		}
	}

	add_action( 'protalks_action_before_page_inner', 'protalks_core_load_background_grid_lines' );
}
