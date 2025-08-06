<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-grid-item <?php echo esc_attr( protalks_get_page_content_sidebar_classes() ); ?>">
	<div class="qodef-search qodef-m">
		<?php
		// Include search form.
		protalks_template_part( 'search', 'templates/parts/search-form' );

		// Include posts loop.
		protalks_template_part( 'search', 'templates/parts/loop' );

		// Include pagination.
		protalks_template_part( 'pagination', 'templates/pagination-wp' );
		?>
	</div>
</div>
