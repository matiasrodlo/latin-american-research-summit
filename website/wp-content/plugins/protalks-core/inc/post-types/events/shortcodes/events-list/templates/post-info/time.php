<?php
$event_time = get_post_meta( get_the_ID(), 'qodef_event_single_time', true );

if ( ! empty( $event_time ) ) {
	?>
	<span class="qodef-e-time">
		<?php echo esc_html( $event_time ); ?>
	</span>
<?php } ?>
