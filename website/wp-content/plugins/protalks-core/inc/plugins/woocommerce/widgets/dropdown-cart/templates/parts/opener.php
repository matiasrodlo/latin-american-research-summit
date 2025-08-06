<a itemprop="url" class="qodef-m-opener" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="qodef-m-opener-icon"><?php echo protalks_core_get_svg_icon( 'cart' ); ?></span>
	<span class="qodef-m-opener-text">
		<?php echo esc_html__('Cart', 'protalks-core')?><span class="qodef-m-opener-count">(<?php echo is_object( WC()->cart ) ? WC()->cart->cart_contents_count : 0; ?>)</span>
	</span>
</a>
