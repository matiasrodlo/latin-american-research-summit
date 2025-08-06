<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( is_active_sidebar( protalks_get_sidebar_name() ) ) {
	?>
	<aside id="qodef-page-sidebar" role="complementary">
		<?php dynamic_sidebar( protalks_get_sidebar_name() ); ?>
	</aside>
<?php } ?>
