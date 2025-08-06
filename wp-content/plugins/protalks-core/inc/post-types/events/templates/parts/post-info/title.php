<?php
$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h2';
?>
<<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> itemprop="name" class="qodef-e-title">
	<?php
	$title          = get_the_title();
	$modified_title = protalks_get_modified_title( $title );
	echo wp_kses_post( $modified_title );
	?>
</<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
