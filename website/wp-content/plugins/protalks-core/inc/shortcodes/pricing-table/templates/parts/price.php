<?php if ( ! empty( $price ) ) { ?>
	<div class="qodef-m-price" <?php qode_framework_inline_style( $price_general_styles ); ?>>
		<div class="qodef-m-price-wrapper">
			<?php if ( ! empty( $currency ) && isset( $currency_placement ) && 'before-price' === $currency_placement ) { ?>
				<span class="qodef-m-price-currency" <?php qode_framework_inline_style( $currency_styles ); ?>><?php echo esc_html( $currency ); ?></span>
			<?php } ?>
			<span class="qodef-m-price-value" <?php qode_framework_inline_style( $price_styles ); ?>><?php echo esc_html( $price ); ?></span>
			<?php if ( ! empty( $currency ) && isset( $currency_placement ) && 'after-price' === $currency_placement ) { ?>
				<span class="qodef-m-price-currency" <?php qode_framework_inline_style( $currency_styles ); ?>><?php echo esc_html( $currency ); ?></span>
			<?php } ?>
			<?php if ( ! empty( $price_label ) ) { ?>
				<span class="qodef-m-price-label" <?php qode_framework_inline_style( $price_label_styles ); ?>><?php echo esc_html( $price_label ); ?></span>
			<?php } ?>
		</div>
	</div>
<?php } ?>
