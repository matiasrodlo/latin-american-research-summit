<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldCustomizerControl extends QodeFrameworkFieldCustomizerType {

	public function render() {
		$this->params['wp_customize']->add_control(
			$this->name,
			array(
				'section'  => $this->section,
				'settings' => $this->settings,
				'type'     => $this->option_type,
				'label'    => $this->title,
			)
		);
	}
}
