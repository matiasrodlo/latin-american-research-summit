<article <?php post_class( 'qodef-team-single-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/image' ); ?>
		<div class="qodef-e-content">
			<div class="qodef-e-section qodef-e-main-content">
				<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/role' ); ?>
				<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/title' ); ?>
				<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/content' ); ?>
			</div>
			<div class="qodef-e-section qodef-e-contact-info">
				<h4 class="qodef-e-title"><?php echo esc_html__( 'Information', 'protalks-core' ); ?></h4>
				<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/phone' ); ?>
				<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/email' ); ?>
				<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/address' ); ?>
			</div>
			<div class="qodef-e-section qodef-e-social-info">
				<h4 class="qodef-e-title"><?php echo esc_html__( 'Follow', 'protalks-core' ); ?></h4>
				<?php protalks_core_template_part( 'post-types/team', 'templates/parts/post-info/social-icons' ); ?>
			</div>
		</div>
	</div>
</article>
