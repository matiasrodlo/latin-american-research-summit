<?php
    if ( 'yes' === $enable_predefined ) {
        if ('path-3' === $animation_path){
            echo protalks_core_render_svg_icon('gradient-radial-2');
        } else {
            echo protalks_core_render_svg_icon('gradient-radial');
        }
    } else if ( ! empty( $svg ) ) {
        echo qode_framework_wp_kses_html('html', $svg);
    }
?>
