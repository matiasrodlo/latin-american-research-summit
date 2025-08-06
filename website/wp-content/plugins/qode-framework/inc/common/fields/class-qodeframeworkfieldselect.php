<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldSelect extends QodeFrameworkFieldType {

	public function __construct( $params ) {
		$select_class = 'qodef-select2';
		if ( isset( $params['args'] ) && isset( $params['args']['select2'] ) && false == $params['args']['select2'] ) {
			$select_class = '';
		}
		$params['select_class'] = $select_class;

		$params['multiple'] = '';
		if ( isset( $params['args'] ) && isset( $params['args']['multiple'] ) && $params['args']['multiple'] ) {
			$params['multiple'] = 'multiple';
		}

		parent::__construct( $params );
	}

	public function render_field() {
		$field_name = ! empty( $this->params['multiple'] ) ? $this->name . '[]' : $this->name;
		?>
		<select class="<?php echo esc_attr( $this->params['select_class'] ); ?> qodef-field" name="<?php echo esc_attr( $field_name ); ?>" data-option-name="<?php echo esc_attr( $this->name ); ?>" data-option-type="selectbox" <?php echo esc_attr( $this->params['multiple'] ); ?>>
			<?php
			foreach ( $this->options as $key => $label ) {
				if ( '-1' == $key ) {
					$key = '';
				}

				if ( is_array( $label ) ) {
					?>
					<optgroup label="<?php echo esc_attr( ucwords( str_replace( '-', ' ', $key ) ) ); ?>">
					<?php
					foreach ( $label as $sub_key => $sub_label ) {
						?>
						<option
							<?php
							if ( ( is_array( $this->params['value'] ) && in_array( strval( $sub_key ), $this->params['value'], true ) ) || $this->params['value'] == $sub_key ) {
								echo " selected='selected'";
							}
							?>
								value="<?php echo esc_attr( $sub_key ); ?>">
							<?php echo esc_html( $sub_label ); ?>
						</option>
						<?php
					}
					?>
					</optgroup>
					<?php
				} else {
					?>
					<option
						<?php
						if ( ( is_array( $this->params['value'] ) && in_array( strval( $key ), $this->params['value'], true ) ) || $this->params['value'] == $key ) {
							echo " selected='selected'";
						}
						?>
							value="<?php echo esc_attr( $key ); ?>">
						<?php echo esc_html( $label ); ?>
					</option>
					<?php
				}
				?>
			<?php } ?>
		</select>
		<?php
	}
}
