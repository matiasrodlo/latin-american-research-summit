<div <?php qode_framework_class_attribute( $holder_classes ); ?> >
	<?php
	if ( is_array( $items ) && count( $items ) > 0 ) {
		foreach ( $items as $key => $item ) { ?>
			<p class="qodef-textual-list-item">
				<?php if ( ! empty( $item['link'] ) ) { ?>
					<a href="<?php echo esc_url( $item['link'] ) ?>" target="<?php echo esc_attr( $item['target'] ) ?>">
				<?php } ?>
					<?php echo esc_html( $item['title'] ); ?>
				<?php if ( ! empty( $item['link'] ) ) { ?>
					</a>
				<?php } ?>
			</p>
		<?php }
	}
	?>
</div>
