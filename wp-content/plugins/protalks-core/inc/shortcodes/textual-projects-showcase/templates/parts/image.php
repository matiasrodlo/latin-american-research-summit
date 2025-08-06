<?php
$item_classes   = array();
$item_classes[] = 'qodef-e';
$item_classes[] = ! empty( $item_hide_on_mobile ) && 'yes' === $item_hide_on_mobile ? 'qodef-hide-on-mobile' : '';
$item_classes   = implode( ' ', $item_classes );

if ( ! empty( $item_image ) ) {
	?>
<div class="qodef-e-media-holder <?php echo esc_attr( $item_classes ); ?>" <?php qode_framework_inline_style( $item_styles ); ?>>
	<div class="qodef-e-image">
		<?php if ( ! empty( $item_link ) ) { ?>
		<a href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $item_link_target ); ?> ">
			<?php } ?>
			<?php
			echo wp_get_attachment_image( $item_image, 'full', false, array( 'class' => 'qodef--main' ) );
			if ( ! empty( $item_hover_image ) ) {
				echo wp_get_attachment_image( $item_hover_image, 'full', false, array( 'class' => 'qodef--hover' ) );
			}
			?>
			<?php if ( ! empty( $item_link ) ) { ?>
		</a>
	<?php } ?>
	</div>
</div>
<?php } ?>
