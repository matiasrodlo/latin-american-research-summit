<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) {
	// Hook to include page comments template.
	do_action( 'protalks_action_page_comments_template' );
}
