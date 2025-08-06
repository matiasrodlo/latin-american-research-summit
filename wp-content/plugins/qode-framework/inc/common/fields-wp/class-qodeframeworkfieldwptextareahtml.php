<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldWPTextareahtml extends QodeFrameworkFieldWPType {

	public function render_field() { ?>
		<textarea name="<?php echo esc_attr( $this->name ); ?>" id="<?php echo esc_attr( $this->params['id'] ); ?>" rows="5"><?php echo qode_framework_wp_kses_html( 'content', $this->params['value'] ); ?></textarea>
		<?php
	}
}
