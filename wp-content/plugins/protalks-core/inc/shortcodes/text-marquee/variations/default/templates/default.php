<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<?php if ( ! empty( $marquee_link ) ) { ?>
		<a itemprop="url" href="<?php echo esc_url( $marquee_link ); ?>" target="<?php echo esc_attr( $marquee_link_target ); ?>">
	<?php } ?>
	<div class="qodef-m-content" <?php qode_framework_inline_style( $text_styles ); ?>>
		<div class="qodef-m-content-inner">
			<?php if ( ! empty( $text_1 ) ) : ?>
				<span class="qodef-m-text-1" <?php qode_framework_inline_style( $text_individual_styles['first'] ); ?>>
					<?php echo esc_html( $text_1 ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $separator ) ): ?>
				<span class="qodef-m-separator" <?php qode_framework_inline_style( $text_individual_styles['separator'] ); ?>>
					<?php echo qode_framework_wp_kses_html( 'svg', $separator ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $text_2 ) ) : ?>
				<span class="qodef-m-text-2" <?php qode_framework_inline_style( $text_individual_styles['second'] ); ?>>
					<?php echo esc_html( $text_2 ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $separator ) ): ?>
				<span class="qodef-m-separator" <?php qode_framework_inline_style( $text_individual_styles['separator'] ); ?>>
					<?php echo qode_framework_wp_kses_html( 'svg', $separator ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $text_3 ) ) : ?>
				<span class="qodef-m-text-3" <?php qode_framework_inline_style( $text_individual_styles['third'] ); ?>>
					<?php echo esc_html( $text_3 ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $separator ) ): ?>
				<span class="qodef-m-separator" <?php qode_framework_inline_style( $text_individual_styles['separator'] ); ?>>
					<?php echo qode_framework_wp_kses_html( 'svg', $separator ); ?>
				</span>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( ! empty( $marquee_link ) ) { ?>
		</a>
	<?php } ?>
</div>
