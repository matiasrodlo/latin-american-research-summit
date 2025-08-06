<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$product = protalks_woo_get_global_product();
$image   = $product->get_image_id();
$thumbs  = $product->get_gallery_image_ids();

$classes[] = 'qodef-swiper-container';
$classes[] = 'qodef-swiper--show-navigation-combo';
$classes   = implode( ' ', $classes );

if ( $image ) :
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
		<div class="swiper-wrapper">
			<?php
			echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'swiper-slide' ) );

			if ( $image && $thumbs ) {
				foreach ( $thumbs as $thumb ) {
					echo wp_get_attachment_image( $thumb, 'full', false, array( 'class' => 'swiper-slide' ) );
				}
			}
			?>
		</div>
		<div class="swiper-button-prev">
			<?php protalks_render_svg_icon( 'slider-arrow-left' ); ?>
		</div>
		<div class="swiper-button-next">
			<?php protalks_render_svg_icon( 'slider-arrow-right' ); ?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
<?php endif; ?>
