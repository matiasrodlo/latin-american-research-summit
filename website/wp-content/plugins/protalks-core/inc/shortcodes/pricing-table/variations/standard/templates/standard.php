<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-m-inner" <?php qode_framework_inline_style( $holder_styles ); ?>>
		<?php protalks_core_template_part( 'shortcodes/pricing-table', 'templates/parts/title', '', $params ); ?>
		<?php protalks_core_template_part( 'shortcodes/pricing-table', 'templates/parts/content', '', $params ); ?>
		<?php protalks_core_template_part( 'shortcodes/pricing-table', 'templates/parts/price', '', $params ); ?>
		<?php protalks_core_template_part( 'shortcodes/pricing-table', 'templates/parts/button', '', $params ); ?>
	</div>
</div>
