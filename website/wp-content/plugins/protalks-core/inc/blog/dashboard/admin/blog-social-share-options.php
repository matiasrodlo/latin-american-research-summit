<?php

if ( ! function_exists( 'protalks_core_add_blog_social_share_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_blog_social_share_options( $cpt_tab ) {

		if ( $cpt_tab ) {
			$cpt_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_blog_enable_social_share',
					'title'         => esc_html__( 'Enable Social Share For Blog', 'protalks-core' ),
					'description'   => esc_html__( 'Enable this option to display social share sections on Blog singles and certain lists by default', 'protalks-core' ),
					'default_value' => 'yes',
				)
			);
		}
	}

	add_action( 'protalks_core_action_after_social_share_cpt_options_map', 'protalks_core_add_blog_social_share_options' );
}
