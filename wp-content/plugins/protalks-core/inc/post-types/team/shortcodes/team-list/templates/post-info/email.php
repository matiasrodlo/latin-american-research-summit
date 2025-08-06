<?php
$member_email = get_post_meta( get_the_ID(), 'qodef_team_member_email', true );

if ( ! empty( $member_email ) ) {
	$member_email = str_replace( 'mailto:', '', $member_email );
	?>
	<p class="qodef-e-section-item qodef-e-email">
		<a href="<?php echo esc_url( 'mailto:' . $member_email ); ?>" target="_self">
			<span>
				<?php echo esc_html( $member_email ); ?>
			</span>
		</a>
	</p>
<?php } ?>
