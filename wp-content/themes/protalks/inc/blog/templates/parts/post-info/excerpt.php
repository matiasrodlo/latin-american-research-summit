<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( post_password_required() ) {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo get_the_password_form();
} else {
	$excerpt = get_the_excerpt();

	if ( ! isset( $excerpt_length ) || '' === $excerpt_length ) {
		$excerpt_length = protalks_get_blog_list_excerpt_length();
	}

	if ( ! empty( $excerpt ) && 0 !== intval( $excerpt_length ) ) {
		$new_excerpt = substr( $excerpt, 0, intval( $excerpt_length ) );
		?>
		<p itemprop="description" class="qodef-e-excerpt"><?php echo esc_html( wp_strip_all_tags( strip_shortcodes( $new_excerpt ) ) ); ?></p>
		<?php
	}
}
