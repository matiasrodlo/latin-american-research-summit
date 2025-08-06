<?php
$styles = array();
//if ( ! empty( $info_below_content_margin_top ) ) {
//	$margin_top = qode_framework_string_ends_with_space_units( $info_below_content_margin_top ) ? $info_below_content_margin_top : intval( $info_below_content_margin_top ) . 'px';
//	$styles[]   = 'margin-top:' . $margin_top;
//}
?>
<div <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-image">
			<?php protalks_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/image', '', $params ); ?>
		</div>
		<div class="qodef-e-content" <?php qode_framework_inline_style( $styles ); ?>>
			<div class="qodef-e-section qodef-e-main-content">
				<?php protalks_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/role', '', $params ); ?>
				<?php protalks_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/title', '', $params ); ?>
				<?php protalks_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/excerpt', '', $params ); ?>
			</div>
			<?php if (
				( isset( $side_by_side_show_contact_info ) && 'yes' === $side_by_side_show_contact_info ) ||
				( isset( $side_by_side_show_social_info ) && 'yes' === $side_by_side_show_social_info )
			) { ?>
				<div class="qodef-e-section qodef-e-additional-content">
					<?php if ( isset( $side_by_side_show_contact_info ) && 'yes' === $side_by_side_show_contact_info ) { ?>
						<div class="qodef-e-subsection qodef-e-contact-info">
							<h5 class="qodef-e-title"><?php echo esc_html__( 'Information', 'protalks-core' ); ?></h5>
							<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/phone' ); ?>
							<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/email' ); ?>
							<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/address' ); ?>
						</div>
					<?php } ?>
					<?php if ( isset( $side_by_side_show_social_info ) && 'yes' === $side_by_side_show_social_info ) { ?>
						<div class="qodef-e-subsection qodef-e-social-info">
							<h5 class="qodef-e-title"><?php echo esc_html__( 'Follow', 'protalks-core' ); ?></h5>
							<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/social-icons' ); ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
