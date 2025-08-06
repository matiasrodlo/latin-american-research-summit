<<?php echo protalks_core_escape_title_tag( $text_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<?php if ( ! empty( $link ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>
		<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qode_framework_wp_kses_html( 'content', $text );
		?>
	<?php if ( ! empty( $link ) ) : ?>
		</a>
	<?php endif; ?>
</<?php echo protalks_core_escape_title_tag( $text_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
