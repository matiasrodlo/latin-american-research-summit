<?php

if ( ! function_exists( 'protalks_core_add_section_title_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function protalks_core_add_section_title_shortcode( $shortcodes ) {
		$shortcodes[] = 'ProTalksCore_Section_Title_Shortcode';

		return $shortcodes;
	}

	add_filter( 'protalks_core_filter_register_shortcodes', 'protalks_core_add_section_title_shortcode' );
}

if ( class_exists( 'ProTalksCore_Shortcode' ) ) {
	class ProTalksCore_Section_Title_Shortcode extends ProTalksCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( PROTALKS_CORE_SHORTCODES_URL_PATH . '/section-title' );
			$this->set_base( 'protalks_core_section_title' );
			$this->set_name( esc_html__( 'Section Title', 'protalks-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds section title element', 'protalks-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'title',
					'title'         => esc_html__( 'Title', 'protalks-core' ),
					'default_value' => esc_html__( 'Title Text', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'subtitle',
					'title'         => esc_html__( 'Subtitle', 'protalks-core' ),
					'default_value' => ''
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'decoration_positions',
					'title'       => esc_html__( 'Highlighted Word Positions', 'protalks-core' ),
					'description' => esc_html__( 'Enter the positions of the words in the title you want to highlight. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to be highlighted, you would enter "1,3,4")', 'protalks-core' ),
					'group'       => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_break_positions',
					'title'       => esc_html__( 'Positions of Line Break', 'protalks-core' ),
					'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a line break, you would enter "1,3,4")', 'protalks-core' ),
					'group'       => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'disable_title_break_words',
					'title'         => esc_html__( 'Disable Title Line Break', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will disable title line breaks for screen size 1200 and lower', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h2',
					'group'         => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'protalks-core' ),
					'group'      => esc_html__( 'Title Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'subtitle_tag',
					'title'         => esc_html__( 'Subtitle Tag', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'title_tag', false, array(), array( 'span' => esc_attr__( 'Custom', 'protalks-core' ) ) ),
					'default_value' => 'span',
					'group'         => esc_html__( 'Subtitle Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'subtitle_color',
					'title'      => esc_html__( 'Subtitle Color', 'protalks-core' ),
					'group'      => esc_html__( 'Subtitle Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'subtitle_margin_bottom',
					'title'      => esc_html__( 'Subtitle Margin Bottom', 'protalks-core' ),
					'group'      => esc_html__( 'Subtitle Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link',
					'title'      => esc_html__( 'Title Custom Link', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'target',
					'title'         => esc_html__( 'Custom Link Target', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'textarea',
					'name'          => 'text',
					'title'         => esc_html__( 'Text', 'protalks-core' ),
					'default_value' => esc_html__( 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'text_tag',
					'title'         => esc_html__( 'Text Tag', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'title_tag', false, array(), array( 'span' => esc_attr__( 'Custom', 'protalks-core' ) ) ),
					'default_value' => 'p',
					'group'         => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'protalks-core' ),
					'group'      => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_margin_top',
					'title'      => esc_html__( 'Text Margin Top', 'protalks-core' ),
					'group'      => esc_html__( 'Text Style', 'protalks-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'content_alignment',
					'title'      => esc_html__( 'Content Alignment', 'protalks-core' ),
					'options'    => array(
						''       => esc_html__( 'Default', 'protalks-core' ),
						'left'   => esc_html__( 'Left', 'protalks-core' ),
						'center' => esc_html__( 'Center', 'protalks-core' ),
						'right'  => esc_html__( 'Right', 'protalks-core' ),
					),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['title']           = $this->get_modified_title( $atts );
			$atts['title_styles']    = $this->get_title_styles( $atts );
			$atts['subtitle_styles'] = $this->get_subtitle_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );

			return protalks_core_get_template_part( 'shortcodes/section-title', 'templates/section-title', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-section-title';
			$holder_classes[] = ! empty( $atts['content_alignment'] ) ? 'qodef-alignment--' . $atts['content_alignment'] : 'qodef-alignment--left';
			$holder_classes[] = 'yes' === $atts['disable_title_break_words'] ? 'qodef-title-break--disabled' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_modified_title( $atts ) {
			$title = $atts['title'];

			if ( ! empty( $title ) ) {
				$split_title = explode( ' ', $title );

				if ( ! empty( $atts['decoration_positions'] ) ) {
					$decoration_positions = explode( ',', str_replace( ' ', '', $atts['decoration_positions'] ) );

					foreach ( $decoration_positions as $position ) {
						$position = intval( $position );
						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$split_title[ $position - 1 ] = '<span class="qodef--highlighted">' . $split_title[ $position - 1 ] . '</span>';
						}
					}
				}

				if ( ! empty( $atts['line_break_positions'] ) ) {
					$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );

					foreach ( $line_break_positions as $position ) {
						$position = intval( $position );
						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . '<br />';
						}
					}
				}

				$title = implode( ' ', $split_title );
			}

			return $title;
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			return $styles;
		}

		private function get_subtitle_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['subtitle_color'] ) ) {
				$styles[] = 'color: ' . $atts['subtitle_color'];
			}

			if ( ! empty( $atts['subtitle_margin_bottom'] ) ) {
				if ( qode_framework_string_ends_with_space_units( $atts['subtitle_margin_bottom'] ) ) {
					$styles[] = 'margin-bottom: ' . $atts['subtitle_margin_bottom'];
				} else {
					$styles[] = 'margin-bottom: ' . intval( $atts['subtitle_margin_bottom'] ) . 'px';
				}
			}

			return $styles;
		}

		private function get_text_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['text_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}

			return $styles;
		}
	}
}
