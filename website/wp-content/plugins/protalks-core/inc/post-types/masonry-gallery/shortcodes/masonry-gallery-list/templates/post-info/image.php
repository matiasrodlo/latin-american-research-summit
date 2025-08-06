<?php if ( has_post_thumbnail() ) { ?>
	<div class="qodef-e-media-image">
		<?php
		if ( 'yes' === $retina_scaling ) {
			$post_thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
			$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			?>
			<img itemprop="image" src="<?php echo esc_url( $post_thumbnail_src[0] ); ?>"
				 width="<?php echo round( $post_thumbnail_src[1] / 2 ); ?>"
				 height="<?php echo round( $post_thumbnail_src[2] / 2 ); ?>"
				 alt="<?php echo esc_attr( $post_thumbnail_src[3] ); ?>"/>
			<?php
		} else {
			the_post_thumbnail( $image_dimension['size'] );
		}
		?>
	</div>
<?php } ?>
