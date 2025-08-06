<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attrs( $data_attrs ); ?>>
	<div class="qodef-m-inner">
		<div class="qodef-m-canvas">
			<?php
			if ( 'custom' === $layout && ! empty( $custom_shape ) ) {
				echo qode_framework_wp_kses_html( 'html', rawurldecode( base64_decode( $custom_shape ) ) );
			}
			?>
		</div>
		<?php if ( ! empty( $title ) ) { ?>
			<<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>><?php echo qode_framework_wp_kses_html( 'content', $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php } ?>
	</div>
</div>
