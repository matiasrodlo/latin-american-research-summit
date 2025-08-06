<button type="submit" <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $styles ); ?>>
	<span class="qodef-m-text"><?php echo esc_html( $text ); ?></span>
	<span class="qodef-m-arrow">
		<?php protalks_core_render_svg_icon( 'arrow-top-right' ); ?>
	</span>
</button>
