<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldNavMenuIcon extends QodeFrameworkFieldNavMenuType {

	public function render() {
		$this->params['class'] .= ' qodef-icon-field';
		?>
		<p class="description description-<?php echo esc_attr( $this->params['width'] ); ?> <?php echo esc_attr( $this->params['class'] ); ?>" <?php qode_framework_inline_attrs( $this->params['dependency_data'], true ); ?>>
			<label for="<?php echo esc_attr( $this->params['id'] ); ?>"><?php echo esc_html( $this->title ); ?><br/>
				<select type="text" id="<?php echo esc_attr( $this->params['id'] ); ?>" class="widefat qodef-menu-item-field <?php echo esc_attr( $this->params['id'] ); ?>" data-option-type="selectbox" data-option-name="<?php echo esc_attr( $this->params['field_name'] ); ?>" data-selected="<?php echo esc_attr( $this->params['value'] ); ?>" name="<?php echo esc_attr( $this->params['field_name'] ); ?>">
				</select>
				<span class="description"><?php echo esc_html( $this->description ); ?></span>
			</label>
		</p>
		<?php
	}
}
