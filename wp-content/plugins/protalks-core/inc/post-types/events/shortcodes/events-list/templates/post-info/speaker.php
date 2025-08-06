<?php
$event_speaker = get_post_meta( get_the_ID(), 'qodef_event_single_speaker', true );

if ( ! empty( $event_speaker ) && has_post_thumbnail( $event_speaker ) ) {
	?>
	<span class="qodef-e-speaker-image">
		<?php echo get_the_post_thumbnail( $event_speaker, 'thumbnail' ); ?>
	</span>
<?php } ?>
