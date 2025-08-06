<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$tags = get_the_tags();

if ( $tags && ( ! isset( $show_tags ) || 'no' !== $show_tags ) ) { ?>
	<div class="qodef-e-tags">
		<?php the_tags( '', '' ); ?>
	</div>
	<div class="qodef-info-separator-end"></div>
<?php } ?>
