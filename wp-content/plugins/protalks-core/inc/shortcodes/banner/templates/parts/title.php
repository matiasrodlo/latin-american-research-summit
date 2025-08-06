<?php if ( ! empty( $title ) ) : ?>
	<?php echo '<' . protalks_core_escape_title_tag( $title_tag ); ?> class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>>
		<?php echo esc_html( $title ); ?>
	<?php echo '</' . protalks_core_escape_title_tag( $title_tag ); ?>>
<?php endif; ?>
