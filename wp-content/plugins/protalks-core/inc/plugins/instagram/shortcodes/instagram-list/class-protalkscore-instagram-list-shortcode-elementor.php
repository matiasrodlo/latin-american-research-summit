<?php

class ProTalksCore_Instagram_List_Shortcode_Elementor extends ProTalksCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'protalks_core_instagram_list' );

		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'instagram' ) ) {
	protalks_core_register_new_elementor_widget( new ProTalksCore_Instagram_List_Shortcode_Elementor() );
}
