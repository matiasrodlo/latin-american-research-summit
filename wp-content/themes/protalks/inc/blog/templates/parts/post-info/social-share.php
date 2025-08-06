<?php
$social_share_enabled = 'yes' === protalks_get_post_value_through_levels( 'qodef_blog_enable_social_share' );
$social_share_layout  = protalks_get_post_value_through_levels( 'qodef_social_share_layout' );

if ( class_exists( 'ProTalksCore_Social_Share_Shortcode' ) && $social_share_enabled ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params           = array();
		$params['layout'] = $social_share_layout;

		echo ProTalksCore_Social_Share_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
