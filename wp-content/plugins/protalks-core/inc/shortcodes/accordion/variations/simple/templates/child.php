<<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-accordion-title">
	<span class="qodef-tab-title"><?php echo esc_html( $title ); ?></span>
	<span class="qodef-accordion-mark">
		<span class="qodef-icon--plus"><?php protalks_render_svg_icon( 'arrow-down' ); ?></span>
		<span class="qodef-icon--minus"><?php protalks_render_svg_icon( 'arrow-up' ); ?></span>
	</span>
</<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<div class="qodef-accordion-content">
	<div class="qodef-accordion-content-inner">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>
