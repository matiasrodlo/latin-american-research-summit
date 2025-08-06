<?php if ( ! empty( $video_link ) ) { ?>
	<a itemprop="url" class="qodef-m-play qodef-magnific-popup qodef-popup-item" href="<?php echo esc_url( $video_link ); ?>" data-type="iframe">
		<span class="qodef-m-play-inner" <?php echo qode_framework_get_inline_style( $play_button_styles ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<span class="qodef-m-play-inner-2">
				<?php echo protalks_core_get_svg_icon( 'play' ); ?>
				<?php echo protalks_core_get_svg_icon( 'play-rect' ); ?>
			</span>
		</span>
	</a>
<?php } ?>
