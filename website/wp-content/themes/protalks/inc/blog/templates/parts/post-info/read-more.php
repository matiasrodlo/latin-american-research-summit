<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! post_password_required() ) {
	?>
	<div class="qodef-e-read-more">
		<?php
		if ( protalks_post_has_read_more() ) {
			$button_params = array(
				'link'          => get_permalink() . '#more-' . get_the_ID(),
				'button_layout' => 'textual',
				'text'          => esc_html__( 'Read More', 'protalks' ),
			);
		} else {
			$button_params = array(
				'link'          => get_the_permalink(),
				'button_layout' => 'textual',
				'text'          => esc_html__( 'Read More', 'protalks' ),
			);
		}

		protalks_render_button_element( $button_params );
		?>
	</div>
<?php } ?>
