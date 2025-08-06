<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

/**
 * Global templates hooks
 */

if ( ! function_exists( 'protalks_add_main_woo_page_template_holder' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function protalks_add_main_woo_page_template_holder() {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<main id="qodef-page-content" class="qodef-grid qodef-layout--template ' . esc_attr( protalks_get_page_grid_sidebar_classes() ) . ' ' . esc_attr( protalks_get_grid_gutter_classes() ) . '" ' . protalks_get_grid_gutter_styles() . ' role="main"><div class="qodef-grid-inner">';
	}
}

if ( ! function_exists( 'protalks_add_main_woo_page_template_holder_end' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function protalks_add_main_woo_page_template_holder_end() {
		echo '</div></main>';
	}
}

if ( ! function_exists( 'protalks_add_main_woo_page_holder' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function protalks_add_main_woo_page_holder() {
		$classes = array();

		// add class to single page.
		if ( protalks_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef-grid-item qodef-col--12';
		}

		// add class to pages with sidebar.
		if ( protalks_is_woo_page( 'archive' ) ) {
			$classes[] = 'qodef-grid-item';
			$classes[] = protalks_get_page_content_sidebar_classes();
		}

		$classes[] = protalks_get_woo_main_page_classes();

		echo '<div id="qodef-woo-page" class="' . esc_attr( implode( ' ', $classes ) ) . '">';
	}
}

if ( ! function_exists( 'protalks_add_main_woo_page_holder_end' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function protalks_add_main_woo_page_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_main_woo_page_sidebar_holder' ) ) {
	/**
	 * Function that render sidebar layout for main shop page
	 */
	function protalks_add_main_woo_page_sidebar_holder() {

		if ( ! protalks_is_woo_page( 'single' ) ) {
			// Include page content sidebar.
			protalks_template_part( 'sidebar', 'templates/sidebar' );
		}
	}
}

/**
 * Shop page templates hooks
 */

if ( ! function_exists( 'protalks_add_results_and_ordering_holder' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function protalks_add_results_and_ordering_holder() {
		echo '<div class="qodef-woo-results">';
	}
}

if ( ! function_exists( 'protalks_add_results_and_ordering_holder_end' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function protalks_add_results_and_ordering_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_holder' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function protalks_add_product_list_item_holder() {
		echo '<div class="qodef-e-inner">';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_holder_end' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function protalks_add_product_list_item_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_media_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function protalks_add_product_list_item_media_holder() {
		echo '<div class="qodef-e-media">';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_media_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function protalks_add_product_list_item_media_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_media_image_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function protalks_add_product_list_item_media_image_holder() {
		echo '<div class="qodef-e-media-image">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_media_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function protalks_add_product_list_item_media_image_holder_end() {
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_additional_image_holder' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function protalks_add_product_list_item_additional_image_holder() {
		echo '<div class="qodef-e-media-inner">';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_additional_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function protalks_add_product_list_item_additional_image_holder_end() {
		// Hook to include additional content inside product list item image.
		do_action( 'protalks_action_product_list_item_additional_hover_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_add_to_cart_holder' ) ) {
	/**
	 * Function that render additional content around add to cart button on main shop page
	 */
	function protalks_add_product_list_item_add_to_cart_holder() {
		echo '<div class="qodef-e-add-to-cart-holder">';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_add_to_cart_holder_end' ) ) {
	/**
	 * Function that render additional content around add to cart buttom on main shop page
	 */
	function protalks_add_product_list_item_add_to_cart_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_content_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function protalks_add_product_list_item_content_holder() {
		echo '<div class="qodef-e-content">';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_content_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function protalks_add_product_list_item_content_holder_end() {
		// Hook to include additional content inside product list item content.
		do_action( 'protalks_action_product_list_item_additional_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_top_and_info_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function protalks_add_product_list_item_top_and_info_holder() {
		echo '<div class="qodef-e-top-holder"><div class="qodef-e-info">';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_top_and_info_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function protalks_add_product_list_item_top_and_info_holder_end() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'protalks_add_product_list_item_categories' ) ) {
	/**
	 * Function that render product categories
	 */
	function protalks_add_product_list_item_categories() {
		$categories = wp_get_post_terms( get_the_ID(), 'product_cat' );

		if ( ! empty( $categories ) ) { ?>
			<?php echo get_the_term_list( get_the_ID(), 'product_cat', '', '<span class="qodef-info-separator-single"></span>' ); ?>
			<div class="qodef-info-separator-end"></div>
			<?php
		}
	}
}

/**
 * Product single page templates hooks
 */

if ( ! function_exists( 'protalks_add_product_single_content_holder' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function protalks_add_product_single_content_holder() {
		echo '<div class="qodef-woo-single-inner">';
	}
}

if ( ! function_exists( 'protalks_add_product_single_content_holder_end' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function protalks_add_product_single_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_add_product_single_image_holder' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function protalks_add_product_single_image_holder() {
		echo '<div class="qodef-woo-single-image">';
	}
}

if ( ! function_exists( 'protalks_add_product_single_image_holder_end' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function protalks_add_product_single_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_woo_product_render_social_share_html' ) ) {
	/**
	 * Function that render social share html
	 */
	function protalks_woo_product_render_social_share_html() {
		$social_share_enabled = 'yes' === protalks_get_post_value_through_levels( 'qodef_woo_enable_social_share' );
		$social_share_layout  = protalks_get_post_value_through_levels( 'qodef_social_share_layout' );

		if ( class_exists( 'ProTalksCore_Social_Share_Shortcode' ) && $social_share_enabled ) {
			$params = array(
				'title'  => esc_html__( 'Share:', 'protalks' ),
				'layout' => $social_share_layout,
			);

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo ProTalksCore_Social_Share_Shortcode::call_shortcode( $params );
		}
	}
}

if ( ! function_exists( 'protalks_woo_product_render_slider_html' ) ) {
	/**
	 * Function that render slider html
	 */
	function protalks_woo_product_render_slider_html( $params = array() ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo protalks_get_template_part( 'woocommerce', 'templates/parts/slider', '', $params );
	}
}

/**
 * Override default WooCommerce templates
 */

if ( ! function_exists( 'protalks_woo_disable_page_heading' ) ) {
	/**
	 * Function that disable heading template on main shop page
	 *
	 * @return bool
	 */
	function protalks_woo_disable_page_heading() {
		return false;
	}
}

if ( ! function_exists( 'protalks_add_product_list_holder' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function protalks_add_product_list_holder( $html ) {
		$classes        = array();
		$layout         = protalks_get_post_value_through_levels( 'qodef_product_list_item_layout' );
		$space          = protalks_get_post_value_through_levels( 'qodef_woo_product_list_columns_space' );
		$vertical_space = protalks_get_post_value_through_levels( 'qodef_woo_product_list_columns_vertical_space' );

		if ( ! empty( $layout ) ) {
			$classes[] = 'qodef-item-layout--' . $layout;
		}

		if ( ! empty( $space ) ) {
			$classes[] = 'qodef-gutter--' . $space;
		}

		if ( ! empty( $vertical_space ) ) {
			$classes[] = 'qodef-vertical-gutter--' . $vertical_space;
		}

		$styles = protalks_get_gutter_custom_styles( 'qodef_woo_product_list_columns_space_', 'qodef_woo_product_list_columns_vertical_space_', array(), true );

		return '<div class="qodef-woo-product-list ' . esc_attr( implode( ' ', $classes ) ) . '" ' . protalks_get_inline_style( $styles ) . '>' . $html;
	}
}

if ( ! function_exists( 'protalks_add_product_list_holder_end' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function protalks_add_product_list_holder_end( $html ) {
		return $html . '</div>';
	}
}

if ( ! function_exists( 'protalks_woo_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for main shop page
	 *
	 * @return int
	 */
	function protalks_woo_product_list_columns() {
		$option = protalks_get_post_value_through_levels( 'qodef_woo_product_list_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		} else {
			$columns = 3;
		}

		return $columns;
	}
}

if ( ! function_exists( 'protalks_woo_products_per_page' ) ) {
	/**
	 * Function that set number of items for main shop page
	 *
	 * @param int $products_per_page
	 *
	 * @return int
	 */
	function protalks_woo_products_per_page( $products_per_page ) {
		$option = protalks_get_post_value_through_levels( 'qodef_woo_product_list_products_per_page' );

		if ( ! empty( $option ) ) {
			$products_per_page = intval( $option );
		}

		return $products_per_page;
	}
}

if ( ! function_exists( 'protalks_woo_pagination_args' ) ) {
	/**
	 * Function that override pagination args on main shop page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function protalks_woo_pagination_args( $args ) {
		$args['prev_text']          = protalks_get_svg_icon( 'pagination-arrow-left' );
		$args['next_text']          = protalks_get_svg_icon( 'pagination-arrow-right' );
		$args['type']               = 'plain';
		$args['before_page_number'] = '0';

		return $args;
	}
}

if ( ! function_exists( 'protalks_add_single_product_classes' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 *
	 * @param array  $classes Default argument array
	 * @param string $class
	 * @param int    $post_id
	 *
	 * @return array
	 */
	function protalks_add_single_product_classes( $classes, $class = '', $post_id = 0 ) {
		if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
			return $classes;
		}

		$product = wc_get_product( $post_id );

		if ( $product ) {
			$new = get_post_meta( $post_id, 'qodef_show_new_sign', true );

			if ( 'yes' === $new ) {
				$classes[] = 'new';
			}
		}

		return $classes;
	}
}

if ( ! function_exists( 'protalks_add_sale_flash_on_product' ) ) {
	/**
	 * Function for adding on sale template for product
	 */
	function protalks_add_sale_flash_on_product() {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo protalks_woo_set_sale_flash();
	}
}

if ( ! function_exists( 'protalks_woo_set_sale_flash' ) ) {
	/**
	 * Function that override on sale template for product
	 *
	 * @return string which contains html content
	 */
	function protalks_woo_set_sale_flash() {
		$product = protalks_woo_get_global_product();

		if ( ! empty( $product ) && $product->is_on_sale() && $product->is_in_stock() ) {
			return protalks_woo_get_woocommerce_sale( $product );
		}

		return '';
	}
}

if ( ! function_exists( 'protalks_woo_get_woocommerce_sale' ) ) {
	/**
	 * Function that return sale mark label
	 *
	 * @param object $product
	 *
	 * @return string
	 */
	function protalks_woo_get_woocommerce_sale( $product ) {
		$enable_percent_mark = protalks_get_post_value_through_levels( 'qodef_woo_enable_percent_sign_value' );
		$price               = floatval( $product->get_regular_price() );
		$sale_price          = floatval( $product->get_sale_price() );

		if ( $price > 0 && 'yes' === $enable_percent_mark ) {
			$sale_label = '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			$sale_label = esc_html__( 'Sale', 'protalks' );
		}

		return '<span class="qodef-woo-product-mark qodef--on-sale">' . $sale_label . '</span>';
	}
}

if ( ! function_exists( 'protalks_add_out_of_stock_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function protalks_add_out_of_stock_mark_on_product() {
		$product = protalks_woo_get_global_product();

		if ( ! empty( $product ) && ! $product->is_in_stock() ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo protalks_get_out_of_stock_mark();
		}
	}
}

if ( ! function_exists( 'protalks_get_out_of_stock_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @return string
	 */
	function protalks_get_out_of_stock_mark() {
		return '<span class="qodef-woo-product-mark qodef--out-of-stock">' . esc_html__( 'Sold', 'protalks' ) . '</span>';
	}
}

if ( ! function_exists( 'protalks_add_new_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function protalks_add_new_mark_on_product() {
		$product = protalks_woo_get_global_product();

		if ( ! empty( $product ) && $product->get_id() !== '' ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo protalks_get_new_mark( $product->get_id() );
		}
	}
}

if ( ! function_exists( 'protalks_get_new_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @param int $product_id
	 *
	 * @return string
	 */
	function protalks_get_new_mark( $product_id ) {
		$option = get_post_meta( $product_id, 'qodef_show_new_sign', true );

		if ( 'yes' === $option ) {
			return '<span class="qodef-woo-product-mark qodef--new">' . esc_html__( 'New', 'protalks' ) . '</span>';
		}

		return false;
	}
}

if ( ! function_exists( 'protalks_woo_shop_loop_item_title' ) ) {
	/**
	 * Function that override product list item title template
	 */
	function protalks_woo_shop_loop_item_title() {
		$option    = protalks_get_post_value_through_levels( 'qodef_woo_product_list_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h5';

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<' . protalks_escape_title_tag( $title_tag ) . ' class="qodef-woo-product-title woocommerce-loop-product__title">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
		echo wp_kses_post( get_the_title() );
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</' . protalks_escape_title_tag( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'protalks_woo_template_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function protalks_woo_template_single_title() {
		$option    = protalks_get_post_value_through_levels( 'qodef_woo_single_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h1';

		$title_classes[] = 'qodef-woo-product-title';
		$title_classes[] = 'product_title';
		$title_classes[] = 'entry-title';
		$title_classes[] = ! empty( $option ) ? '' : 'qodef--default-title';
		$title_classes   = implode( ' ', $title_classes );

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<' . protalks_escape_title_tag( $title_tag ) . ' class="' . esc_attr( $title_classes ) . '">' . wp_kses_post( get_the_title() ) . '</' . protalks_escape_title_tag( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'protalks_woo_single_thumbnail_images_columns' ) ) {
	/**
	 * Function that set number of columns for thumbnail images on single product page
	 *
	 * @param int $columns
	 *
	 * @return int
	 */
	function protalks_woo_single_thumbnail_images_columns( $columns ) {
		$option = protalks_get_post_value_through_levels( 'qodef_woo_single_thumbnail_images_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		}

		return $columns;
	}
}

if ( ! function_exists( 'protalks_woo_single_thumbnail_images_size' ) ) {
	/**
	 * Function that set thumbnail images size on single product page
	 *
	 * @return string
	 */
	function protalks_woo_single_thumbnail_images_size() {
		return apply_filters( 'protalks_filter_woo_single_thumbnail_size', 'woocommerce_thumbnail' );
	}
}

if ( ! function_exists( 'protalks_woo_single_thumbnail_images_wrapper' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function protalks_woo_single_thumbnail_images_wrapper() {
		echo '<div class="qodef-woo-thumbnails-wrapper">';
	}
}

if ( ! function_exists( 'protalks_woo_single_thumbnail_images_wrapper_end' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function protalks_woo_single_thumbnail_images_wrapper_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'protalks_woo_single_related_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for related product list on single product page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function protalks_woo_single_related_product_list_columns( $args ) {
		$option = protalks_get_post_value_through_levels( 'qodef_woo_single_related_product_list_columns' );

		if ( ! empty( $option ) ) {
			$args['posts_per_page'] = intval( $option );
			$args['columns']        = intval( $option );
		}

		return $args;
	}
}

if ( ! function_exists( 'protalks_woo_upsell_cross_sell_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for upsell and cross-sell product list
	 *
	 * @param int $columns
	 *
	 * @return int
	 */
	function protalks_woo_upsell_cross_sell_product_list_columns( $columns ) {
		$option = protalks_get_post_value_through_levels( 'qodef_woo_upsell_cross_sell_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		}

		return $columns;
	}
}

if ( ! function_exists( 'protalks_woo_product_get_rating_html' ) ) {
	/**
	 * Function that override ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float  $rating
	 *
	 * @return string
	 */
	function protalks_woo_product_get_rating_html( $html, $rating ) {
		if ( ! empty( $rating ) ) {
			$html  = '<div class="qodef-woo-ratings qodef-m"><div class="qodef-m-inner">';
			$html .= '<div class="qodef-m-star qodef--initial">';
			for ( $i = 0; $i < 5; $i++ ) {
				$html .= protalks_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '<div class="qodef-m-star qodef--active" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
			for ( $i = 0; $i < 5; $i++ ) {
				$html .= protalks_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '</div></div>';
		}

		return $html;
	}
}

if ( ! function_exists( 'protalks_woo_get_product_search_form' ) ) {
	/**
	 * Function that override product search widget form
	 *
	 * @return string which contains html content
	 */
	function protalks_woo_get_product_search_form() {
		return protalks_get_template_part( 'woocommerce', 'templates/product-searchform' );
	}
}

if ( ! function_exists( 'protalks_woo_get_content_widget_product' ) ) {
	/**
	 * Function that override product content widget
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function protalks_woo_get_content_widget_product( $located, $template_name ) {

		if ( 'content-widget-product.php' === $template_name && file_exists( PROTALKS_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php' ) ) {
			$located = PROTALKS_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'protalks_woo_get_quantity_input' ) ) {
	/**
	 * Function that override quantity input
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function protalks_woo_get_quantity_input( $located, $template_name ) {

		if ( 'global/quantity-input.php' === $template_name && file_exists( PROTALKS_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php' ) ) {
			$located = PROTALKS_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'protalks_woo_get_single_product_meta' ) ) {
	/**
	 * Function that override single product meta
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function protalks_woo_get_single_product_meta( $located, $template_name ) {

		if ( 'single-product/meta.php' === $template_name && file_exists( PROTALKS_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php' ) ) {
			$located = PROTALKS_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'protalks_woo_add_search_widget_icon' ) ) {
	/**
	 * Function that add search icon into global js object
	 *
	 * @param $array
	 *
	 * @return mixed
	 */
	function protalks_woo_add_search_widget_icon( $array ) {
		$array['iconSearch'] = protalks_get_svg_icon( 'search' );

		return $array;
	}

	add_filter( 'protalks_filter_localize_main_js', 'protalks_woo_add_search_widget_icon' );
}

if ( ! function_exists( 'protalks_woo_single_clickable_thumbnails_add_images' ) ) {
	/**
	 * Add main image thumb in thumbnails wrapper if clickable thumbnails behavior is enabled
	 *
	 * @return void
	 */
	function protalks_woo_single_clickable_thumbnails_add_images() {
		if ( 'clickable-thumbnails' === protalks_get_post_value_through_levels( 'qodef_woo_single_image_behavior' ) && function_exists( 'wc_get_gallery_image_html' ) ) {
			$product     = protalks_woo_get_global_product();
			$gallery_ids = $product->get_gallery_image_ids();

			if ( $gallery_ids && $product->get_image_id() ) {
				foreach ( $gallery_ids as $gallery_id ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo wc_get_gallery_image_html( $gallery_id, true );
				}
			}
		}
	}

	// qodef-woo-thumbnails-wrapper is hooked on 5.
	add_action( 'woocommerce_product_thumbnails', 'protalks_woo_single_clickable_thumbnails_add_images', 4 );
}

if ( ! function_exists( 'protalks_woo_single_clickable_thumbnails_add_thumbnail' ) ) {
	/**
	 * Add main image thumb in thumbnails wrapper if clickable thumbnails behavior is enabled
	 *
	 * @return void
	 */
	function protalks_woo_single_clickable_thumbnails_add_thumbnail() {
		if ( 'clickable-thumbnails' === protalks_get_post_value_through_levels( 'qodef_woo_single_image_behavior' ) && function_exists( 'wc_get_gallery_image_html' ) ) {
			$product  = protalks_woo_get_global_product();
			$image_id = $product->get_image_id();

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $image_id ), $image_id );
		}
	}

	// qodef-woo-thumbnails-wrapper is hooked on 5.
	add_action( 'woocommerce_product_thumbnails', 'protalks_woo_single_clickable_thumbnails_add_thumbnail', 6 );
}
