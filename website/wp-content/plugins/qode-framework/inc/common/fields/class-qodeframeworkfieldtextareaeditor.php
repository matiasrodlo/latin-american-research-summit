<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldTextareaeditor extends QodeFrameworkFieldType {

	public function render_field() {

		$settings = array(
			'media_buttons'  => false,
			'textarea_rows'  => 12,
			'editor_class'   => 'qode-framework-textarea-editor',
			'default_editor' => 'tinymce',
		);

		wp_editor( $this->params['value'], $this->name, $settings );
	}
}
