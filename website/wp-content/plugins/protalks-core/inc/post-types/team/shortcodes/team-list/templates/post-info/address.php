<?php
$member_address = get_post_meta( get_the_ID(), 'qodef_team_member_address', true );

if ( ! empty( $member_address ) ) { ?>
	<p class="qodef-e-section-item qodef-e-address">
		<?php echo esc_html( $member_address ); ?>
	</p>
<?php } ?>
