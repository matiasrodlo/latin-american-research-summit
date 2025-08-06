<?php

if ( 'custom-icon' === $icon_type && ! empty( $custom_icon ) ) {
	?>
	<span <?php qode_framework_inline_style( $image_styles ); ?>>
	<?php echo wp_get_attachment_image( $custom_icon, 'full' ); ?>
	</span>
	<?php
}
