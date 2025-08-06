<?php
$member_role = get_post_meta( get_the_ID(), 'qodef_team_member_role', true );

if ( ! empty( $member_role ) ) { ?>
	<p class="qodef-e-role"><?php echo esc_html( wp_strip_all_tags( $member_role ) ); ?></p>
<?php } ?>
