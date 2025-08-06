<?php
/*
Plugin Name: ProTalks Core
Plugin URI: https://qodeinteractive.com
Description: Plugin that adds portfolio post type, shortcodes and other modules
Author: Qode Interactive
Author URI: https://qodeinteractive.com
Version: 1.0
Text Domain: protalks-core
*/
if ( ! class_exists( 'ProTalksCore' ) ) {
	class ProTalksCore {
		private static $instance;

		public function __construct() {
			$this->require_core();

			add_filter( 'qode_framework_filter_register_admin_options', array( $this, 'create_core_options' ) );

			add_action( 'qode_framework_action_before_options_init_' . PROTALKS_CORE_OPTIONS_NAME, array( $this, 'init_core_options' ) );

			add_action( 'qode_framework_action_populate_meta_box', array( $this, 'init_core_meta_boxes' ) );

			// Register plugin assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );

			// Include plugin assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );

			// Make plugin available for translation.
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ), 15 ); // permission 15 is set in order to be after the qode-framework initialization

			// Add plugin's body classes.
			add_filter( 'body_class', array( $this, 'add_body_classes' ) );

			// Hook to include additional modules when plugin loaded.
			do_action( 'protalks_core_action_plugin_loaded' );
		}

		/**
		 * @return ProTalksCore
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function require_core() {
			require_once __DIR__ . '/constants.php';
			require_once PROTALKS_CORE_ABS_PATH . '/helpers/helper.php';

			// Hook to include additional files before modules inclusion.
			do_action( 'protalks_core_action_before_include_modules' );

			foreach ( glob( PROTALKS_CORE_INC_PATH . '/*/include.php' ) as $module ) {
				include_once $module;
			}

			// Hook to include additional files after modules inclusion.
			do_action( 'protalks_core_action_after_include_modules' );
		}

		public function create_core_options( $options ) {
			$protalks_core_options_admin = new QodeFrameworkOptionsAdmin(
				PROTALKS_CORE_MENU_NAME,
				PROTALKS_CORE_OPTIONS_NAME,
				array(
					'label' => esc_html__( 'ProTalks Core Options', 'protalks-core' ),
					'code'  => ProTalksCore_Dashboard::get_instance()->get_code(),
				)
			);

			$options[] = $protalks_core_options_admin;

			return $options;
		}

		public function init_core_options() {
			$qode_framework = qode_framework_get_framework_root();

			if ( ! empty( $qode_framework ) ) {
				$page = $qode_framework->add_options_page(
					array(
						'scope'       => PROTALKS_CORE_OPTIONS_NAME,
						'type'        => 'admin',
						'slug'        => 'general',
						'title'       => esc_html__( 'General', 'protalks-core' ),
						'description' => esc_html__( 'Global Theme Options', 'protalks-core' ),
						'icon'        => 'fa fa-cog',
					)
				);

				// Hook to include additional options after default options.
				do_action( 'protalks_core_action_default_options_init', $page );
			}
		}

		public function init_core_meta_boxes() {
			do_action( 'protalks_core_action_default_meta_boxes_init' );
		}

		public function register_scripts() {

			// Register 3rd party plugins style.
			wp_register_style( 'magnific-popup', PROTALKS_CORE_URL_PATH . 'assets/plugins/magnific-popup/magnific-popup.css' );

			// Register 3rd party plugins script.
			wp_register_script( 'jquery-magnific-popup', PROTALKS_CORE_URL_PATH . 'assets/plugins/magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ), false, true );

			// Hook to include additional registered scripts.
			do_action( 'protalks_core_action_registered_scripts' );
		}

		public function enqueue_assets() {
			// CSS and JS dependency variables.
			$style_dependency_array  = apply_filters( 'protalks_core_filter_style_dependencies', array( 'protalks-main' ) );
			$script_dependency_array = apply_filters( 'protalks_core_filter_script_dependencies', array( 'protalks-main-js' ) );

			// Hook to include additional scripts before plugin's main style.
			do_action( 'protalks_core_action_before_main_css' );

			// Enqueue plugin's main style.
			wp_enqueue_style( 'protalks-core-style', PROTALKS_CORE_URL_PATH . 'assets/css/protalks-core.min.css', $style_dependency_array, PROTALKS_CORE_VERSION );

			// Enqueue plugin's 3rd party scripts.
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'modernizr', PROTALKS_CORE_URL_PATH . 'assets/plugins/modernizr/modernizr.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'gsap', PROTALKS_CORE_URL_PATH . 'assets/plugins/gsap/gsap.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'scrollTrigger', PROTALKS_CORE_URL_PATH . 'assets/plugins/gsap/ScrollTrigger.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'parallax-scroll', PROTALKS_CORE_URL_PATH . 'assets/plugins/parallax-scroll/jquery.parallax-scroll.js', array( 'jquery' ), false, true );

			// Hook to include additional scripts before plugin's main script.
			do_action( 'protalks_core_action_before_main_js' );

			// Enqueue plugin's main script.
			wp_enqueue_script( 'protalks-core-script', PROTALKS_CORE_URL_PATH . 'assets/js/protalks-core.min.js', $script_dependency_array, PROTALKS_CORE_VERSION, true );
		}

		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'protalks-core', false, PROTALKS_CORE_REL_PATH . '/languages' );
		}

		public function add_body_classes( $classes ) {
			$classes[] = 'protalks-core-' . PROTALKS_CORE_VERSION;

			return $classes;
		}
	}
}

if ( ! function_exists( 'protalks_core_instantiate_plugin' ) ) {
	/**
	 * Function that initialize plugin
	 */
	function protalks_core_instantiate_plugin() {
		ProTalksCore::get_instance();
	}

	add_action( 'qode_framework_action_load_dependent_plugins', 'protalks_core_instantiate_plugin' );
}

if ( ! function_exists( 'protalks_core_activation_trigger' ) ) {
	/**
	 * Function that trigger hooks on plugin activation
	 */
	function protalks_core_activation_trigger() {
		// Set global plugin option when plugin is activated.
		add_option( 'protalks_core_activated_first_time', 'yes' );

		// Hook to add additional code on plugin activation.
		do_action( 'protalks_core_action_on_activation' );
	}

	register_activation_hook( __FILE__, 'protalks_core_activation_trigger' );
}

if ( ! function_exists( 'protalks_core_deactivation_trigger' ) ) {
	/**
	 * Function that trigger hooks on plugin deactivation
	 */
	function protalks_core_deactivation_trigger() {
		// Remove global plugin option during deactivation.
		delete_option( 'protalks_core_activated_first_time' );

		// Hook to add additional code on plugin deactivation.
		do_action( 'protalks_core_action_on_deactivation' );
	}

	register_deactivation_hook( __FILE__, 'protalks_core_deactivation_trigger' );
}

if ( ! function_exists( 'protalks_core_plugins_loaded_option' ) ) {
	/**
	 * Function that update global option that plugin is activated first time
	 */
	function protalks_core_plugins_loaded_option() {
		if ( 'yes' === get_option( 'protalks_core_activated_first_time' ) ) {
			update_option( 'protalks_core_activated_first_time', 'no' );
		}
	}

	add_action( 'plugins_loaded', 'protalks_core_plugins_loaded_option', 1000 ); //needs to be last, so option can be changed after all actions
}

if ( ! function_exists( 'protalks_core_check_requirements' ) ) {
	/**
	 * Function that check plugin requirements
	 */
	function protalks_core_check_requirements() {
		if ( ! defined( 'QODE_FRAMEWORK_VERSION' ) ) {
			add_action( 'admin_notices', 'protalks_core_admin_notice_content' );
		}
	}

	add_action( 'plugins_loaded', 'protalks_core_check_requirements' );
}

if ( ! function_exists( 'protalks_core_admin_notice_content' ) ) {
	/**
	 * Function that display the error message if the requirements are not met
	 */
	function protalks_core_admin_notice_content() {
		printf( '<div class="notice notice-error"><p>%s</p></div>', esc_html__( 'Qode Framework plugin is required for ProTalks Core plugin to work properly. Please install/activate it first.', 'protalks-core' ) );

		if ( function_exists( 'deactivate_plugins' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	}
}
