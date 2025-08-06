<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$quote_meta = get_post_meta( get_the_ID(), 'qodef_post_format_quote_text', true );
$quote_text = ! empty( $quote_meta ) ? $quote_meta : get_the_title();

if ( ! empty( $quote_text ) ) {
	$quote_author      = get_post_meta( get_the_ID(), 'qodef_post_format_quote_author', true );
	$quote_author_role = get_post_meta( get_the_ID(), 'qodef_post_format_quote_author_role', true );
	$title_tag         = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h5';
	$author_title_tag  = isset( $author_title_tag ) && ! empty( $author_title_tag ) ? $author_title_tag : 'h6';
	?>
	<div class="qodef-e-quote">
		<div class="qodef-e-quote-top">
			<div class="qodef-e-info">
				<?php
				// Include post category info.
				protalks_template_part( 'blog', 'templates/parts/post-info/categories' );

				// Include post date info.
				protalks_template_part( 'blog', 'templates/parts/post-info/date' );
				?>
			</div>
		</div>
		<div class="qodef-e-quote-content">
			<div class="qodef-e-quote-content-left">
				<?php protalks_render_svg_icon( 'quote', 'qodef-e-quote-icon' ); ?>
			</div>
			<div class="qodef-e-quote-content-right">
				<<?php echo protalks_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-e-quote-text"><?php echo esc_html( $quote_text ); ?></<?php echo protalks_escape_title_tag( $title_tag ); ?>>
			<?php if ( ! empty( $quote_author ) ) { ?>
				<<?php echo protalks_escape_title_tag( $author_title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="qodef-e-quote-author"><?php echo esc_html( $quote_author ); ?></<?php echo protalks_escape_title_tag( $author_title_tag ); ?>>
			<?php } ?>
			<?php if ( ! empty( $quote_author_role ) ) { ?>
				<p class="qodef-e-quote-author-role"><?php echo esc_html( $quote_author_role ); ?></p>
			<?php } ?>
			</div>
		</div>
		<?php if ( ! is_single() ) { ?>
			<a itemprop="url" class="qodef-e-quote-url" href="<?php the_permalink(); ?>"></a>
		<?php } ?>
	</div>
<?php } ?>
