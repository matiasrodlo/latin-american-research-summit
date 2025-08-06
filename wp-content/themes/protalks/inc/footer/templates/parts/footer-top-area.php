<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( protalks_is_footer_top_area_enabled() ) {
	?>
	<div id="qodef-page-footer-top-area">
		<div id="qodef-page-footer-top-area-inner" class="<?php echo esc_attr( protalks_get_footer_top_area_classes() ); ?>">
			<div class="<?php echo esc_attr( protalks_get_footer_top_area_columns_classes() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" <?php echo protalks_get_footer_top_area_grid_gutter_styles(); ?>>
				<div class="qodef-grid-inner">
					<?php
					// phpcs:ignore Generic.CodeAnalysis.ForLoopWithTestFunctionCall.NotAllowed
					for ( $i = 1; $i <= intval( protalks_get_page_footer_sidebars_config_by_key( 'footer_top_sidebars_number' ) ); $i++ ) {
						?>
						<div class="qodef-grid-item">
							<?php protalks_get_footer_widget_area( 'top', $i ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
