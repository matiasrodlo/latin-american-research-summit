<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkFieldCustomizerPanel extends QodeFrameworkFieldCustomizerType {

	public function render() {
		$this->params['wp_customize']->add_panel(
			$this->params['panel'],
			array(
				'title'    => $this->title,
				'priority' => $this->priority,
			)
		);
	}
}
