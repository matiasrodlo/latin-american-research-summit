<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Protalks_WooCommerce' ) ) {
	/**
	 * WooCommerce theme class
	 */
	class Protalks_WooCommerce {
		private static $instance;

		public function __construct() {

			if ( protalks_is_installed( 'woocommerce' ) ) {
				// Include files.
				$this->include_files();

				// Init.
				add_action( 'before_woocommerce_init', array( $this, 'init' ) );

				// Check the default WooCommerce page and replace Gutenberg blocks inside content if existed.
				add_action( 'admin_init', array( $this, 'check_woo_pages_content' ) );
				add_action( 'template_redirect', array( $this, 'render_block_template' ) );
			}
		}

		/**
		 * Instance of module class
		 *
		 * @return Protalks_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function include_files() {
			// Include helper functions.
			// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			include_once PROTALKS_INC_ROOT_DIR . '/woocommerce/helper.php';

			// Include template helper functions.
			// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			include_once PROTALKS_INC_ROOT_DIR . '/woocommerce/template-functions.php';
		}

		public function init() {
			// Adds theme supports.
			add_theme_support( 'woocommerce' );

			// Disable default WooCommerce style.
			$wc_version = get_option( 'woocommerce_version' );

			if ( version_compare( $wc_version, '6.9.0', '<' ) ) {
				// Old version.
				add_filter( 'woocommerce_enqueue_styles', '__return_false' );
			} else {
				// New version.
				add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
			}

			// Enqueue 3rd party plugins script.
			add_action( 'protalks_action_before_main_js', array( $this, 'enqueue_assets' ) );

			// Unset default WooCommerce templates modules.
			$this->unset_templates_modules();

			// Add new WooCommerce templates.
			$this->add_templates();

			// Change default WooCommerce templates position.
			$this->change_templates_position();

			// Override default WooCommerce templates.
			$this->override_templates();

			// Set default WooCommerce product layout.
			$this->set_default_layout();
		}

		public function enqueue_assets() {
			// Enqueue plugin's 3rd party scripts (select2 is registered inside WooCommerce plugin).
			wp_enqueue_script( 'select2' );
		}

		public function unset_templates_modules() {
			// Remove main shop holder.
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );

			// Remove breadcrumbs.
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

			// Remove sidebar.
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

			// Remove product link on list.
			remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		}

		public function add_templates() {
			/**
			 * Global templates hooks
			 */

			// Add grid template holder around shop.
			// permission 5 is set because protalks_add_main_woo_page_holder hook is added on 10.
			add_action( 'woocommerce_before_main_content', 'protalks_add_main_woo_page_template_holder', 5 );
			// permission 20 is set because protalks_add_main_woo_page_holder_end hook is added on 10.
			add_action( 'woocommerce_after_main_content', 'protalks_add_main_woo_page_template_holder_end', 20 );

			// Add main shop holder.
			add_action( 'woocommerce_before_main_content', 'protalks_add_main_woo_page_holder' );
			add_action( 'woocommerce_after_main_content', 'protalks_add_main_woo_page_holder_end' );
			// permission 5 is set just to holder be at the first place.
			add_action( 'woocommerce_before_cart', 'protalks_add_main_woo_page_holder', 5 );
			// permission 20 is set just to holder be at the last place.
			add_action( 'woocommerce_after_cart', 'protalks_add_main_woo_page_holder_end', 20 );
			// permission 5 is set just to holder be at the first place.
			add_action( 'woocommerce_before_checkout_form', 'protalks_add_main_woo_page_holder', 5 );
			// permission 20 is set just to holder be at the last place.
			add_action( 'woocommerce_after_checkout_form', 'protalks_add_main_woo_page_holder_end', 20 );

			// Add additional tags around results and ordering.
			// permission 5 is set because wc_print_notices hook is added on 10.
			add_action( 'woocommerce_before_shop_loop', 'protalks_add_results_and_ordering_holder', 15 );
			// permission 40 is set because woocommerce_catalog_ordering hook is added on 30.
			add_action( 'woocommerce_before_shop_loop', 'protalks_add_results_and_ordering_holder_end', 40 );

			// Add sidebar templates for shop page.
			// permission 15 is set because protalks_add_main_woo_page_holder_end hook is added on 10.
			add_action( 'woocommerce_after_main_content', 'protalks_add_main_woo_page_sidebar_holder', 15 );

			// Override On sale template.
			add_filter( 'woocommerce_sale_flash', 'protalks_woo_set_sale_flash' );
			// permission 10 is set because woocommerce_show_product_loop_sale_flash hook is added on 10.
			add_action( 'protalks_core_action_woo_product_mark_info', 'protalks_add_sale_flash_on_product' );

			// Add out of stock mark for product list item.
			// permission 10 is set because woocommerce_show_product_sale_flash hook is added on 10.
			add_filter( 'woocommerce_before_single_product_summary', 'protalks_add_out_of_stock_mark_on_product' );
			add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_out_of_stock_mark_on_product' );
			add_action( 'protalks_core_action_woo_product_mark_info', 'protalks_add_out_of_stock_mark_on_product' );

			// Add new mark for product list item.
			// permission 10 is set because woocommerce_show_product_sale_flash hook is added on 10.
			add_filter( 'woocommerce_before_single_product_summary', 'protalks_add_new_mark_on_product' );
			add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_new_mark_on_product' );
			add_action( 'protalks_core_action_woo_product_mark_info', 'protalks_add_new_mark_on_product' );

			/**
			 * Product single page templates hooks
			 */

			// Add additional tags around product image and content.
			// permission 2 is set because protalks_add_product_single_image_holder hook is added on 5.
			add_action( 'woocommerce_before_single_product_summary', 'protalks_add_product_single_content_holder', 2 );
			// permission 5 is set because woocommerce_output_product_data_tabs hook is added on 10.
			add_action( 'woocommerce_after_single_product_summary', 'protalks_add_product_single_content_holder_end', 5 );

			// Add additional tags around product list item image.
			// permission 5 is set because woocommerce_show_product_sale_flash hook is added on 10.
			add_action( 'woocommerce_before_single_product_summary', 'protalks_add_product_single_image_holder', 5 );
			// permission 30 is set because woocommerce_show_product_images hook is added on 20.
			add_action( 'woocommerce_before_single_product_summary', 'protalks_add_product_single_image_holder_end', 30 );

			// Add social share template for product single page.
			add_action( 'woocommerce_share', 'protalks_woo_product_render_social_share_html' );

			// add additional tags around product single thumbnails.
			add_action( 'woocommerce_product_thumbnails', 'protalks_woo_single_thumbnail_images_wrapper', 5 );
			add_action( 'woocommerce_product_thumbnails', 'protalks_woo_single_thumbnail_images_wrapper_end', 35 );
		}

		public function change_templates_position() {
			// Add link inside protalks_woo_shop_loop_item_title.
			add_action( 'qodef_woo_product_list_title_tag_link_open', 'woocommerce_template_loop_product_link_open' );
			add_action( 'qodef_woo_product_list_title_tag_link_close', 'woocommerce_template_loop_product_link_close' );
		}

		public function override_templates() {

			// Disable page heading.
			add_filter( 'woocommerce_show_page_title', 'protalks_woo_disable_page_heading' );

			// Override product list holder.
			add_filter( 'woocommerce_product_loop_start', 'protalks_add_product_list_holder' );
			add_filter( 'woocommerce_product_loop_end', 'protalks_add_product_list_holder_end' );

			// Override number of columns for main shop page.
			add_filter( 'loop_shop_columns', 'protalks_woo_product_list_columns' );

			// Override number of products per page.
			add_filter( 'loop_shop_per_page', 'protalks_woo_products_per_page' );

			// Override list pagination args.
			add_filter( 'woocommerce_pagination_args', 'protalks_woo_pagination_args' );

			// Override reviews pagination args.
			add_filter( 'woocommerce_comment_pagination_args', 'protalks_woo_pagination_args' );

			// Override product title.
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
			add_action( 'woocommerce_shop_loop_item_title', 'protalks_woo_shop_loop_item_title' );

			// Add product classes.
			add_filter( 'post_class', 'protalks_add_single_product_classes', 10, 3 );

			// Override product title.
			// permission 5 is default.
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			add_action( 'woocommerce_single_product_summary', 'protalks_woo_template_single_title', 5 );

			// Override number of thumbnails for single product.
			add_filter( 'woocommerce_product_thumbnails_columns', 'protalks_woo_single_thumbnail_images_columns' );

			// Override thumbnails size for single product.
			add_filter( 'woocommerce_gallery_thumbnail_size', 'protalks_woo_single_thumbnail_images_size' );

			// Override related products args.
			add_filter( 'woocommerce_output_related_products_args', 'protalks_woo_single_related_product_list_columns' );

			// Override rating template.
			add_filter( 'woocommerce_product_get_rating_html', 'protalks_woo_product_get_rating_html', 10, 2 );

			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 9 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

			// Override product search form template.
			add_filter( 'get_product_search_form', 'protalks_woo_get_product_search_form' );

			// Override product content widget template.
			add_filter( 'wc_get_template', 'protalks_woo_get_content_widget_product', 10, 2 );

			// Override quantity input template.
			add_filter( 'wc_get_template', 'protalks_woo_get_quantity_input', 10, 2 );

			// Override single product meta template.
			add_filter( 'wc_get_template', 'protalks_woo_get_single_product_meta', 10, 2 );

			// Override upsell and cross-sell products columns.
			add_filter( 'woocommerce_upsells_columns', 'protalks_woo_upsell_cross_sell_product_list_columns' );
			add_filter( 'woocommerce_cross_sells_columns', 'protalks_woo_upsell_cross_sell_product_list_columns' );
		}

		public function set_default_layout() {

			// This code is copied from core plugin - product list shortcode - info below variation.
			if ( ! protalks_is_installed( 'core' ) ) {

				// Add additional tags around product list item.
				// permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10.
				add_action( 'woocommerce_before_shop_loop_item', 'protalks_add_product_list_item_holder', 5 );
				// permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10.
				add_action( 'woocommerce_after_shop_loop_item', 'protalks_add_product_list_item_holder_end', 30 );

				// Add additional tags around product list item image.
				// permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10.
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_holder', 5 );
				// permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10.
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_holder_end', 20 );

				// Add additional tags around product list item image.
				// permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10.
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_image_holder', 6 );
				// permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10.
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_image_holder_end', 14 );

				// Add additional tags around content inside product list item image.
				// permission 15 is set because woocommerce_template_loop_product_thumbnail hook is added on 10.
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_additional_image_holder', 15 );
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_add_to_cart_holder', 15 );
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_add_to_cart_holder_end', 17 );
				add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_additional_image_holder_end', 17 );

				// Add link at the end of woocommerce_before_shop_loop_item_title.
				// permission 28 is set because protalks_add_product_list_item_media_holder_end is 30.
				add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 17 );
				// permission 29 is set because protalks_add_product_list_item_media_holder_end is 30.
				add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 18 );

				// Add additional tags around product list item content.
				// permission 5 is set because woocommerce_template_loop_product_title hook is added on 10.
				add_action( 'woocommerce_shop_loop_item_title', 'protalks_add_product_list_item_content_holder', 5 );
				// permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10.
				add_action( 'woocommerce_after_shop_loop_item', 'protalks_add_product_list_item_content_holder_end', 20 );

				// Change add to cart position on product list.
				// permission 10 is default.
				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
				// permission 20 is set because protalks_add_product_list_item_additional_image_holder hook is added on 15.
				add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 16 );

				remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			}
		}

		public function check_woo_pages_content() {
			$is_block_theme = wp_is_block_theme();
			$is_updated     = get_transient( 'protalks_woo_pages_block_content_updated' );

			if ( ! $is_block_theme && empty( $is_updated ) ) {
				$cart_page_id     = get_option( 'woocommerce_cart_page_id' );
				$checkout_page_id = get_option( 'woocommerce_checkout_page_id' );
				$posts_to_update  = array();

				if ( ! empty( $cart_page_id ) ) {
					$posts_to_update['cart'] = $cart_page_id;
				}

				if ( ! empty( $checkout_page_id ) ) {
					$posts_to_update['checkout'] = $checkout_page_id;
				}

				if ( ! empty( $posts_to_update ) ) {
					foreach ( $posts_to_update as $post_key => $post_id ) {
						$post_content = get_the_content( null, false, $post_id );

						if ( ! empty( $post_content ) && strpos( $post_content, 'wc-block' ) !== false ) {
							// Update the post into the database.
							wp_update_post(
								array(
									'ID'           => $post_id,
									'post_content' => '<!-- wp:shortcode -->[woocommerce_' . esc_attr( $post_key ) . ']<!-- /wp:shortcode -->',
								)
							);

							set_transient( 'protalks_woo_pages_block_content_updated', true );
						}
					}
				}
			}
		}

		public function render_block_template() {

			if (
				is_singular( 'product' ) ||
				( is_product_taxonomy() && is_tax( 'product_cat' ) ) ||
				( is_product_taxonomy() && is_tax( 'product_tag' ) ) ||
				( is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) ) ||
				( is_post_type_archive( 'product' ) && is_search() ) ||
				is_cart() ||
				is_checkout()
			) {
				add_filter( 'woocommerce_has_block_template', '__return_false', 5 );
			}
		}
	}

	Protalks_WooCommerce::get_instance();
}
