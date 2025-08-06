<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-e-categories">
	<?php echo get_the_term_list( get_the_ID(), 'category' ); ?>
</div>
<div class="qodef-info-separator-end"></div>
