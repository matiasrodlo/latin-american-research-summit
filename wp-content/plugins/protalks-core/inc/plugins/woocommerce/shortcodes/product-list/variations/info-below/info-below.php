<?php

if ( ! function_exists( 'protalks_core_add_product_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function protalks_core_add_product_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'protalks-core' );

		return $variations;
	}

	add_filter( 'protalks_core_filter_product_list_layouts', 'protalks_core_add_product_list_variation_info_below' );
}

if ( ! function_exists( 'protalks_core_register_shop_list_info_below_actions' ) ) {
	/**
	 * Function that override product item layout for current variation type
	 */
	function protalks_core_register_shop_list_info_below_actions() {

		// IMPORTANT - THIS CODE NEED TO COPY/PASTE ALSO INTO THEME FOLDER MAIN WOOCOMMERCE FILE - set_default_layout method.

		// Add additional tags around product list item.
		add_action( 'woocommerce_before_shop_loop_item', 'protalks_add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'protalks_add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around product list item image.
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_holder_end', 20 ); // permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add additional tags around product list item image.
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_image_holder', 6 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_media_image_holder_end', 14 ); // permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add additional tags around content inside product list item image.
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_additional_image_holder', 15 ); // permission 15 is set because woocommerce_template_loop_product_thumbnail hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_add_to_cart_holder', 15 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_add_to_cart_holder_end', 17 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'protalks_add_product_list_item_additional_image_holder_end', 17 ); // permission 25 is set because protalks_add_product_list_item_media_holder_end hook is added on 30

		// Add link at the end of woocommerce_before_shop_loop_item_title.
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 17 ); // permission 28 is set because protalks_add_product_list_item_media_holder_end is 30
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 18 ); // permission 29 is set because protalks_add_product_list_item_media_holder_end is 30

		// Add additional tags around product list item content.
		add_action( 'woocommerce_shop_loop_item_title', 'protalks_add_product_list_item_content_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'protalks_add_product_list_item_content_holder_end', 20 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Change add to cart position on product list.
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // permission 10 is default
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 16 ); // permission 20 is set because protalks_add_product_list_item_additional_image_holder hook is added on 15
		
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	}

	add_action( 'protalks_core_action_shop_list_item_layout_info-below', 'protalks_core_register_shop_list_info_below_actions' );
}
