<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkOptionsUser extends QodeFrameworkOptions {

	public function __construct() {
		parent::__construct();

		add_action( 'init', array( $this, 'init_user_fields' ) );
		add_action( 'show_user_profile', array( $this, 'user_fields_display' ) );
		add_action( 'edit_user_profile', array( $this, 'user_fields_display' ) );
		add_action( 'personal_options_update', array( $this, 'save_user_fields' ) );
		add_action( 'edit_user_profile_update', array( $this, 'save_user_fields' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_framework_user_scripts' ), 5 ); // 5 is set to be same permission as Gutenberg plugin have
	}

	public function init_user_fields() {
		do_action( 'qode_framework_action_custom_user_fields' );
	}

	public function user_fields_display( $user ) {
		$params                = array();
		$params['this_object'] = $this;
		$params['roles']       = $user->roles;
		qode_framework_template_part( QODE_FRAMEWORK_INC_PATH, 'common', 'modules/user/templates/holder', '', $params );
	}

	public function save_user_fields( $user_id ) {
		foreach ( $this->get_options() as $key => $value ) {
			$value      = array_key_exists( $key, $_POST ) ? $_POST[ $key ] : '';
			$trim_value = ! is_array( $value ) ? trim( $value ) !== '' : ! empty( array_filter( $value ) );

			if ( ( '0' === $value || ! empty( $value ) ) && $trim_value ) {

				if ( false !== strpos( $key, '_page_description' ) ) {
					update_user_meta( $user_id, $key, wp_kses_post( trim( html_entity_decode( wp_unslash( $value ) ) ) ) );
				} else {
					update_user_meta( $user_id, $key, is_array( $value ) ? array_map( 'sanitize_text_field', $value ) : sanitize_text_field( $value ) );
				}
			} else {
				delete_user_meta( $user_id, $key );
			}
		}
	}

	public function enqueue_framework_user_scripts( $hook ) {
		if ( 'profile.php' === $hook || 'user-edit.php' === $hook ) {
			$this->enqueue_dashboard_framework_scripts();
		}
	}
}
