<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?> <?php qode_framework_inline_attr( $data_attr, 'data-options' ); ?>>
	<div class="qodef-grid-inner">
		<?php
		// Include items.
		protalks_core_template_part( 'post-types/events/shortcodes/events-calendar', 'templates/loop', '', $params );
		?>
	</div>
	<?php
	// Include global pagination from theme.
	protalks_core_theme_template_part( 'pagination', 'templates/pagination', $params['pagination_type'], $params );
	?>
</div>
