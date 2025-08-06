<h1 itemprop="name" class="qodef-e-title entry-title qodef-team-member-title">
	<?php if ( ! is_singular( 'team' ) ) { ?>
		<a itemprop="url" class="qodef-e-title-link" href="<?php the_permalink(); ?>">
	<?php } ?>
			<?php the_title(); ?>
	<?php if ( ! is_singular( 'team' ) ) { ?>
		</a>
	<?php } ?>
</h1>
