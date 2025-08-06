<?php
$text          = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_text', true );

if ( ! empty( $text ) ) { ?>
	<p itemprop="description" class="qodef-e-text"><?php echo qode_framework_wp_kses_html( 'content', $text ); ?></p>
<?php } ?>
