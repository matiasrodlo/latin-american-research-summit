<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( comments_open() ) {
	?>
	<a itemprop="url" href="<?php comments_link(); ?>" class="qodef-e-info-comments-link">
		<?php comments_number( '0 ' . esc_html__( 'Comments', 'protalks' ), '1 ' . esc_html__( 'Comment', 'protalks' ), '% ' . esc_html__( 'Comments', 'protalks' ) ); ?>
	</a><div class="qodef-info-separator-end"></div>
<?php } ?>
