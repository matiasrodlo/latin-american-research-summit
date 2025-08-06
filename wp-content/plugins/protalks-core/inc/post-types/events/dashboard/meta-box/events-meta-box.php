<?php

if ( ! function_exists( 'protalks_core_add_events_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_events_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'event-item' ),
				'type'  => 'meta',
				'slug'  => 'event-item',
				'title' => esc_html__( 'Event Item', 'protalks-core' ),
			)
		);

		if ( $page ) {

			/* General sections */

			$general_section = $page->add_section_element(
				array(
					'name'        => 'qodef_event_single_general_section',
					'title'       => esc_html__( 'General Settings', 'protalks-core' ),
					'description' => esc_html__( 'General information about event single', 'protalks-core' ),
				)
			);

			$general_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_event_single_tickets_status',
					'title'       => esc_html__( 'Tickets Status', 'protalks-core' ),
					'description' => esc_html__( 'Choose a tickets status for event single', 'protalks-core' ),
					'options'     => array(
						'available' => esc_html__( 'Available', 'protalks-core' ),
						'free'      => esc_html__( 'Free', 'protalks-core' ),
						'sold'      => esc_html__( 'Sold', 'protalks-core' ),
					),
				)
			);

			$general_section->add_field_element(
				array(
					'field_type'  => 'date',
					'name'        => 'qodef_event_single_start_date',
					'title'       => esc_html__( 'Event Start Date', 'protalks-core' ),
					'description' => esc_html__( 'Enter event date', 'protalks-core' ),
				)
			);

			$general_section->add_field_element(
				array(
					'field_type'  => 'date',
					'name'        => 'qodef_event_single_end_date',
					'title'       => esc_html__( 'Event End Date', 'protalks-core' ),
					'description' => esc_html__( 'Enter event date', 'protalks-core' ),
				)
			);

			$general_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_event_single_time',
					'title'       => esc_html__( 'Event Time', 'protalks-core' ),
					'description' => esc_html__( 'Enter the time in a HH:MM format. If you are using a 12 hour time format, please also enter AM or PM markers', 'protalks-core' ),
				)
			);

			$general_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_event_single_tickets_link',
					'title'       => esc_html__( 'Buy Tickets Link', 'protalks-core' ),
					'description' => esc_html__( 'Enter the external link where users can buy the tickets', 'protalks-core' ),
				)
			);

			$general_section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_event_single_tickets_link_text',
					'title'      => esc_html__( 'Tickets Link Text', 'protalks-core' ),
				)
			);

			$general_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_event_single_tickets_link_target',
					'title'      => esc_html__( 'Tickets Link Target', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'link_target' ),
				)
			);

			$team = qode_framework_get_cpt_items( 'team', array(), true );

			if ( is_array( $team ) && count( $team ) ) {
				$general_section->add_field_element(
					array(
						'field_type' => 'select',
						'name'       => 'qodef_event_single_speaker',
						'title'      => esc_html__( 'Event Speaker', 'protalks-core' ),
						'options'    => $team,
					)
				);
			}

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_events_single_meta_box_map', $page );
		}
	}

	add_action( 'protalks_core_action_default_meta_boxes_init', 'protalks_core_add_events_single_meta_box', 1 );
}
