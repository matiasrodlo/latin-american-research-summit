<?php
$event_start_date = get_post_meta( get_the_ID(), 'qodef_event_single_start_date', true );
$event_end_date   = get_post_meta( get_the_ID(), 'qodef_event_single_end_date', true );
$event_time       = get_post_meta( get_the_ID(), 'qodef_event_single_time', true );

$date_format = get_option('date_format');

$event_start_date = ! empty( $event_start_date ) ? date_i18n( $date_format, strtotime( $event_start_date ) ) : '';
$event_end_date = ! empty( $event_end_date ) ? date_i18n( $date_format, strtotime( $event_end_date ) ) : '';

if ( $event_start_date === $event_end_date || empty( $event_end_date ) ) {
	$event_date = $event_start_date;
} else {
	$event_date = $event_start_date . ' - ' . $event_end_date;
}
if ( ! empty( $event_date ) ) { ?>
	<div class="qodef-e-info-item qodef-info--date">
		<span class="qodef-e-info-content">
			<?php
			echo esc_html( $event_date );

			if ( ! empty( $event_time ) ) {
				echo esc_html__( ' at ', 'protalks-core' ) . esc_html( $event_time );
			}
			?>
		</span>
	</div>
<?php } ?>
