<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldAttachmentText extends QodeFrameworkFieldAttachmentType {

	public function render() {
		$html = '<input type="text" name="' . esc_attr( $this->name ) . '" value="' . esc_attr( $this->params['value'] ) . '">';

		$this->form_fields['html'] = $html;
	}
}
