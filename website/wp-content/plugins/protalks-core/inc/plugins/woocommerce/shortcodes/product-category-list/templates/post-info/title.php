<?php
$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h2';
?>
<<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="woocommerce-loop-category__title" <?php qode_framework_inline_style( $this_shortcode->get_title_styles( $params ) ); ?>>
	<?php echo esc_html( $category_name ); ?>
</<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
