<?php
$phone_number = get_post_meta( get_the_ID(), 'qodef_team_member_phone_number', true );

if ( ! empty( $phone_number ) ) {
	$phone_number         = str_replace( 'tel:', '', $phone_number );
	$phone_number_compact = preg_replace( '/\s+/', '', $phone_number );
	?>
	<p class="qodef-e-section-item qodef-team-member-phone-number">
		<a href="<?php echo esc_url( 'tel:' . $phone_number_compact ); ?>" target="_self">
			<span>
				<?php echo esc_html( $phone_number ); ?>
			</span>
		</a>
	</p>
<?php } ?>
