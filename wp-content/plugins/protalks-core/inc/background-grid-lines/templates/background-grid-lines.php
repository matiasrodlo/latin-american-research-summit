<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<?php
	for ( $i = 0; $i < $number_of_lines; $i++ ) {
		$left_offset = 100 / ( $number_of_lines + 1 ) * ( $i + 1 );
		?>
		<div class="qodef-m-background-grid-line" style="left: <?php echo esc_attr( $left_offset ); ?>%"></div>
	<?php } ?>
</div>
