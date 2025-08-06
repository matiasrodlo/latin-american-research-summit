<?php
$team_list_image = get_post_meta( get_the_ID(), 'qodef_team_list_image', true );
if ( isset( $show_images ) && 'featured-only' === $show_images ) {
	$team_list_image = '';
}
$has_image       = ! empty( $team_list_image ) || has_post_thumbnail();

if ( $has_image ) {
	$images_proportion   = isset( $images_proportion ) && ! empty( $images_proportion ) ? esc_attr( $images_proportion ) : 'full';
	$custom_image_width  = isset( $custom_image_width ) && '' !== $custom_image_width ? intval( $custom_image_width ) : 0;
	$custom_image_height = isset( $custom_image_height ) && '' !== $custom_image_height ? intval( $custom_image_height ) : 0;
	?>
	<div class="qodef-e-media-image">
		<?php if ( $has_single ) { ?>
			<a itemprop="url" href="<?php the_permalink(); ?>">
		<?php } ?>
			<?php echo protalks_core_get_list_shortcode_item_image( $images_proportion, $team_list_image, $custom_image_width, $custom_image_height ); ?>
		<?php if ( $has_single ) { ?>
			</a>
		<?php } ?>
	</div>
<?php } ?>
