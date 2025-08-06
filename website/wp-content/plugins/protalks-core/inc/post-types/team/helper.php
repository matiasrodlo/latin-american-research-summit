<?php

if ( ! function_exists( 'protalks_core_team_has_single' ) ) {
	/**
	 * Function that check if custom post type has single page
	 *
	 * @return bool
	 */
	function protalks_core_team_has_single() {
		return true;
	}
}

if ( ! function_exists( 'protalks_core_generate_team_single_layout' ) ) {
	/**
	 * Function that return default layout for custom post type single page
	 *
	 * @return string
	 */
	function protalks_core_generate_team_single_layout() {
		$team_template = protalks_core_get_post_value_through_levels( 'qodef_team_single_layout' );
		$team_template = empty( $team_template ) ? 'default' : $team_template;

		return $team_template;
	}

	add_filter( 'protalks_core_filter_team_single_layout', 'protalks_core_generate_team_single_layout' );
}

if ( ! function_exists( 'protalks_core_get_team_holder_classes' ) ) {
	/**
	 * Function that return classes for the main team holder
	 *
	 * @return string
	 */
	function protalks_core_get_team_holder_classes() {
		$classes = array( '' );

		$classes[] = 'qodef-team-single';

		$item_layout = protalks_core_generate_team_single_layout();
		$classes[]   = 'qodef-item-layout--' . $item_layout;

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'protalks_core_generate_team_archive_with_shortcode' ) ) {
	/**
	 * Function that executes team list shortcode with params on archive pages
	 *
	 * @param string $tax - type of taxonomy
	 * @param string $tax_slug - slug of taxonomy
	 */
	function protalks_core_generate_team_archive_with_shortcode( $tax, $tax_slug ) {
		$params = array();

		$params['additional_params']          = 'tax';
		$params['tax']                        = $tax;
		$params['tax_slug']                   = $tax_slug;
		$params['layout']                     = protalks_core_get_post_value_through_levels( 'qodef_team_archive_item_layout' );
		$params['behavior']                   = protalks_core_get_post_value_through_levels( 'qodef_team_archive_behavior' );
		$params['columns']                    = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns' );
		$params['space']                      = protalks_core_get_post_value_through_levels( 'qodef_team_archive_space' );
		$params['space_custom']               = protalks_core_get_post_value_through_levels( 'qodef_team_archive_space_custom' );
		$params['space_custom_1512']          = protalks_core_get_post_value_through_levels( 'qodef_team_archive_space_custom_1512' );
		$params['space_custom_1200']          = protalks_core_get_post_value_through_levels( 'qodef_team_archive_space_custom_1200' );
		$params['space_custom_880']           = protalks_core_get_post_value_through_levels( 'qodef_team_archive_space_custom_880' );
		$params['vertical_space']             = protalks_core_get_post_value_through_levels( 'qodef_team_archive_vertical_space' );
		$params['vertical_space_custom']      = protalks_core_get_post_value_through_levels( 'qodef_team_archive_vertical_space_custom' );
		$params['vertical_space_custom_1512'] = protalks_core_get_post_value_through_levels( 'qodef_team_archive_vertical_space_custom_1512' );
		$params['vertical_space_custom_1200'] = protalks_core_get_post_value_through_levels( 'qodef_team_archive_vertical_space_custom_1200' );
		$params['vertical_space_custom_880']  = protalks_core_get_post_value_through_levels( 'qodef_team_archive_vertical_space_custom_880' );
		$params['columns_responsive']         = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns_responsive' );
		$params['columns_1512']               = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns_1512' );
		$params['columns_1368']               = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns_1368' );
		$params['columns_1200']               = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns_1200' );
		$params['columns_1024']               = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns_1024' );
		$params['columns_880']                = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns_880' );
		$params['columns_680']                = protalks_core_get_post_value_through_levels( 'qodef_team_archive_columns_680' );
		$params['slider_loop']                = protalks_core_get_post_value_through_levels( 'qodef_team_archive_slider_loop' );
		$params['slider_autoplay']            = protalks_core_get_post_value_through_levels( 'qodef_team_archive_slider_autoplay' );
		$params['slider_speed']               = protalks_core_get_post_value_through_levels( 'qodef_team_archive_slider_speed' );
		$params['slider_navigation']          = protalks_core_get_post_value_through_levels( 'navigation' );
		$params['slider_pagination']          = protalks_core_get_post_value_through_levels( 'pagination' );
		$params['pagination_type']            = protalks_core_get_post_value_through_levels( 'qodef_team_archive_pagination_type' );

		echo ProTalksCore_Team_List_Shortcode::call_shortcode( $params );
	}
}

if ( ! function_exists( 'protalks_core_is_team_title_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 *
	 * @param bool $is_enabled
	 *
	 * @return bool
	 */
	function protalks_core_is_team_title_enabled( $is_enabled ) {
		if ( is_singular( 'team' ) ) {
			$is_enabled = 'no' !== protalks_core_get_post_value_through_levels( 'qodef_enable_team_title' );
		}

		return $is_enabled;
	}

	add_filter( 'protalks_filter_enable_page_title', 'protalks_core_is_team_title_enabled' );
}

if ( ! function_exists( 'protalks_core_team_title_grid' ) ) {
	/**
	 * Function that check is option enabled
	 *
	 * @param bool $enable_title_grid
	 *
	 * @return bool
	 */
	function protalks_core_team_title_grid( $enable_title_grid ) {
		if ( is_singular( 'team' ) ) {
			$enable_title_grid = 'no' !== protalks_core_get_post_value_through_levels( 'qodef_set_team_title_area_in_grid' );
		}

		return $enable_title_grid;
	}

	add_filter( 'protalks_core_filter_page_title_in_grid', 'protalks_core_team_title_grid' );
}

if ( ! function_exists( 'protalks_core_team_breadcrumbs_title' ) ) {
	/**
	 * Improve main breadcrumb template with additional cases
	 *
	 * @param string|html $wrap_child
	 * @param array $settings
	 *
	 * @return string|html
	 */
	function protalks_core_team_breadcrumbs_title( $wrap_child, $settings ) {
		if ( is_tax( 'team-category' ) ) {
			$wrap_child  = '';
			$term_object = get_term( get_queried_object_id(), 'team-category' );

			if ( isset( $term_object->parent ) && 0 !== $term_object->parent ) {
				$parent      = get_term( $term_object->parent );
				$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
			}

			$wrap_child .= sprintf( $settings['current_item'], single_cat_title( '', false ) );
		} elseif ( is_singular( 'team' ) ) {
			$wrap_child = '';
			$post_terms = wp_get_post_terms( get_the_ID(), 'team-category' );

			if ( ! empty( $post_terms ) ) {
				$post_term = $post_terms[0];
				if ( isset( $post_term->parent ) && 0 !== $post_term->parent ) {
					$parent      = get_term( $post_term->parent );
					$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
				}
				$wrap_child .= sprintf( $settings['link'], get_term_link( $post_term ), $post_term->name ) . $settings['separator'];
			}

			$wrap_child .= sprintf( $settings['current_item'], get_the_title() );
		}

		return $wrap_child;
	}

	add_filter( 'protalks_core_filter_breadcrumbs_content', 'protalks_core_team_breadcrumbs_title', 10, 2 );
}

if ( ! function_exists( 'protalks_core_set_team_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param string $sidebar_name
	 *
	 * @return string
	 */
	function protalks_core_set_team_custom_sidebar_name( $sidebar_name ) {

		if ( is_singular( 'team' ) ) {
			$option = protalks_core_get_post_value_through_levels( 'qodef_team_single_custom_sidebar' );
		} elseif ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'team' );

			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$option = protalks_core_get_post_value_through_levels( 'qodef_team_archive_custom_sidebar' );
				}
			}
		}

		if ( isset( $option ) && ! empty( $option ) ) {
			$sidebar_name = $option;
		}

		return $sidebar_name;
	}

	add_filter( 'protalks_filter_sidebar_name', 'protalks_core_set_team_custom_sidebar_name' );
}

if ( ! function_exists( 'protalks_core_set_team_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param string $layout
	 *
	 * @return string
	 */
	function protalks_core_set_team_sidebar_layout( $layout ) {

		if ( is_singular( 'team' ) ) {
			$option = protalks_core_get_post_value_through_levels( 'qodef_team_single_sidebar_layout' );
		} elseif ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'team' );
			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$option = protalks_core_get_post_value_through_levels( 'qodef_team_archive_sidebar_layout' );
				}
			}
		}

		if ( isset( $option ) && ! empty( $option ) ) {
			$layout = $option;
		}

		return $layout;
	}

	add_filter( 'protalks_filter_sidebar_layout', 'protalks_core_set_team_sidebar_layout' );
}

if ( ! function_exists( 'protalks_core_set_team_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function protalks_core_set_team_sidebar_grid_gutter_classes( $classes ) {

		if ( is_singular( 'team' ) ) {
			$option = protalks_core_get_post_value_through_levels( 'qodef_team_single_sidebar_grid_gutter' );
		} elseif ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'team' );
			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$option = protalks_core_get_post_value_through_levels( 'qodef_team_archive_sidebar_grid_gutter' );
				}
			}
		}
		if ( isset( $option ) && ! empty( $option ) ) {
			$classes = 'qodef-gutter--' . esc_attr( $option );
		}

		return $classes;
	}

	add_filter( 'protalks_filter_grid_gutter_classes', 'protalks_core_set_team_sidebar_grid_gutter_classes' );
}

if ( ! function_exists( 'protalks_core_set_team_sidebar_grid_gutter_styles' ) ) {
	/**
	 * Function that returns grid gutter styles
	 *
	 * @param array $styles
	 *
	 * @return array
	 */
	function protalks_core_set_team_sidebar_grid_gutter_styles( $styles ) {

		if ( is_singular( 'team' ) ) {
			$styles = protalks_core_get_gutter_custom_styles( 'qodef_team_single_sidebar_grid_gutter_' );
		} elseif ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'team' );
			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$styles = protalks_core_get_gutter_custom_styles( 'qodef_team_archive_sidebar_grid_gutter_' );
				}
			}
		}

		return $styles;
	}

	add_filter( 'protalks_filter_grid_gutter_styles', 'protalks_core_set_team_sidebar_grid_gutter_styles' );
}

if ( ! function_exists( 'protalks_core_team_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int $position
	 * @param string $map
	 *
	 * @return int
	 */
	function protalks_core_team_set_admin_options_map_position( $position, $map ) {

		if ( 'team' === $map ) {
			$position = 52;
		}

		return $position;
	}

	add_filter( 'protalks_core_filter_admin_options_map_position', 'protalks_core_team_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'protalks_core_set_team_single_content_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function protalks_core_set_team_single_content_styles( $style ) {
		if ( is_singular( 'team' ) ) {
			$team_single_content_style = array();

			$team_single_content_padding = protalks_core_get_post_value_through_levels( 'qodef_team_single_content_padding' );
			if ( ! empty( $team_single_content_padding ) ) {
				$team_single_content_style['padding'] = $team_single_content_padding;
			}

			if ( ! empty( $team_single_content_style ) ) {
				$style .= qode_framework_dynamic_style( '.single-team #qodef-page-inner', $team_single_content_style );
			}

			$team_single_content_style_mobile = array();

			$team_single_content_padding_mobile = protalks_core_get_post_value_through_levels( 'qodef_team_single_content_padding_mobile' );
			if ( ! empty( $team_single_content_padding_mobile ) ) {
				$team_single_content_style_mobile['padding'] = $team_single_content_padding_mobile;
			}

			if ( ! empty( $team_single_content_style_mobile ) ) {
				$style .= qode_framework_dynamic_style_responsive( '.single-team #qodef-page-inner', $team_single_content_style_mobile, '', '1024' );
			}
		}

		return $style;
	}

	add_filter( 'protalks_filter_add_inline_style', 'protalks_core_set_team_single_content_styles' );
}
