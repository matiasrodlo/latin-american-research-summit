<?php
$event_start_date = get_post_meta( get_the_ID(), 'qodef_event_single_start_date', true );

$date_format = get_option('date_format');

$event_date = ! empty( $event_start_date ) ? date_i18n( $date_format, strtotime( $event_start_date ) ) : '';

if ( ! empty( $event_date ) ) { ?>
	<div class="qodef-e-date qodef-h2">
		<?php
		echo esc_html( $event_date );
		?>
	</div>
<?php } ?>
