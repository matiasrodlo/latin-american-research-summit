<?php
$role = get_post_meta( get_the_ID(), 'qodef_team_member_role', true );

if ( ! empty( $role ) ) { ?>
	<div class="qodef-team-member-role"><?php echo esc_html( $role ); ?></div>
<?php } ?>
