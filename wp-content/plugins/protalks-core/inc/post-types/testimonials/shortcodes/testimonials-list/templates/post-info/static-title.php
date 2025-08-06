<?php
$static_title_tag = isset( $static_title_tag ) && ! empty( $static_title_tag ) ? $static_title_tag : 'h2';

if ( ! empty ( $static_title ) ) { ?>
    <<?php echo protalks_core_escape_title_tag( $static_title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-e-static-title">
        <?php echo esc_html( $static_title ); ?>
    </<?php echo protalks_core_escape_title_tag( $static_title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<?php }
