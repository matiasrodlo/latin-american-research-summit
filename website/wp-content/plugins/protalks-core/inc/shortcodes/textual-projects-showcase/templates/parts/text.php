<?php if ( ! empty( $item_text ) ) : ?>
	<?php
	$item_text = explode( ' ', $item_text );

	$item_classes   = array();
	$item_classes[] = 'qodef-e-text';
	$item_classes[] = ( 'yes' === $highlight ) ? 'qodef--highlighted' : '';
	$item_classes[] = ! empty( $item_hide_on_mobile ) && 'yes' === $item_hide_on_mobile ? 'qodef-hide-on-mobile' : '';
	$item_classes[] = 'qodef-e';

	$item_classes = implode( ' ', $item_classes );
	?>
	<?php foreach ( $item_text as $text_fragment ) : ?>
		<span <?php qode_framework_class_attribute( $item_classes ); ?>>
			<?php if ( 'yes' !== $highlight ) : ?>
				<?php echo esc_html( $text_fragment ); ?>
			<?php else : ?>
				<span class="qodef-highlight-text">
					<?php echo esc_html( $text_fragment ); ?>
				</span>
			<?php endif; ?>
		</span>
	<?php endforeach; ?>
<?php endif; ?>
