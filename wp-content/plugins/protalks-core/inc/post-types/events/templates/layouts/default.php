<article <?php post_class( 'qodef-event-item qodef-e' ); ?>>
	<div class="qodef-m-inner">
		<?php protalks_core_template_part( 'post-types/events', 'templates/parts/post-info/image' ); ?>
		<div class="qodef-m-info">
			<?php protalks_core_template_part( 'post-types/events', 'templates/parts/post-info/event-types' ); ?>
			<div class="qodef-info-separator-end"></div>
			<?php protalks_core_template_part( 'post-types/events', 'templates/parts/post-info/date' ); ?>
		</div>
		<?php protalks_core_template_part( 'post-types/events', 'templates/parts/post-info/title' ); ?>
		<div class="qodef-m-content">
			<?php protalks_core_template_part( 'post-types/events', 'templates/parts/post-info/content' ); ?>
		</div>
		<?php protalks_core_template_part( 'post-types/events', 'templates/parts/post-info/tickets-link' ); ?>
	</div>
	<?php protalks_core_template_part( 'post-types/events', 'templates/parts/post-info/speaker' ); ?>
</article>
