<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 *
 * @var bool   $readonly If the input should be set to readonly mode.
 * @var string $type     The input type attribute.
 */

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! isset( $input_id ) ) {
	$input_id = 'qodef-quantity-id-' . wp_unique_id();
}

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'protalks' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'protalks' );

?>
	<div class="qodef-quantity-selector quantity">
		<?php
		/**
		 * Hook to output something before the quantity input field.
		 *
		 * @since 7.2.0
		 */
		do_action( 'woocommerce_before_quantity_input_field' );
		?>
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_html( $label ); ?></label>
		<span class="qodef-quantity-button qodef-quantity--minus"><?php echo esc_html__( '-', 'protalks' ); ?></span>
		<input type="<?php echo esc_attr( apply_filters( 'protalks_filter_woo_quantity_input_type', 'text' ) ); ?>"
			<?php echo esc_attr( $readonly ) ? 'readonly="readonly"' : ''; ?>
			   id="<?php echo esc_attr( $input_id ); ?>"
			   class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?> qodef-quantity-input"
			   name="<?php echo esc_attr( $input_name ); ?>"
			   value="<?php echo esc_attr( $input_value ); ?>"
			   aria-label="<?php esc_attr_e( 'Product quantity', 'protalks' ); ?>"
			   size="4"
			   data-min="<?php echo esc_attr( $min_value ); ?>"
			   data-max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			   data-step="<?php echo esc_attr( $step ); ?>"
			<?php if ( ! $readonly ) : ?>
				placeholder="<?php echo esc_attr( $placeholder ); ?>"
				inputmode="<?php echo esc_attr( $inputmode ); ?>"
				autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
			<?php endif; ?>
		/>
		<span class="qodef-quantity-button qodef-quantity--plus"><?php echo esc_html__( '+', 'protalks' ); ?></span>
		<?php
		/**
		 * Hook to output something after quantity input field
		 *
		 * @since 3.6.0
		 */
		do_action( 'woocommerce_after_quantity_input_field' );
		?>
	</div>
<?php
