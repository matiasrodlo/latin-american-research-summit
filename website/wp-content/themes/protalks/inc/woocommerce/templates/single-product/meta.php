<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$product = protalks_woo_get_global_product();
?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<span class="sku_wrapper">
			<span class="qodef-woo-meta-label"><?php esc_html_e( 'SKU:', 'protalks' ); ?></span>
			<span class="sku qodef-woo-meta-value">
				<?php
				$sku_value = $product->get_sku();

				echo esc_html( ! empty( $sku_value ) ? $sku_value : esc_html__( 'N/A', 'protalks' ) );
				?>
			</span>
		</span>
	<?php endif; ?>
	<?php
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in"><span class="qodef-woo-meta-label">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'protalks' ) . '</span><span class="qodef-woo-meta-value">', '</span></span>' );

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo wc_get_product_tag_list( $product->get_id(), '', '<span class="tagged_as"><span class="qodef-woo-meta-label">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'protalks' ) . '</span><span class="qodef-woo-meta-value">', '</span></span>' );

	if ( function_exists( 'wc_get_brands' ) ) {
		$terms       = get_the_terms( $product->get_id(), 'product_brand' );
		$brand_count = is_array( $terms ) ? count( $terms ) : 0;

		if ( ! empty( $brand_count ) ) {
			$taxonomy = get_taxonomy( 'product_brand' );
			$labels   = $taxonomy->labels;

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			/* translators: %s - Label name */
			echo wc_get_brands( $product->get_id(), ', ', ' <span class="posted_in"><span class="qodef-woo-meta-label">' . sprintf( _n( '%s: ', '%s: ', $brand_count, 'protalks' ), $labels->singular_name, $labels->name ) . '</span><span class="qodef-woo-meta-value">', '</span></span>' );
		}
	}

	do_action( 'woocommerce_product_meta_end' );
	?>
</div>
