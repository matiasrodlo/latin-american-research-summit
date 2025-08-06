<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-top-holder">
			<div class="qodef-e-info">
				<?php
				// Include post category info.
				protalks_core_theme_template_part( 'blog', 'templates/parts/post-info/categories' );
				
				// Include post date info.
				protalks_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
				
				// Include post category info.
				protalks_core_theme_template_part( 'blog', 'templates/parts/post-info/tags', '', $params );
				?>
			</div>
			<?php
			// Include post title.
			protalks_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params );
			?>
		</div>
		<?php
		// Include post media.
		protalks_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params );
		?>
		<?php if( ! empty( $excerpt_length ) ) { ?>
			<div class="qodef-e-content">
				<div class="qodef-e-text">
					<?php
	
					// Include post excerpt.
					protalks_core_theme_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );
	
					// Hook to include additional content after blog single content.
					do_action( 'protalks_action_after_blog_single_content' );
					?>
				</div>
			</div>
		<?php } ?>
	</div>
</article>
