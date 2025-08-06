<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$date_link = empty( get_the_title() ) && ! is_single() ? get_the_permalink() : get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) );
$classes   = '';
// This check is to prevent classes for Gutenberg block.
if ( is_single() || is_page() || is_archive() ) {
	$classes = 'published updated';
}
?>
<a itemprop="dateCreated" href="<?php echo esc_url( $date_link ); ?>" class="entry-date <?php echo esc_attr( $classes ); ?>">
	<?php the_time( get_option( 'date_format' ) ); ?>
</a><div class="qodef-info-separator-end"></div>
