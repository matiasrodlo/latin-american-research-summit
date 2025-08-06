<?php
$date_format      = get_option( 'date_format' );
$event_start_date = get_post_meta( get_the_ID(), 'qodef_event_single_start_date', true );
$event_start_date = ! empty( $event_start_date ) ? date_i18n( $date_format, strtotime( $event_start_date ) ) : '';

if ( ! empty( $event_start_date ) ) {
	?>
	<span class="qodef-e-date">
		<?php echo esc_html( $event_start_date ); ?>
	</span>
<?php } ?>
