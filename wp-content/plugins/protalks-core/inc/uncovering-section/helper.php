<?php

if ( ! function_exists( 'protalks_core_uncovering_section_add_body_classes' ) ) {
	function protalks_core_uncovering_section_add_body_classes( $classes ) {
		$uncovering_section = protalks_core_get_post_value_through_levels( 'qodef_uncovering_section' );

		if ( 'yes' === $uncovering_section ) {
			$classes[] = 'qodef-uncovering-section';
		}

		return $classes;
	}

	add_filter( 'body_class', 'protalks_core_uncovering_section_add_body_classes' );
}
