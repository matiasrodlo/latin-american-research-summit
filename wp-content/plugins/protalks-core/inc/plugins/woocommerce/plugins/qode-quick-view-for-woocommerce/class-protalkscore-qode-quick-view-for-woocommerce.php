<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'ProTalksCore_Qode_Quick_View_For_WooCommerce' ) ) {
	class ProTalksCore_Qode_Quick_View_For_WooCommerce {
		private static $instance;

		public function __construct() {
			add_action( 'init', array( $this, 'init' ), 20 );
		}

		/**
		 * @return ProTalksCore_Qode_Quick_View_For_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function init() {
			if ( qode_framework_is_installed( 'qode-quick-view' ) ) {
				// Set default button loop options
				add_filter( 'qode_quick_view_for_woocommerce_filter_button_loop_position_default_value', array( $this, 'set_default_button_loop_position' ) );

				// Set svg icons
				add_filter( 'qode_quick_view_for_woocommerce_filter_svg_icon', array( $this, 'set_svg_icons' ), 10, 2 );

				// Set button loop position
				add_filter( 'qode_quick_view_for_woocommerce_filter_quick_view_button_loop_position', array( $this, 'set_button_loop_position' ), 10, 3 );

				// Modify popup templates
				$this->modify_popup_templates();
			}
		}

		public function set_default_button_loop_position() {
			return 'shortcode';
		}

		public function set_svg_icons( $html, $name ) {
			// if ( 'quick-view' === $name ) {
			// 	$html = protalks_core_get_svg_icon( 'eye' );
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

		public function modify_popup_templates() {
			// Override on sale template
			add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_sale_flash_enabled', '__return_false' );
			add_action( 'qode_quick_view_for_woocommerce_action_product_image', 'protalks_add_sale_flash_on_product' );

			// Add out of stock mark for product list item
			add_action( 'qode_quick_view_for_woocommerce_action_product_image', 'protalks_add_out_of_stock_mark_on_product' );

			// Add new mark for product list item
			add_action( 'qode_quick_view_for_woocommerce_action_product_image', 'protalks_add_new_mark_on_product' );

			// Add new mark for product list item
			add_action( 'qode_quick_view_for_woocommerce_action_product_image', 'protalks_add_new_mark_on_product', 11 );

			// Override product title
			add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_title_enabled', '__return_false' );
			add_action( 'qode_quick_view_for_woocommerce_action_product_summary', 'protalks_core_woo_set_qode_quick_view_single_title', 5 );

			// Change star rating position
			add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_rating_enabled', '__return_false' );
			add_action( 'qode_quick_view_for_woocommerce_action_product_summary', 'woocommerce_template_single_rating', 9 );

			// Remove meta fields
			add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_meta_enabled', '__return_false' );
		}
	}

	ProTalksCore_Qode_Quick_View_For_WooCommerce::get_instance();
}
