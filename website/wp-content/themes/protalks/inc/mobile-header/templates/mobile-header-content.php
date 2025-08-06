<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

// Include mobile logo.
protalks_template_part( 'mobile-header', 'templates/parts/mobile-logo' );

// Include mobile navigation opener.
protalks_template_part( 'mobile-header', 'templates/parts/mobile-navigation-opener' );

// Include mobile navigation.
protalks_template_part( 'mobile-header', 'templates/parts/mobile-navigation' );
