<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldCustomizerSection extends QodeFrameworkFieldCustomizerType {

	public function render() {
		$this->params['wp_customize']->add_section(
			$this->name,
			array(
				'panel'       => $this->params['panel'],
				'priority'    => $this->priority,
				'title'       => $this->title,
				'description' => $this->description,
			)
		);
	}
}
