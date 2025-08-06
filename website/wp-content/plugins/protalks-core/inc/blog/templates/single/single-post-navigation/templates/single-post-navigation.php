<?php
$is_enabled = protalks_core_get_post_value_through_levels( 'qodef_blog_single_enable_single_post_navigation' );

if ( 'yes' === $is_enabled ) {
	$through_same_category = 'yes' === protalks_core_get_post_value_through_levels( 'qodef_blog_single_post_navigation_through_same_category' );
	?>
	<div id="qodef-single-post-navigation" class="qodef-m">
		<div class="qodef-m-inner">
			<?php
			$post_navigation = array(
				'prev' => array(
					'icon'  => protalks_core_get_svg_icon( 'pagination-arrow-left', 'qodef-m-pagination-icon' ),
				),
				'next' => array(
					'icon'  => protalks_core_get_svg_icon( 'pagination-arrow-right', 'qodef-m-pagination-icon' ),
				),
			);

			if ( $through_same_category ) {
				if ( '' !== get_previous_post( true ) ) {
					$post_navigation['prev']['post'] = get_previous_post( true );
				}
				if ( '' !== get_next_post( true ) ) {
					$post_navigation['next']['post'] = get_next_post( true );
				}
			} else {
				if ( '' !== get_previous_post() ) {
					$post_navigation['prev']['post'] = get_previous_post();
				}
				if ( '' !== get_next_post() ) {
					$post_navigation['next']['post'] = get_next_post();
				}
			}

			foreach ( $post_navigation as $key => $value ) {
				if ( isset( $post_navigation[ $key ]['post'] ) ) {
					$current_post = $value['post'];
					$post_id      = $current_post->ID;
					?>
					<a itemprop="url" class="qodef-m-nav qodef--<?php echo esc_attr( $key ); ?>" href="<?php echo get_permalink( $post_id ); ?>">
						<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo qode_framework_wp_kses_html( 'svg', $value['icon'] );
						?>
					</a>
					<?php
				}
			}
			?>
		</div>
	</div>
<?php } ?>
