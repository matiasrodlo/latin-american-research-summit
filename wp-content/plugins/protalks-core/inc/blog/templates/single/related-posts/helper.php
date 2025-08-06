<?php

if ( ! function_exists( 'protalks_core_include_blog_single_related_posts_template' ) ) {
	/**
	 * Function which includes additional module on single posts page
	 */
	function protalks_core_include_blog_single_related_posts_template() {
		if ( is_single() ) {
			include_once PROTALKS_CORE_INC_PATH . '/blog/templates/single/related-posts/templates/related-posts.php';
		}
	}

	add_action( 'protalks_action_after_blog_post_item', 'protalks_core_include_blog_single_related_posts_template', 25 );  // permission 25 is set to define template position
}
