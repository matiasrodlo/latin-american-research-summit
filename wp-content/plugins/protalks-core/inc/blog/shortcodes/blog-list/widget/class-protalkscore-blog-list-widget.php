<?php

if ( ! function_exists( 'protalks_core_add_blog_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function protalks_core_add_blog_list_widget( $widgets ) {
		$widgets[] = 'ProTalksCore_Blog_List_Widget';

		return $widgets;
	}

	add_filter( 'protalks_core_filter_register_widgets', 'protalks_core_add_blog_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ProTalksCore_Blog_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'protalks-core' ),
				)
			);
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'protalks_core_blog_list',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'protalks_core_blog_list' );
				$this->set_name( esc_html__( 'ProTalks Blog List', 'protalks-core' ) );
				$this->set_description( esc_html__( 'Display a list of blog posts', 'protalks-core' ) );
			}
		}

		public function render( $atts ) {
			$atts['is_widget_element'] = 'yes';

			echo ProTalksCore_Blog_List_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
