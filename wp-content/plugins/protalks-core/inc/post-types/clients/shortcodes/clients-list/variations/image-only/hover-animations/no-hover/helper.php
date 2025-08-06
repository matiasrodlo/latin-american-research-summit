<?php

if ( ! function_exists( 'protalks_core_filter_clients_list_image_only_no_hover' ) ) {
    /**
     * Function that add variation layout for this module
     *
     * @param array $variations
     *
     * @return array
     */
    function protalks_core_filter_clients_list_image_only_no_hover( $variations ) {
        $variations['no-hover'] = esc_html__( 'No Hover', 'protalks-core' );

        return $variations;
    }

    add_filter( 'protalks_core_filter_clients_list_image_only_animation_options', 'protalks_core_filter_clients_list_image_only_no_hover' );
}