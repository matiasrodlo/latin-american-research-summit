<?php
// Load title image template.
protalks_core_get_page_title_image();
?>
<div class="qodef-m-content <?php echo esc_attr( protalks_core_get_page_title_content_classes() ); ?>">
	<?php
	// Load subtitle template.
	protalks_core_template_part( 'title/layouts/standard', 'templates/parts/subtitle', '', protalks_core_get_standard_title_layout_subtitle_text() );
	?>
	<<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-m-title entry-title">
		<?php
		if ( qode_framework_is_installed( 'theme' ) ) {
			$output_title = protalks_get_page_title_text();
		} else {
			$output_title = get_option( 'blogname' );
		}

		$decoration_positions = protalks_core_get_post_value_through_levels( 'qodef_page_title_decoration_positions' );
		$line_break_positions = protalks_core_get_post_value_through_levels( 'qodef_page_title_line_break_positions' );

		$output_title = protalks_core_get_modified_string( $output_title, $decoration_positions, $line_break_positions );

		echo qode_framework_wp_kses_html( 'content', $output_title );
		?>
	</<?php echo protalks_core_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
</div>
