<?php
/*
Template Name: Timetable Event
*/

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

get_header();

// Include event content template.
if ( protalks_is_installed( 'core' ) ) {
	protalks_core_template_part( 'plugins/timetable', 'templates/content' );
}

get_footer();
