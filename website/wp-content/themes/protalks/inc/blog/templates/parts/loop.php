<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

// Hook to include additional content before blog post item.
do_action( 'protalks_action_before_blog_post_item' );

if ( have_posts() ) {
	while ( have_posts() ) :
		the_post();

		// Include post item.
		if ( is_single() ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo apply_filters( 'protalks_filter_blog_single_template', protalks_get_template_part( 'blog', 'templates/parts/single/post', get_post_format() ) );
		} else {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo apply_filters( 'protalks_filter_blog_list_post_template', protalks_get_template_part( 'blog', 'templates/parts/list/post', get_post_format() ) );
		}
	endwhile;
} else {
	// Include global posts not found.
	protalks_template_part( 'content', 'templates/parts/posts-not-found' );
}

// Hook to include additional content after blog post item.
do_action( 'protalks_action_after_blog_post_item' );

wp_reset_postdata();
