<?php

$item_id        = get_the_ID();
$info_image_one = get_post_meta( $item_id, 'qodef_masonry_gallery_item_info_image_one', true );
$info_image_two = get_post_meta( $item_id, 'qodef_masonry_gallery_item_info_image_two', true );
$info_text      = get_post_meta( $item_id, 'qodef_masonry_gallery_item_info_text', true );

if ( ! empty( $info_image_one ) || ! empty( $info_image_two ) || ! empty( $info_text ) ) { ?>
	<div class="qodef-e-info-holder">
		<div class="qodef-e-info-holder-inner">
			<?php
			if ( 'yes' === $retina_scaling ) {
				$info_image_one_src = wp_get_attachment_image_src( $info_image_one, 'full' );
				?>
				<img itemprop="image" src="<?php echo esc_url( $info_image_one_src[0] ); ?>"
					 width="<?php echo round( $info_image_one_src[1] / 2 ); ?>"
					 height="<?php echo round( $info_image_one_src[2] / 2 ); ?>"
					 alt="<?php echo esc_attr( $info_image_one_src[3] ); ?>"/>
				<?php
			} else {
				echo wp_get_attachment_image( $info_image_one, 'full' );
			}
			?>
		</div>
	</div>
	<?php
}
