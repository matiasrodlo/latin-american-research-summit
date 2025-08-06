<?php if ( has_post_thumbnail() ) { ?>
	<div class="qodef-e-image">
		<?php if ( ! is_singular( 'team' ) ) { ?>
			<a itemprop="url" href="<?php the_permalink(); ?>">
		<?php } ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php if ( ! is_singular( 'team' ) ) { ?>
			</a>
		<?php } ?>
	</div>
<?php } ?>
