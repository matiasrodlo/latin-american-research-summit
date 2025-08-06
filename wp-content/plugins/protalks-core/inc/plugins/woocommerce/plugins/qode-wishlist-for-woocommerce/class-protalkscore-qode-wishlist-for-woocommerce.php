<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'ProTalksCore_Qode_Wishlist_For_WooCommerce' ) ) {
	class ProTalksCore_Qode_Wishlist_For_WooCommerce {
		private static $instance;

		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'init' ), 20 );
		}

		/**
		 * @return ProTalksCore_Qode_Wishlist_For_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function init() {
			if ( qode_framework_is_installed( 'qode-wishlist' ) ) {
				// Set default values for plugin options
				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_behavior_default_value', array( $this, 'set_default_add_to_wishlist_behavior' ) );

				// Set default button loop options
				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_loop_type_default_value', array( $this, 'set_default_button_loop_type' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_button_loop_position_default_value', array( $this, 'set_default_button_loop_position' ) );

				// Set default button single options
				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_type_default_value', array( $this, 'set_default_button_single_type' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_button_single_position_default_value', array( $this, 'set_default_button_single_position' ) );

				// Set svg icons
				add_filter( 'qode_wishlist_for_woocommerce_filter_svg_icon', array( $this, 'set_svg_icons' ), 10, 2 );

				// Set button loop position
				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_button_loop_position', array( $this, 'set_button_loop_position' ), 10, 3 );

				// Set default wishlist table options
				add_filter( 'qode_wishlist_for_woocommerce_filter_enable_share_default_value', array( $this, 'set_default_table_share' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_show_table_title_default_value', array( $this, 'set_default_table_show_title' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_available_table_items_default_values', array( $this, 'set_default_table_items' ) );
			}
		}

		public function set_default_add_to_wishlist_behavior() {
			return 'view';
		}

		public function set_default_button_loop_type() {
			return 'icon';
		}

		public function set_default_button_loop_position() {
			return 'shortcode';
		}

		public function set_default_button_single_type() {
			return 'icon-with-text';
		}

		public function set_default_button_single_position() {
			return 'after-add-to-cart';
		}

		public function set_svg_icons( $html, $name ) {
			// if ( 'heart' === $name || 'heart-o' === $name ) {
			// 	$html = protalks_core_get_svg_icon( 'heart' );
			// }

			if ( 'close' === $name ) {
				$html = protalks_core_get_svg_icon( 'close' );
			}

			return $html;
		}

		public function set_button_loop_position( $button_position_map, $button_position, $is_block_template ) {
			if ( 'shortcode' === $button_position && ! $is_block_template ) {
				$button_position_map[ $button_position ] = array(
					'hook'     => array(
						'protalks_action_product_list_item_additional_hover_content', // theme templates
						'protalks_core_action_product_list_item_additional_hover_content', // core templates
					),
					'priority' => array(
						9,
						9,
					),
				);
			}

			return $button_position_map;
		}

		public function set_default_table_show_title() {
			return 'no';
		}

		public function set_default_table_share() {
			return 'no';
		}

		public function set_default_table_items() {
			return array(
				'price',
				'stock-status',
				'add-to-cart',
				'remove',
			);
		}
	}

	ProTalksCore_Qode_Wishlist_For_WooCommerce::get_instance();
}
