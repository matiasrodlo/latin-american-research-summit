<?php
$event_time = get_post_meta( get_the_ID(), 'qodef_event_single_time', true );

if ( ! empty( $event_time ) ) { ?>
	<div class="qodef-e-info-item qodef-info--time">
		<?php
		echo esc_html( $event_time );
		?>
	</div>
<?php } ?>
