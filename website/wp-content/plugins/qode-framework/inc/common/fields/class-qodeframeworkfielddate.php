<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldDate extends QodeFrameworkFieldType {

	public function __construct( $params ) {
		$date_format = 'yy-mm-dd';
		if ( isset( $params['args'] ) && isset( $params['args']['date_format'] ) && ! empty( $params['args']['date_format'] ) ) {
			$date_format = $params['args']['date_format'];
		}
		$params['date_format'] = $date_format;

		parent::__construct( $params );
	}

	public function load_assets() {
		parent::load_assets();

		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_localize_jquery_ui_datepicker();
	}

	public function render_field() {
		?>
		<input type="text" data-date-format="<?php echo esc_attr( $this->params['date_format'] ); ?>" class="qodef-field qodef-input qodef-datepicker" name="<?php echo esc_attr( $this->name ); ?>" value="<?php echo esc_attr( $this->params['value'] ); ?>" autocomplete="off" readonly/>
		<?php
	}
}
