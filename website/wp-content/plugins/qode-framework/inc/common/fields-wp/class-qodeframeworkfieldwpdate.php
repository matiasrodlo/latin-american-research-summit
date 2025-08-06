<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldWPDate extends QodeFrameworkFieldWPType {

	public function load_assets() {
		parent::load_assets();

		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_localize_jquery_ui_datepicker();
	}

	public function render_field() { ?>
		<input type="text" class="qodef-datepicker" name="<?php echo esc_attr( $this->name ); ?>" id="<?php echo esc_attr( $this->params['id'] ); ?>" value="<?php echo esc_attr( $this->params['value'] ); ?>" autocomplete="off" readonly />
		<?php
	}
}
