<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class QodeFrameworkOptionsMeta extends QodeFrameworkOptions {

	public function __construct() {
		parent::__construct();

		add_action( 'wp_loaded', array( $this, 'populate_meta_box' ) );
		add_action( 'add_meta_boxes', array( $this, 'meta_box_register' ) );
		add_action( 'do_meta_boxes', array( $this, 'remove_default_custom_fields' ) );
		add_action( 'save_post', array( $this, 'meta_box_save' ), 1, 2 );
		add_filter( 'sanitize_post_meta_qode_framework_meta_option', array( $this, 'sanitize_meta_option' ) );
		// 5 is set to be same permission as Gutenberg plugin have.
		add_action( 'admin_head', array( $this, 'enqueue_framework_meta_scripts' ), 5 );

		add_filter( 'admin_body_class', array( $this, 'add_admin_body_classes' ) );
	}

	public function populate_meta_box() {
		do_action( 'qode_framework_action_populate_meta_box' );
	}

	public function meta_box_register() {

		do_action( 'qode_framework_action_before_meta_options_register' );

		foreach ( $this->get_child_elements() as $key => $box ) {
			if ( is_array( $box->get_scope() ) && count( $box->get_scope() ) ) {
				foreach ( $box->get_scope() as $screen ) {
					add_meta_box(
						'qode-framework-meta-box-' . $key,
						$box->get_title(),
						array( $this, 'render_meta_box' ),
						$screen,
						'advanced',
						'high',
						array( 'box' => $box )
					);
				}
			}
		}

		do_action( 'qode_framework_action_after_meta_options_register' );
	}

	public function render_meta_box( $post, $metabox ) {
		$params            = array();
		$params['post']    = $post;
		$params['metabox'] = $metabox;
		qode_framework_template_part( QODE_FRAMEWORK_INC_PATH, 'common', 'modules/meta-boxes/templates/holder', '', $params );
	}

	public function meta_box_add_hidden_class( $classes = array() ) {
		if ( ! in_array( 'qode-framework-meta-box-hidden', $classes, true ) ) {
			$classes[] = 'qode-framework-meta-box-hidden';
		}

		return $classes;
	}

	public function remove_default_custom_fields() {
		$post_types = apply_filters( 'qode_framework_filter_meta_box_remove', array() );

		if ( ! empty( $post_types ) ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				foreach ( $post_types as $post_type ) {
					remove_meta_box( 'postcustom', $post_type, $context );
				}
			}
		}
	}

	public function meta_box_save( $post_id, $post ) {
		$nonces_array = array();
		$meta_boxes   = $this->get_child_elements_by_scope( $post->post_type );

		if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
			foreach ( $meta_boxes as $meta_box ) {
				$nonces_array[] = 'qode_framework_meta_box_' . $meta_box->get_slug() . '_save';
			}
		}

		if ( is_array( $nonces_array ) && count( $nonces_array ) ) {
			foreach ( $nonces_array as $nonce ) {
				if ( ! isset( $_POST[ $nonce ] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $nonce ] ) ), $nonce ) ) {
					return;
				}
			}
		}

		$post_types = apply_filters( 'qode_framework_filter_meta_box_save', array( 'post', 'page' ) );

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! isset( $_POST['_wpnonce'] ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( ! in_array( $post->post_type, $post_types, true ) ) {
			return;
		}

		// Hook to allow 3rd party elements to save their own fields.
		do_action( 'qode_framework_action_save_post_meta_box', $post_id, $_POST );

		foreach ( $this->get_options() as $key => $box ) {
			$value = sanitize_meta( 'qode_framework_meta_option', array_key_exists( $key, $_POST ) ? wp_unslash( $_POST[ $key ] ) : '', 'post' );

			if ( '' !== $value ) {
				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}
	}

	public function sanitize_array_option( $value ) {

		if ( strpos( $value, '<svg' ) !== false || strpos( $value, '<br' ) !== false ) {
			$sanitized_value = wp_kses_post( $value );
		} else {
			$sanitized_value = _sanitize_text_fields( $value, false );
		}

		return apply_filters( 'sanitize_text_field', $sanitized_value, $value );
	}

	public function sanitize_meta_option( $value ) {
		$sanitized_value = '';
		$trim_value      = ! is_array( $value ) ? trim( $value ) !== '' : ! empty( array_filter( $value ) );

		if ( ( ! empty( $value ) || '0' === $value || 0 === $value ) && $trim_value ) {

			if ( is_array( $value ) ) {
				$sanitized_value = map_deep( wp_unslash( $value ), array( $this, 'sanitize_array_option' ) );
			} elseif ( strpos( $value, '<svg' ) !== false ) {
				// Prevent sanitizing value in order to save svg option. We already escaped svg with our function.
				$sanitized_value = $value;
			} else {
				$sanitized_value = sanitize_text_field( $value );
			}
		}

		return $sanitized_value;
	}

	public function enqueue_framework_meta_scripts() {
		// check if page is edit post page.
		if ( function_exists( 'get_current_screen' ) && get_current_screen()->base === 'post' ) {
			$this->enqueue_dashboard_framework_scripts();

			do_action( 'qode_framework_action_page_additional_scripts' );
		}
	}

	public function add_admin_body_classes( $classes ) {
		if ( function_exists( 'get_current_screen' ) && get_current_screen()->base === 'post' ) {
			$classes = $classes . ' qodef-framework-admin';
		}

		return $classes;
	}
}
