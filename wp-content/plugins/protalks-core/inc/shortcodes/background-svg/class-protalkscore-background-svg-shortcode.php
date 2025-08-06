<?php

if (! function_exists('protalks_core_add_background_svg_shortcode')) {
    /**
     * Function that add shortcode into shortcodes list for registration
     *
     * @param $shortcodes array
     *
     * @return array
     */
    function protalks_core_add_background_svg_shortcode($shortcodes)
    {
        $shortcodes[] = 'ProtalksCore_Background_Svg_Shortcode';

        return $shortcodes;
    }

    add_filter('protalks_core_filter_register_shortcodes', 'protalks_core_add_background_svg_shortcode');
}

if (class_exists('ProtalksCore_Shortcode')) {
    class ProtalksCore_Background_Svg_Shortcode extends ProtalksCore_Shortcode
    {

        public function __construct()
        {
            $this->set_layouts(apply_filters('protalks_core_filter_background_svg_layouts', array()));
            $this->set_extra_options(apply_filters('protalks_core_filter_call_to_action_extra_options', array()));

            parent::__construct();
        }

        public function map_shortcode()
        {
            $this->set_shortcode_path(PROTALKS_CORE_SHORTCODES_URL_PATH . '/background-svg');
            $this->set_base('protalks_core_background_svg');
            $this->set_name(esc_html__('Background SVG', 'protalks-core'));
            $this->set_description(esc_html__('Shortcode that adds background svg element', 'protalks-core'));
            $this->set_category(esc_html__('Mastreds Core', 'protalks-core'));
            $this->set_option(array(
                'field_type' => 'text',
                'name'       => 'custom_class',
                'title'      => esc_html__('Custom Class', 'protalks-core'),
            ));

            $options_map = protalks_core_get_variations_options_map($this->get_layouts());

            $this->set_scripts(
                array(
                    'jquery-magnific-popup' => array(
                        'registered' => true,
                    ),
                )
            );

            $this->set_option(array(
                'field_type'    => 'select',
                'name'          => 'layout',
                'title'         => esc_html__('Layout', 'protalks-core'),
                'options'       => $this->get_layouts(),
                'default_value' => $options_map['default_value'],
                'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
            ));
            $this->set_option(array(
                'field_type' => 'select',
                'name'       => 'enable_predefined',
                'title'      => esc_html__('Enable Predefined Svg', 'protalks-core'),
                'options'    => protalks_core_get_select_type_options_pool('yes_no', false),
            ));
            $this->set_option(array(
                'field_type' => 'textarea_html',
                'name'       => 'svg',
                'title'      => esc_html__('SVG code', 'protalks-core'),
                'dependency' => array(
                    'show' => array(
                        'enable_predefined' => array(
                            'values'        => 'no',
                            'default_value' => 'yes',
                        ),
                    ),
                ),
            ));
            $this->set_option(array(
                'field_type' => 'text',
                'name'       => 'width',
                'title'      => esc_html__('SVG Size (px or %)', 'protalks-core'),
            ));
            $this->set_option(array(
                'field_type'  => 'color',
                'name'        => 'svg_fill',
                'title'       => esc_html__('Fill Color', 'protalks-core'),
                'description' => esc_html__('This color will be set for base color for gradient if predefined svg selected', 'protalks-core'),
            ));
            $this->set_option(array(
                'field_type'  => 'color',
                'name'        => 'svg_fill_2',
                'title'       => esc_html__('Fill Color 2', 'protalks-core'),
                'description' => esc_html__('This color will be set for second color for gradient if predefined svg selected', 'protalks-core'),
                'dependency'  => array(
                    'hide' => array(
                        'enable_predefined' => array(
                            'values'        => 'no',
                            'default_value' => 'no',
                        ),
                    ),
                ),
            ));
            $this->set_option(array(
                'field_type' => 'select',
                'name'       => 'enable_animation',
                'title'      => esc_html__('Enable Animation', 'protalks-core'),
                'options'    => protalks_core_get_select_type_options_pool('yes_no', false),
                'dependency' => array(
                    'show' => array(
                        'enable_predefined' => array(
                            'values'        => 'yes',
                            'default_value' => 'no',
                        ),
                    ),
                ),
            ));
            $this->set_option(array(
                'field_type' => 'select',
                'name'       => 'enable_appear',
                'title'      => esc_html__('Enable Appear', 'protalks-core'),
                'options'    => protalks_core_get_select_type_options_pool('yes_no', false),
                'dependency' => array(
                    'hide' => array(
                        'enable_predefined' => array(
                            'values'        => 'yes',
                            'default_value' => 'no',
                        ),
                    ),
                ),
            ));
            $this->set_option(array(
                'field_type' => 'select',
                'name'       => 'animation_path',
                'title'      => esc_html__('Animation Path', 'protalks-core'),
                'options'    => array(
                    'path-1' => esc_html__('Path 1(To Left)', 'protalks-core'),
                    'path-2' => esc_html__('Path 2(To Right)', 'protalks-core'),
                    'path-3' => esc_html__('Path 3(To Right Short)', 'protalks-core'),
                ),
                'dependency' => array(
                    'hide' => array(
                        'enable_predefined' => array(
                            'values'        => 'no',
                            'default_value' => 'no',
                        ),
                    ),
                ),
            ));
	        $this->set_option(array(
		        'field_type'  => 'text',
		        'name'        => 'width',
		        'title'       => esc_html__('SVG Size (px or %)', 'protalks-core'),
	        ));
            $this->set_option(array(
                'field_type' => 'text',
                'name'       => 'margin_top',
                'title'      => esc_html__('Position Top (px or %)', 'protalks-core'),
            ));
            $this->set_option(array(
                'field_type' => 'text',
                'name'       => 'margin_left',
                'title'      => esc_html__('Position Left (px or %)', 'protalks-core'),
            ));
            $this->set_option(array(
                'field_type' => 'select',
                'name'       => 'hide_on_touch_devices',
                'title'      => esc_html__('Hide On Touch Devices', 'protalks-core'),
                'options'    => protalks_core_get_select_type_options_pool('no_yes', false)
            ));
            $this->map_extra_options();
        }

        public static function call_shortcode($params)
        {
            $html = qode_framework_call_shortcode('protalks_core_background_svg', $params);
            $html = str_replace("\n", '', $html);

            return $html;
        }

        public function render($options, $content = null)
        {
            parent::render($options);
            $atts = $this->get_atts();

            $atts['unique_class']       = 'qodef-background-svg-' . rand(0, 1000);
            $atts['holder_classes']     = $this->get_holder_classes($atts);
            $atts['svg_holder_classes'] = $this->get_svg_holder_classes($atts);
            $atts['svg_styles']         = $this->get_svg_styles($atts);

            return protalks_core_get_template_part('shortcodes/background-svg', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts);
        }

        private function get_holder_classes($atts)
        {
            $holder_classes = $this->init_holder_classes();

            $holder_classes[] = 'qodef-background-svg';
            $holder_classes[] = ! empty($atts['layout']) ? 'qodef-layout--' . $atts['layout'] : '';
            $holder_classes[] = 'yes' === $atts['hide_on_touch_devices'] ? 'qodef-hidden--on-touch' : '';
            $holder_classes[] = ! empty($atts['enable_appear']) ? 'qodef--svg-has-appear' : '';
            $holder_classes[] = 'yes' === $atts['enable_animation'] ? 'qodef--animated' : '';
            $holder_classes[] = ! empty($atts['animation_path']) ? 'qodef-animation--' . $atts['animation_path'] : '';
            $holder_classes[] = 'yes' === $atts['enable_predefined'] ? 'qodef--predefined' : '';

            return implode(' ', $holder_classes);
        }

        private function get_svg_holder_classes($atts)
        {
            $holder_classes = $this->init_item_classes();

            $holder_classes[] = 'qodef-m-svg';
            $holder_classes[] = $atts['unique_class'];

            return implode(' ', $holder_classes);
        }

        private function get_svg_styles($atts)
        {
            $styles = array();

            if ($atts['width'] !== '') {
                if (qode_framework_string_ends_with_space_units($atts['width'], true)) {
                    $styles[] = '--qode-width: ' . $atts['width'];
                } else {
                    $styles[] = 'width: ' . intval($atts['width']) . 'px';
                }
            }

            if ($atts['svg_fill'] !== '') {
                $styles[] = 'fill: ' . $atts['svg_fill'];
            }

            if ($atts['margin_top'] !== '') {
                $styles[] = 'margin-top: ' . $atts['margin_top'];
            }

            if ($atts['margin_left'] !== '') {
                $styles[] = 'margin-left: ' . $atts['margin_left'];
            }

            if ($atts['svg_fill'] !== '' && $atts['enable_predefined'] === 'yes') {
                $styles[] = '--qodef--gradient-color-stop-1: ' . $atts['svg_fill'];

                if ($atts['svg_fill_2'] == '') {
                    $styles[] = '--qodef--gradient-color-stop-2: ' . $atts['svg_fill'];
                }
            }

            if ($atts['svg_fill_2'] !== '' && $atts['enable_predefined'] === 'yes') {
                $styles[] = '--qodef--gradient-color-stop-2: ' . $atts['svg_fill_2'];
            }

            return $styles;
        }
    }
}
