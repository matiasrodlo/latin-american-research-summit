<?php
$speaker = get_post_meta( get_the_ID(), 'qodef_event_single_speaker', true );

if ( ! empty( $speaker ) ) {
	$team_list_params                       = array();
	$team_list_params['behavior']           = 'columns';
	$team_list_params['columns']            = '1';
	$team_list_params['columns_responsive'] = 'predefined';
	$team_list_params['posts_per_page']     = '1';
	$team_list_params['layout']             = 'side-by-side';
	$team_list_params['additional_params']  = 'id';
	$team_list_params['post_ids']           = $speaker;
	?>
	<?php if ( class_exists( 'ProTalksCore_Team_List_Shortcode' ) ) { ?>
		<div class="qodef-m-speaker-holder">
			<h2 class="qodef-m-speaker-title">
				<?php esc_html_e( 'Conference speaker', 'protalks-core' ); ?>
			</h2>
			<?php echo ProTalksCore_Team_List_Shortcode::call_shortcode( $team_list_params ); ?>
		</div>
	<?php }
}
