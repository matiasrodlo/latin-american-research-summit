<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<?php protalks_core_template_part( 'shortcodes/banner', 'templates/parts/image', '', $params ); ?>
	<div class="qodef-m-content">
		<div class="qodef-m-content-inner">
			<?php protalks_core_template_part( 'shortcodes/banner', 'templates/parts/title', '', $params ); ?>
			<?php protalks_core_template_part( 'shortcodes/banner', 'templates/parts/text', '', $params ); ?>
		</div>
	</div>
	<?php protalks_core_template_part( 'shortcodes/banner', 'templates/parts/link', '', $params ); ?>
</div>
