<?php

get_header();

$params                  = array();
$params['template_slug'] = 'shortcode';

// Include cpt content template.
protalks_core_template_part( 'post-types/events', 'templates/content', '', $params );

get_footer();
