<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-date-time">
			<?php protalks_core_list_sc_template_part( 'post-types/events/shortcodes/events-list', 'post-info/date', '', $params ); ?>
			<?php protalks_core_list_sc_template_part( 'post-types/events/shortcodes/events-list', 'post-info/time', '', $params ); ?>
		</div>
		<div class="qodef-e-heading">
			<?php protalks_core_list_sc_template_part( 'post-types/events/shortcodes/events-list', 'post-info/title', '', $params ); ?>
			<?php protalks_core_list_sc_template_part( 'post-types/events/shortcodes/events-list', 'post-info/speaker', '', $params ); ?>
		</div>
		<?php protalks_core_list_sc_template_part( 'post-types/events/shortcodes/events-list', 'post-info/tickets-link', '', $params ); ?>
	</div>
</div>
