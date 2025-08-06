<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( has_post_thumbnail() ) {
	?>
	<div class="qodef-e-image">
		<a itemprop="url" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
	</div>
<?php } ?>
