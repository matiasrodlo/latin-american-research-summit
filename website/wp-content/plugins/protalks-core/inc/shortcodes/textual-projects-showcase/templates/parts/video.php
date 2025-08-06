<?php
$item_classes   = array();
$item_classes[] = 'qodef-e';
$item_classes[] = ! empty( $item_hide_on_mobile ) && 'yes' === $item_hide_on_mobile ? 'qodef-hide-on-mobile' : '';
$item_classes   = implode( ' ', $item_classes );
$video_styles   = array();

if ( $item_video_width !== '' ) {
	if ( qode_framework_string_ends_with_space_units( $item_video_width ) ) {
		$video_styles[] = 'width: ' . $item_video_width;
	} else {
		$video_styles[] = 'width: ' . intval( $item_video_width ) . 'px';
	}
}

if ( $item_video_height !== '' ) {
	if ( qode_framework_string_ends_with_space_units( $item_video_height ) ) {
		$video_styles[] = 'height: ' . $item_video_height;
	} else {
		$video_styles[] = 'height: ' . intval( $item_video_height ) . 'px';
	}
}

if ( ! empty( $item_video_src ) ) {
	?>
<div class="qodef-e-media-holder <?php echo esc_attr( $item_classes ); ?>">
	<?php if ( ! empty( $item_link ) ) { ?>
	<a href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $item_link_target ); ?> ">
	<?php } ?>
		<video class="qodef-m-video" src="<?php echo esc_url( $item_video_src ); ?>" muted="muted" autoplay playsinline <?php qode_framework_inline_style( $video_styles ); ?>></video>
	<?php if ( ! empty( $item_link ) ) { ?>
	</a>
	<?php } ?>
</div>
<?php } ?>
