<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

get_header();

// Include content template.
protalks_template_part( 'content', 'templates/content', '404' );

get_footer();
