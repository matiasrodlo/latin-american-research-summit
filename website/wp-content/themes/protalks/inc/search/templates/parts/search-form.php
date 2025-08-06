<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-e-search-heading">
	<h3 class="qodef-e-search-heading-title"><?php esc_html_e( 'New search:', 'protalks' ); ?></h3>
	<div class="qodef-e-search-heading-form">
		<?php get_search_form(); ?>
	</div>
	<p class="qodef-e-search-heading-label"><?php esc_html_e( 'If you are not happy with the results below please do another search', 'protalks' ); ?></p>
</div>
