<?php
$member_phone_number = get_post_meta( get_the_ID(), 'qodef_team_member_phone_number', true );

if ( ! empty( $member_phone_number ) ) {
	$member_phone_number         = str_replace( 'tel:', '', $member_phone_number );
	$member_phone_number_compact = preg_replace( '/\s+/', '', $member_phone_number );
	?>
	<p class="qodef-e-section-item qodef-e-phone-number">
		<a href="<?php echo esc_url( 'tel:' . $member_phone_number_compact ); ?>" target="_self">
			<span>
				<?php echo esc_html( $member_phone_number ); ?>
			</span>
		</a>
	</p>
<?php } ?>
