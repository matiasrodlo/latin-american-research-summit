<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( have_posts() ) {
	while ( have_posts() ) :
		the_post();

		// Hook to include additional content before search item.
		do_action( 'protalks_action_before_search_item' );

		// Include post item.
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo apply_filters( 'protalks_filter_search_item_template', protalks_get_template_part( 'search', 'templates/parts/post' ), get_the_ID() );

		// Hook to include additional content after search item.
		do_action( 'protalks_action_after_search_item' );

	endwhile;
} else {
	// Include global posts not found.
	protalks_template_part( 'content', 'templates/parts/posts-not-found' );
}

wp_reset_postdata();
