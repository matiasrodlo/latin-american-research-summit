<?php if ( ! empty( $button_params ) && ! empty( $button_params['text'] ) && class_exists( 'ProTalksCore_Button_Shortcode' ) ) { ?>
	<div class="qodef-m-button">
		<?php echo ProTalksCore_Button_Shortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>
