<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$link_url_meta  = get_post_meta( get_the_ID(), 'qodef_post_format_link', true );
$link_url       = ! empty( $link_url_meta ) ? $link_url_meta : get_the_permalink();
$link_text_meta = get_post_meta( get_the_ID(), 'qodef_post_format_link_text', true );

if ( ! empty( $link_url ) ) {
	$link_text = ! empty( $link_text_meta ) ? $link_text_meta : get_the_title();
	$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h5';
	?>
	<div class="qodef-e-link">
		<div class="qodef-e-link-top">
			<div class="qodef-e-info">
				<?php
				// Include post category info.
				protalks_template_part( 'blog', 'templates/parts/post-info/categories' );

				// Include post date info.
				protalks_template_part( 'blog', 'templates/parts/post-info/date' );
				?>
			</div>
		</div>
		<div class="qodef-e-link-content">
			<div class="qodef-e-link-content-left">
				<?php protalks_render_svg_icon( 'link', 'qodef-e-link-icon' ); ?>
			</div>
			<div class="qodef-e-link-content-right">
				<<?php echo protalks_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-e-link-text"><?php echo esc_html( $link_text ); ?></<?php echo protalks_escape_title_tag( $title_tag ); ?>>
			</div>
		</div>
		<a itemprop="url" class="qodef-e-link-url" href="<?php echo esc_url( $link_url ); ?>" target="_blank"></a>
	</div>
<?php } ?>
