<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="wrap about-wrap qodef-welcome-page">
	<div class="qodef-welcome-page-heading">
		<div class="qodef-welcome-page-logo">
			<img src="<?php echo esc_url( PROTALKS_INC_ROOT . '/welcome/assets/img/logo.png' ); ?>" alt="<?php esc_attr_e( 'Qode Logo', 'protalks' ); ?>"/>
		</div>
		<h1 class="qodef-welcome-page-title">
			<?php
			// translators: %s - added theme name text.
			printf( esc_html__( 'Welcome to %s', 'protalks' ), esc_attr( $theme_name ) );
			?>
			<small><?php echo esc_html( $theme_version ); ?></small>
		</h1>
	</div>
	<div class="qodef-welcome-page-text">
		<?php
		printf(
			// translators: %1$s - added theme name text, %2$s - added theme description text, %3$s - added theme name text.
			esc_html__( 'Thank you for installing %1$s - %2$s! Everything in %3$s is streamlined to make your website building experience as simple and fun as possible. We hope you love using it to make a spectacular website.', 'protalks' ),
			esc_attr( $theme_name ),
			esc_attr( $theme_description ),
			esc_attr( $theme_name )
		);
		?>
	</div>
	<div class="qodef-welcome-page-content">
		<div class="qodef-welcome-page-screenshot">
			<img src="<?php echo esc_url( $theme_screenshot ); ?>" alt="<?php esc_attr_e( 'Theme Screenshot', 'protalks' ); ?>"/>
		</div>
		<div class="qodef-welcome-page-links-holder">
			<div class="qodef-welcome-page-install-core">
				<p><?php esc_html_e( 'Please install and activate required plugins in order to gain access to all the theme functionalities and features.', 'protalks' ); ?></p>
				<a class="qodef-welcome-page-install-button" href="<?php echo esc_url( add_query_arg( array( 'page' => 'install-required-plugins&plugin_status=install' ), admin_url( 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Install Required Plugins', 'protalks' ); ?>
				</a>
			</div>

			<h3><?php esc_html_e( 'Useful Links:', 'protalks' ); ?></h3>
			<ul class="qodef-welcome-page-links">
				<li>
					<a href="https://helpcenter.qodeinteractive.com" target="_blank"><?php esc_html_e( 'Help Center', 'protalks' ); ?></a>
				</li>
				<li>
					<a href="https://protalks.qodeinteractive.com/documentation/" target="_blank"><?php esc_html_e( 'Theme Documentation', 'protalks' ); ?></a>
				</li>
				<li>
					<a href="https://qodeinteractive.com/" target="_blank"><?php esc_html_e( 'All Our Themes', 'protalks' ); ?></a>
				</li>
				<li>
					<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'install-required-plugins&plugin_status=install' ), admin_url( 'themes.php' ) ) ); ?>"><?php esc_html_e( 'Install Required Plugins', 'protalks' ); ?></a>
				</li>
			</ul>
		</div>
	</div>
</div>
