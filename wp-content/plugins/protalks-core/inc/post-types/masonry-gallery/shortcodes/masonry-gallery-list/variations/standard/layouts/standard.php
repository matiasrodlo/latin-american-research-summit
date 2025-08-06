<?php $item_classes = $this_shortcode->get_item_classes( $params ); ?>

<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/image', '', $params ); ?>
		<div class="qodef-e-content">
			<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/title', '', $params ); ?>
			<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/text', '', $params ); ?>
			<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/button', '', $params ); ?>
		</div>
	</div>
</div>
