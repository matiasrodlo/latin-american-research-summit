<li <?php wc_product_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="qodef-e-media">
				<?php protalks_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
				<div class="qodef-e-media-inner">
					<div class="qodef-e-add-to-cart-holder">
						<?php
						protalks_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' );
						?>
					</div>
					<?php
					// Hook to include additional content inside product list item image.
					do_action( 'protalks_core_action_product_list_item_additional_hover_content' );
					?>
				</div>
				<?php protalks_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
			</div>
		<?php } ?>
		<div class="qodef-e-content">
			<?php if ( isset( $enable_categories ) && 'yes' === $enable_categories ) { ?>
				<div class="qodef-e-top-holder">
					<div class="qodef-e-info">
						<?php
						// Include post category info.
						protalks_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/categories', '', $params );
						?>
					</div>
				</div>
			<?php }
			protalks_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params );
			if ( isset( $enable_rating ) && 'yes' === $enable_rating ) {
				protalks_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/rating', '', $params );
			}
			protalks_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params );

			// Hook to include additional content inside product list item content.
			do_action( 'protalks_core_action_product_list_item_additional_content' );
			?>
		</div>
	</div>
</li>
