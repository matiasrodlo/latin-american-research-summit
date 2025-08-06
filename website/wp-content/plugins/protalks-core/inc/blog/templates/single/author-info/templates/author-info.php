<?php
$is_enabled = protalks_core_get_post_value_through_levels( 'qodef_blog_single_enable_author_info' );

if ( 'yes' === $is_enabled && '' !== get_the_author_meta( 'description' ) ) {
	$author_id     = get_the_author_meta( 'ID' );
	$author_link   = get_author_posts_url( $author_id );
	$email_enabled = 'yes' === protalks_core_get_post_value_through_levels( 'qodef_blog_single_enable_author_info_email' );
	$user_socials  = protalks_core_get_author_social_networks( $author_id );
	$additional_role = get_the_author_meta( 'qodef_additional_role' );
	
	?>
	<div id="qodef-author-info" class="qodef-m">
		<div class="qodef-m-inner">
			<div class="qodef-m-image">
				<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>">
					<?php echo get_avatar( $author_id, 209 ); ?>
				</a>
			</div>
			<div class="qodef-m-content">
				<h6 class="qodef-m-author vcard author">
					<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>">
						<span class="fn"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></span>
					</a>
				</h6>
				<?php if( ! empty( $additional_role ) ) { ?>
					<p class="qodef-m-additional-role">
						<?php echo esc_html( $additional_role ); ?>
					</p>
				<?php } ?>
				<?php if ( $email_enabled && is_email( get_the_author_meta( 'email' ) ) ) { ?>
					<p itemprop="email" class="qodef-m-email"><?php echo sanitize_email( get_the_author_meta( 'email' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php } ?>
				<p itemprop="description" class="qodef-m-description"><?php echo esc_html( wp_strip_all_tags( get_the_author_meta( 'description' ) ) ); ?></p>
				<?php if ( ! empty( $user_socials ) ) { ?>
					<div class="qodef-m-social-icons">
						<?php foreach ( $user_socials as $social ) { ?>
							<a itemprop="url" class="<?php echo esc_attr( $social['class'] ); ?>" href="<?php echo esc_url( $social['url'] ); ?>" target="_blank">
								<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								echo protalks_core_get_svg_icon( $social['network'] );
								?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
