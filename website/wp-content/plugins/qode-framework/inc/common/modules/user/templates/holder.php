<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

foreach ( $this_object->get_child_elements() as $key => $child ) {
	foreach ( $roles as $role ) {
		if ( in_array( $role, $child->get_scope(), true ) ) {
			$child->render();
			break;
		}
	}
}
