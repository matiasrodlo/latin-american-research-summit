<?php
if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) :
		$query_result->the_post();

		$event_start_date = get_post_meta( get_the_ID(), 'qodef_event_single_start_date', true );

		/*
		 * check if current date is same as event start date, if they are the same, we do not need date again
		 * if they are different we need to print out start tag for holder and date
		*/
		if ( $current_date !== $event_start_date ) {
			// if current_date is different then empty string, it means there was a opened date and now it needs to be closed.
			if ( '' !== $current_date ) {
				?>
				</div>
				<?php
			}
			?>
			<div <?php qode_framework_class_attribute( $item_classes ); ?>>
				<?php
				$current_date = $event_start_date;
				protalks_core_list_sc_template_part( 'post-types/events/shortcodes/events-calendar', 'post-info/date', '', $params );
		}

		protalks_core_list_sc_template_part( 'post-types/events/shortcodes/events-calendar', 'layouts/' . $layout, '', $params );
	endwhile; // End of the loop.
	?>
			</div>
	<?php
} else {
	// Include global posts not found.
	protalks_core_theme_template_part( 'content', 'templates/parts/posts-not-found' );
}

wp_reset_postdata();
