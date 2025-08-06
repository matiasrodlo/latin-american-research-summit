<?php

if ( ! function_exists( 'protalks_core_add_team_list_variation_side_by_side' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_team_list_variation_side_by_side( $variations ) {
		$variations['side-by-side'] = esc_html__( 'Side By Side', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_team_list_layouts', 'protalks_core_add_team_list_variation_side_by_side' );
}

if ( ! function_exists( 'protalks_core_add_team_list_options_side_by_side' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function protalks_core_add_team_list_options_side_by_side( $options ) {
		$side_by_side_options   = array();
		$side_by_side_options[] = array(
			'field_type'    => 'select',
			'name'          => 'side_by_side_show_contact_info',
			'title'         => esc_html__( 'Show Contact Info', 'protalks-core' ),
			'options'       => protalks_core_get_select_type_options_pool( 'yes_no', false ),
			'default_value' => 'yes',
			'dependency'    => array(
				'show' => array(
					'layout' => array(
						'values'        => 'side-by-side',
						'default_value' => 'default',
					),
				),
			),
			'group'         => esc_html__( 'Layout', 'protalks-core' ),
		);
		$side_by_side_options[] = array(
			'field_type'    => 'select',
			'name'          => 'side_by_side_show_social_info',
			'title'         => esc_html__( 'Show Social Info', 'protalks-core' ),
			'options'       => protalks_core_get_select_type_options_pool( 'yes_no', false ),
			'default_value' => 'yes',
			'dependency'    => array(
				'show' => array(
					'layout' => array(
						'values'        => 'side-by-side',
						'default_value' => 'default',
					),
				),
			),
			'group'         => esc_html__( 'Layout', 'protalks-core' ),
		);

		return array_merge( $options, $side_by_side_options );
	}

	add_filter( 'protalks_core_filter_team_list_extra_options', 'protalks_core_add_team_list_options_side_by_side' );
}
