<<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<span class="qodef-m-inner">
		<?php echo qode_framework_wp_kses_html( 'content', $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</span>
</<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
