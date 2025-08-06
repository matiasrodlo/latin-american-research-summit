<?php

class ProtalksCore_Background_Svg_Shortcode_Elementor extends ProtalksCore_Elementor_Widget_Base {

	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'protalks_core_background_svg' );

		parent::__construct( $data, $args );
	}
}

protalks_core_register_new_elementor_widget( new ProtalksCore_Background_Svg_Shortcode_Elementor() );
