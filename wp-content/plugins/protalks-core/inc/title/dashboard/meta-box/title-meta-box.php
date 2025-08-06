<?php

if (! function_exists('protalks_core_add_page_title_meta_box')) {
    /**
     * Function that add general meta box options for this module
     *
     * @param object $page
     */
    function protalks_core_add_page_title_meta_box($page)
    {

        if ($page) {
            $title_tab = $page->add_tab_element(
                array(
                    'name'        => 'tab-title',
                    'icon'        => 'fa fa-cog',
                    'title'       => esc_html__('Title Settings', 'protalks-core'),
                    'description' => esc_html__('Title layout settings', 'protalks-core'),
                )
            );

            $title_tab->add_field_element(
                array(
                    'field_type'  => 'select',
                    'name'        => 'qodef_enable_page_title',
                    'title'       => esc_html__('Enable Page Title', 'protalks-core'),
                    'description' => esc_html__('Use this option to enable/disable page title', 'protalks-core'),
                    'options'     => protalks_core_get_select_type_options_pool('no_yes'),
                )
            );

            $page_title_section = $title_tab->add_section_element(
                array(
                    'name'       => 'qodef_page_title_section',
                    'title'      => esc_html__('Title Area', 'protalks-core'),
                    'dependency' => array(
                        'hide' => array(
                            'qodef_enable_page_title' => array(
                                'values'        => 'no',
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'select',
                    'name'        => 'qodef_title_layout',
                    'title'       => esc_html__('Title Layout', 'protalks-core'),
                    'description' => esc_html__('Choose a title layout', 'protalks-core'),
                    'options'     => apply_filters('protalks_core_filter_title_layout_options', array( '' => esc_html__('Default', 'protalks-core') )),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'select',
                    'name'        => 'qodef_set_page_title_area_in_grid',
                    'title'       => esc_html__('Page Title In Grid', 'protalks-core'),
                    'description' => esc_html__('Enabling this option will set page title area to be in grid', 'protalks-core'),
                    'options'     => protalks_core_get_select_type_options_pool('no_yes'),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type' => 'select',
                    'name'       => 'qodef_enable_title_predefined_style',
                    'title'      => esc_html__('Enable Title Predefined Style', 'protalks-core'),
                    'options'    => protalks_core_get_select_type_options_pool('no_yes'),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'text',
                    'name'        => 'qodef_page_title_height',
                    'title'       => esc_html__('Height', 'protalks-core'),
                    'description' => esc_html__('Enter title height', 'protalks-core'),
                    'args'        => array(
                        'suffix' => esc_html__('px', 'protalks-core'),
                    ),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'text',
                    'name'        => 'qodef_page_title_height_on_smaller_screens',
                    'title'       => esc_html__('Height on Smaller Screens', 'protalks-core'),
                    'description' => esc_html__('Enter title height to be displayed on smaller screens with active mobile header', 'protalks-core'),
                    'args'        => array(
                        'suffix' => esc_html__('px', 'protalks-core'),
                    ),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'color',
                    'name'        => 'qodef_page_title_background_color',
                    'title'       => esc_html__('Background Color', 'protalks-core'),
                    'description' => esc_html__('Enter page title area background color', 'protalks-core'),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'image',
                    'name'        => 'qodef_page_title_background_image',
                    'title'       => esc_html__('Background Image', 'protalks-core'),
                    'description' => esc_html__('Enter page title area background image', 'protalks-core'),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type' => 'select',
                    'name'       => 'qodef_page_title_background_image_behavior',
                    'title'      => esc_html__('Background Image Behavior', 'protalks-core'),
                    'options'    => array(
                        ''           => esc_html__('Default', 'protalks-core'),
                        'responsive' => esc_html__('Set Responsive Image', 'protalks-core'),
                        'parallax'   => esc_html__('Set Parallax Image', 'protalks-core'),
                    ),
                )
            );


            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'text',
                    'name'        => 'qodef_page_title_decoration_positions',
                    'title'       => esc_html__('Highlighted Title Word Positions', 'protalks-core'),
                    'description' => esc_html__('Enter the positions of the words in the title you want to highlight. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to be highlighted, you would enter "1,3,4")', 'protalks-core'),
                    'dependency'  => array(
                        'show' => array(
                            'qodef_title_layout' => array(
                                'values'        => array( 'standard-with-breadcrumbs', 'standard' ),
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'  => 'text',
                    'name'        => 'qodef_page_title_line_break_positions',
                    'title'       => esc_html__('Positions of Title Line Break', 'protalks-core'),
                    'description' => esc_html__('Enter the positions of the words after which you would like to create a line break. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a line break, you would enter "1,3,4")', 'protalks-core'),
                    'dependency'  => array(
                        'show' => array(
                            'qodef_title_layout' => array(
                                'values'        => array( 'standard-with-breadcrumbs', 'standard' ),
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'    => 'select',
                    'name'          => 'qodef_page_disable_title_break_words',
                    'title'         => esc_html__('Disable Title Line Break', 'protalks-core'),
                    'description'   => esc_html__('Enabling this option will disable title line breaks for screen size 1200 and lower', 'protalks-core'),
                    'options'       => protalks_core_get_select_type_options_pool('no_yes', false),
                    'default_value' => 'no',
                    'dependency'    => array(
                        'show' => array(
                            'qodef_title_layout' => array(
                                'values'        => array( 'standard-with-breadcrumbs', 'standard' ),
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type' => 'color',
                    'name'       => 'qodef_page_title_color',
                    'title'      => esc_html__('Title Color', 'protalks-core'),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'    => 'select',
                    'name'          => 'qodef_page_title_tag',
                    'title'         => esc_html__('Title Tag', 'protalks-core'),
                    'description'   => esc_html__('Enabling this option will set title tag', 'protalks-core'),
                    'options'       => protalks_core_get_select_type_options_pool('title_tag'),
                    'default_value' => '',
                    'dependency'    => array(
                        'show' => array(
                            'qodef_title_layout' => array(
                                'values'        => array( 'standard-with-breadcrumbs', 'standard' ),
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'    => 'select',
                    'name'          => 'qodef_page_title_text_alignment',
                    'title'         => esc_html__('Text Alignment', 'protalks-core'),
                    'options'       => array(
                        ''       => esc_html__('Default', 'protalks-core'),
                        'left'   => esc_html__('Left', 'protalks-core'),
                        'center' => esc_html__('Center', 'protalks-core'),
                        'right'  => esc_html__('Right', 'protalks-core'),
                    ),
                    'default_value' => '',
                )
            );

            $page_title_section->add_field_element(
                array(
                    'field_type'    => 'select',
                    'name'          => 'qodef_page_title_vertical_text_alignment',
                    'title'         => esc_html__('Vertical Text Alignment', 'protalks-core'),
                    'options'       => array(
                        ''              => esc_html__('Default', 'protalks-core'),
                        'header-bottom' => esc_html__('From Bottom of Header', 'protalks-core'),
                        'window-top'    => esc_html__('From Window Top', 'protalks-core'),
                    ),
                    'default_value' => '',
                )
            );

            // Hook to include additional options after module options.
            do_action('protalks_core_action_after_page_title_meta_box_map', $page_title_section);
        }
    }

    add_action('protalks_core_action_after_general_meta_box_map', 'protalks_core_add_page_title_meta_box');
}

if (! function_exists('protalks_core_add_general_page_title_meta_box_callback')) {
    /**
     * Function that set current meta box callback as general callback functions
     *
     * @param array $callbacks
     *
     * @return array
     */
    function protalks_core_add_general_page_title_meta_box_callback($callbacks)
    {
        $callbacks['page-title'] = 'protalks_core_add_page_title_meta_box';

        return $callbacks;
    }

    add_filter('protalks_core_filter_general_meta_box_callbacks', 'protalks_core_add_general_page_title_meta_box_callback');
}
