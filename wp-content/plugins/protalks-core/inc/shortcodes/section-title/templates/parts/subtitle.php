<?php if ( ! empty( $subtitle ) ) { ?>
	<<?php echo protalks_core_escape_title_tag( $subtitle_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-m-subtitle" <?php qode_framework_inline_style( $subtitle_styles ); ?>>
		<?php echo esc_html( $subtitle ); ?>
	</<?php echo protalks_core_escape_title_tag( $subtitle_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<?php } ?>
