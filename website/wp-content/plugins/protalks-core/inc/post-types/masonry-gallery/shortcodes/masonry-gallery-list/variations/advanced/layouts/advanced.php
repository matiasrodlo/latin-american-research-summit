<?php $item_classes = $this_shortcode->get_item_classes( $params ); ?>

<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/title', '', $params ); ?>
				<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/text', '', $params ); ?>
			</div>
			<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/info', '', $params ); ?>
		</div>
		<?php protalks_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/image', '', $params ); ?>
	</div>
</div>
