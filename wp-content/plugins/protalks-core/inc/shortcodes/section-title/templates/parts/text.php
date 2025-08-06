<?php if ( ! empty( $text ) ) { ?>
	<<?php echo protalks_core_escape_title_tag( $text_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>>
		<?php echo esc_html( $text ); ?>
	</<?php echo protalks_core_escape_title_tag( $text_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<?php } ?>
