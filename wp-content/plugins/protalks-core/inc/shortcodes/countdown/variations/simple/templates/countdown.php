<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attrs( $data_attrs ); ?>>
	<span class="qodef-m-date">
		<?php if ( 'weeks' !== $format ) { ?>
			<span class="qodef-digit-wrapper qodef-weeks">
				<span class="qodef-digit">00</span>
				<span class="qodef-label"><?php esc_html_e( 'Weeks', 'protalks-core' ); ?></span>
			</span>
		<?php } ?>
		<span class="qodef-digit-wrapper qodef-days">
			<span class="qodef-digit">00</span>
			<span class="qodef-label"><?php esc_html_e( 'Days', 'protalks-core' ); ?></span>
		</span>
		<span class="qodef-digit-wrapper qodef-hours">
			<span class="qodef-digit">00</span>
			<span class="qodef-label"><?php esc_html_e( 'Hours', 'protalks-core' ); ?></span>
		</span>
		<span class="qodef-digit-wrapper qodef-minutes">
			<span class="qodef-digit">00</span>
			<span class="qodef-label"><?php esc_html_e( 'Minutes', 'protalks-core' ); ?></span>
		</span>
		<span class="qodef-digit-wrapper qodef-seconds">
			<span class="qodef-digit">00</span>
			<span class="qodef-label"><?php esc_html_e( 'Seconds', 'protalks-core' ); ?></span>
		</span>
	</span>
</div>
