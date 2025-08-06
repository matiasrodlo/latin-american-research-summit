<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( 'masonry' === $params ) :
	?>
	<div class="qodef-grid-masonry-sizer"></div>
<?php elseif ( 'masonry-product-list' === $params ): ?>
	<li class="qodef-grid-masonry-sizer"></li>
<?php endif; ?>
