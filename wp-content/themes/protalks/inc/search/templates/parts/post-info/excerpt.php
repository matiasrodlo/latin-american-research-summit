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

	if ( ! empty( $excerpt ) ) {
		$excerpt_length = protalks_get_search_page_excerpt_length();
		$new_excerpt    = ( $excerpt_length > 0 ) ? substr( $excerpt, 0, $excerpt_length ) : $excerpt;
		?>
		<p itemprop="description" class="qodef-e-excerpt">
			<?php echo esc_html( wp_strip_all_tags( strip_shortcodes( $new_excerpt ) ) ); ?>
		</p>
	<?php }
} ?>
