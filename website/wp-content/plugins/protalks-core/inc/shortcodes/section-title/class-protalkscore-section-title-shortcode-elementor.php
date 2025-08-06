<?php

class ProTalksCore_Section_Title_Shortcode_Elementor extends ProTalksCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'protalks_core_section_title' );

		parent::__construct( $data, $args );
	}
}

protalks_core_register_new_elementor_widget( new ProTalksCore_Section_Title_Shortcode_Elementor() );
