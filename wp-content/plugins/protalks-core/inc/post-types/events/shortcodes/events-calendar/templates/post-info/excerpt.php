<?php
$excerpt = get_the_excerpt();

if ( ! isset( $excerpt_length ) || '' === $excerpt_length ) {
	$excerpt_length = protalks_get_blog_list_excerpt_length();
}

if ( ! empty( $excerpt ) && 0 !== intval( $excerpt_length ) ) {
	$new_excerpt = substr( $excerpt, 0, intval( $excerpt_length ) );
	?>
	<div itemprop="description" class="qodef-e-excerpt"><?php echo esc_html( wp_strip_all_tags( strip_shortcodes( $new_excerpt ) ) ); ?></div>
	<?php
}
