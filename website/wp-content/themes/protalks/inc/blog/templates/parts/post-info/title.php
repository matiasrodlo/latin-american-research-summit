<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h1';

$title_classes   = array();
$title_classes[] = 'qodef-e-title';
$title_classes[] = 'entry-title';
$title_classes[] = ! empty( $title_tag ) ? '' : 'qodef--default-title';
$title_classes   = implode( ' ', $title_classes );
?>
<?php echo '<' . protalks_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> itemprop="name" class="<?php echo esc_attr( $title_classes ); ?>">
	<?php if ( ! is_single() ) : ?>
		<a itemprop="url" class="qodef-e-title-link" href="<?php the_permalink(); ?>">
	<?php endif; ?>
	<?php
		$title          = get_the_title();
		$modified_title = protalks_get_modified_title( $title );
		echo wp_kses_post( $modified_title );
	?>
	<?php if ( ! is_single() ) : ?>
		</a>
	<?php endif; ?>
<?php echo '</' . protalks_escape_title_tag( $title_tag ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
