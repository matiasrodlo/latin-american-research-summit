<?php if ( ! empty( $text_field ) ) : ?>
	<?php echo '<' . protalks_core_escape_title_tag( $text_tag ); ?> class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>>
		<?php echo wp_kses_post( $text_field ); ?>
	<?php echo '</' . protalks_core_escape_title_tag( $text_tag ); ?>>
<?php endif; ?>
