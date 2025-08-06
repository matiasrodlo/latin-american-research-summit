<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-e-holder-inner" <?php qode_framework_inline_style( $text_styles ); ?>>
		<?php if ( ! empty( $items ) ) : ?>
			<?php foreach ( $items as $key => $item ) : ?>
				<?php
				$item_styles         = $this_shortcode->get_item_styles( $item );
				$item['item_styles'] = $item_styles;

				if ( 'text' === $item['item_type'] ) {
					protalks_core_template_part( 'shortcodes/textual-projects-showcase', 'templates/parts/text', '', $item );
				}
				if ( 'image' === $item['item_type'] ) {
					protalks_core_template_part( 'shortcodes/textual-projects-showcase', 'templates/parts/image', '', $item );
				}
				if ( 'video' === $item['item_type'] ) {
					protalks_core_template_part( 'shortcodes/textual-projects-showcase', 'templates/parts/video', '', $item );
				}
				?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
