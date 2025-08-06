<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldWPTextarea extends QodeFrameworkFieldWPType {

	public function render_field() {
		$textarea_value = is_array( $this->params['value'] ) ? wp_json_encode( $this->params['value'] ) : $this->params['value'];
		?>
		<textarea name="<?php echo esc_attr( $this->name ); ?>" id="<?php echo esc_attr( $this->params['id'] ); ?>" rows="5"><?php echo esc_html( $textarea_value ); ?></textarea>
		<?php
	}
}
