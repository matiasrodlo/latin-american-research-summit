<?php
/**
 * Widget: Audio player for Local hosted audio and Soundcloud and other embeded audio
 *
 * @package ThemeREX Addons
 * @since v1.2
 */


// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	exit;
}


// Load widget
if ( ! function_exists( 'trx_addons_widget_audio_load' ) ) {
	add_action( 'widgets_init', 'trx_addons_widget_audio_load' );
	function trx_addons_widget_audio_load() {
		register_widget( 'trx_addons_widget_audio' );
	}
}

// Widget Class
class trx_addons_widget_audio extends TRX_Addons_Widget {
	/** Widget base constructor. */
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_audio',
			'description' => esc_html__( 'Play audio from Soundcloud and other audio hostings or Local hosted audio', 'trx_addons' ),
		);
		parent::__construct( 'trx_addons_widget_audio', esc_html__( 'ThemeREX Audio player', 'trx_addons' ), $widget_ops );
	}

	/** Show widget */
	function widget( $args, $instance ) {

		$title        = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
		$subtitle     = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$next_btn     = isset( $instance['next_btn'] ) ? $instance['next_btn'] : '1';
		$next_text    = isset( $instance['next_text'] ) ? $instance['next_text'] : '';
		$next_icon    = isset( $instance['next_icon'] ) ? $instance['next_icon'] : '';
		$prev_btn     = isset( $instance['prev_btn'] ) ? $instance['prev_btn'] : '1';
		$prev_text    = isset( $instance['prev_text'] ) ? $instance['prev_text'] : '';
		$prev_icon    = isset( $instance['prev_icon'] ) ? $instance['prev_icon'] : '';
		$now_show     = isset( $instance['now_show'] ) ? $instance['now_show'] : '1';
		$now_text     = isset( $instance['now_text'] ) ? $instance['now_text'] : '';
		$track_time   = isset( $instance['track_time'] ) ? $instance['track_time'] : '';
		$track_scroll = isset( $instance['track_scroll'] ) ? $instance['track_scroll'] : '';
		$track_volume = isset( $instance['track_volume'] ) ? $instance['track_volume'] : '';
		$playlist     = isset( $instance['playlist'] ) ? $instance['playlist'] : '';
		$playlist_numbers   = isset( $instance['playlist_numbers'] ) ? $instance['playlist_numbers'] : '1';
		$playlist_title_tag = isset( $instance['playlist_title_tag'] ) ? $instance['playlist_title_tag'] : 'span';
		$now_tag            = isset( $instance['now_tag'] ) ? $instance['now_tag'] : 'h5';
		$author_tag         = isset( $instance['author_tag'] ) ? $instance['author_tag'] : 'h6';
		$caption_tag        = isset( $instance['caption_tag'] ) ? $instance['caption_tag'] : 'h5';
		$cover_pos          = isset( $instance['cover_pos'] ) ? $instance['cover_pos'] : '';
		$icon_media_play    = isset( $instance['icon_media_play'] ) ? $instance['icon_media_play'] : '';
		$icon_media_pause   = isset( $instance['icon_media_pause'] ) ? $instance['icon_media_pause'] : '';
		$icon_media_volume  = isset( $instance['icon_media_volume'] ) ? $instance['icon_media_volume'] : '';
		$icon_media_mute    = isset( $instance['icon_media_mute'] ) ? $instance['icon_media_mute'] : '';
		$media              = isset( $instance['media'] ) ? $instance['media'] : array();
		$media_from_post    = isset( $instance['media_from_post'] ) ? $instance['media_from_post'] : '';

		// Get audio from post if parameter is empty
		if ( count( $media ) == 0 && (int) $media_from_post > 0 ) {
			$audio_from_post = trx_addons_get_post_audio_list_first();
			if ( ! empty( $audio_from_post ) ) {
				$media[] = $audio_from_post;
			} else {
				$audio_from_post = trx_addons_get_post_audio();
				if ( ! empty( $audio_from_post ) ) {
					$media[] = array(
						'url' => $audio_from_post
					);
				}
			}
		}

		// Load widget-specific scripts and styles
		trx_addons_widget_audio_load_scripts_front( true );

		// Load template
		trx_addons_get_template_part(
			TRX_ADDONS_PLUGIN_WIDGETS . 'audio/tpl.default.php',
			'trx_addons_args_widget_audio',
			apply_filters(
				'trx_addons_filter_widget_args',
				array_merge( $args, compact( 'title', 'subtitle', 'prev_btn', 'prev_text', 'prev_icon', 'next_btn', 'next_text', 'next_icon',
											'now_show', 'now_text', 'now_tag', 'author_tag', 'caption_tag',
											'track_time', 'track_scroll', 'track_volume', 'media',
											'playlist', 'playlist_numbers', 'playlist_title_tag', 'cover_pos',
											'icon_media_play', 'icon_media_pause', 'icon_media_volume', 'icon_media_mute' ) ),
				$instance, 'trx_addons_widget_audio'
			)
		);
	}

	/** Update the widget settings. */
	function update( $new_instance, $instance ) {
		$instance = array_merge( $instance, $new_instance );
		$instance['media'] = array();
		if ( is_array( $new_instance['media'] ) ) {
			for ( $i = 0; $i < count( $new_instance['media'] ); $i++ ) {
				if ( empty( $new_instance['media'][ $i ]['url'] ) && empty( $new_instance['media'][ $i ]['embed'] ) ) {
					continue;
				}
				if ( empty( $new_instance['media'][ $i ]['new_window'] ) ) {
					$new_instance['media'][ $i ]['new_window'] = 0;
				}
				$instance['media'][] = $new_instance['media'][ $i ];
			}
		}
		return apply_filters( 'trx_addons_filter_widget_args_update', $instance, $new_instance, 'trx_addons_widget_audio' );
	}

	/** Displays the widget settings controls on the widget panel. */
	function form( $instance ) {
		/* Remove empty media array */
		if ( isset( $instance['media'] ) && ( ! is_array( $instance['media'] ) || count( $instance['media'] ) == 0 ) ) {
			unset( $instance['media'] );
		}
		/* Set up some default widget settings */
		$instance = wp_parse_args(
			(array) $instance, apply_filters(
				'trx_addons_filter_widget_args_default', array(
					'title'        => '',
					'subtitle'     => '',
					'prev_btn'     => '1',
					'prev_text'    => '',
					'next_btn'     => '1',
					'next_text'    => '',
					'now_show'     => '1',
					'now_text'     => '',
					'track_time'   => '1',
					'track_scroll' => '1',
					'track_volume' => '1',
					'playlist'     => '1',
					'cover_pos'    => 'behind',
					'media'        => array(
						array(
							'url'         => '',
							'embed'       => '',
							'caption'     => '',
							'author'      => '',
							'description' => '',
							'cover'       => '',
						),
						array(
							'url'         => '',
							'embed'       => '',
							'caption'     => '',
							'author'      => '',
							'description' => '',
							'cover'       => '',
						),
					),
				), 'trx_addons_widget_audio'
			)
		);

		do_action( 'trx_addons_action_before_widget_fields', $instance, 'trx_addons_widget_audio', $this );

		$this->show_field(
			array(
				'name'  => 'title',
				'title' => __( 'Title:', 'trx_addons' ),
				'value' => $instance['title'],
				'type'  => 'text',
			)
		);

		do_action( 'trx_addons_action_after_widget_title', $instance, 'trx_addons_widget_audio', $this );

		$this->show_field(
			array(
				'name'  => 'subtitle',
				'title' => __( 'Subtitle:', 'trx_addons' ),
				'value' => $instance['subtitle'],
				'type'  => 'text',
			)
		);

		$this->show_field(
			array(
				'name'  => 'next_btn',
				'title' => __( 'Show next button:', 'trx_addons' ),
				'value' => $instance['next_btn'],
				'type'  => 'checkbox',
			)
		);

		$this->show_field(
			array(
				'name'  => 'prev_btn',
				'title' => __( 'Show prev button:', 'trx_addons' ),
				'value' => $instance['prev_btn'],
				'type'  => 'checkbox',
			)
		);

		$this->show_field(
			array(
				'name'  => 'next_text',
				'title' => __( 'Next button text:', 'trx_addons' ),
				'value' => $instance['next_text'],
				'type'  => 'text',
			)
		);

		$this->show_field(
			array(
				'name'  => 'prev_text',
				'title' => __( 'Prev button text:', 'trx_addons' ),
				'value' => $instance['prev_text'],
				'type'  => 'text',
			)
		);

		$this->show_field(
			array(
				'name'  => 'now_show',
				'title' => __( 'Show "Now Playing":', 'trx_addons' ),
				'value' => $instance['now_show'],
				'type'  => 'checkbox',
			)
		);

		$this->show_field(
			array(
				'name'  => 'now_text',
				'title' => __( '"Now playing" text:', 'trx_addons' ),
				'value' => $instance['now_text'],
				'type'  => 'text',
			)
		);

		$this->show_field(
			array(
				'name'  => 'track_time',
				'title' => __( 'Show tack time:', 'trx_addons' ),
				'value' => $instance['track_time'],
				'type'  => 'checkbox',
			)
		);

		$this->show_field(
			array(
				'name'  => 'track_scroll',
				'title' => __( 'Show track scroll bar:', 'trx_addons' ),
				'value' => $instance['track_scroll'],
				'type'  => 'checkbox',
			)
		);

		$this->show_field(
			array(
				'name'  => 'track_volume',
				'title' => __( 'Show track volume bar:', 'trx_addons' ),
				'value' => $instance['track_volume'],
				'type'  => 'checkbox',
			)
		);

		$this->show_field(
			array(
				'name'  => 'playlist',
				'title' => __( 'Show playlist:', 'trx_addons' ),
				'value' => $instance['playlist'],
				'type'  => 'checkbox',
			)
		);

		$this->show_field(
			array(
				'name'  => 'cover_pos',
				'title' => __( 'Cover position:', 'trx_addons' ),
				'value' => $instance['cover_pos'],
				'type'  => 'radio',
				'options' => array(
					'left' => __( 'Left', 'trx_addons' ),
					'behind' => __( 'Background', 'trx_addons' ),
					'right' => __( 'Right', 'trx_addons' ),
				)
			)
		);

		foreach ( $instance['media'] as $k => $item ) {
			$this->show_field(
				array(
					'name'  => sprintf( 'item%d', $k + 1 ),
					'title' => sprintf( __( 'Media item %d', 'trx_addons' ), $k + 1 ),
					'type'  => 'info',
				)
			);
			$this->show_field(
				array(
					'name'  => "media[{$k}][url]",
					'title' => __( 'Media URL:', 'trx_addons' ),
					'value' => $item['url'],
					'type'  => 'text',
				)
			);
			$this->show_field(
				array(
					'name'  => "media[{$k}][embed]",
					'title' => __( 'Embed code:', 'trx_addons' ),
					'value' => $item['embed'],
					'type'  => 'textarea',
				)
			);
			$this->show_field(
				array(
					'name'  => "media[{$k}][caption]",
					'title' => __( 'Audio caption:', 'trx_addons' ),
					'value' => $item['caption'],
					'type'  => 'text',
				)
			);
			$this->show_field(
				array(
					'name'  => "media[{$k}][author]",
					'title' => __( 'Author name:', 'trx_addons' ),
					'value' => $item['author'],
					'type'  => 'text',
				)
			);
			$this->show_field(
				array(
					'name'  => "media[{$k}][description]",
					'title' => __( 'Description:', 'trx_addons' ),
					'value' => $item['description'],
					'type'  => 'textarea',
				)
			);

			$this->show_field(
				array(
					'name'  => "media[{$k}][cover]",
					'title' => __( 'Cover image', 'trx_addons' ),
					'value' => $item['cover'],
					'type'  => 'image',
				)
			);
		}
		do_action( 'trx_addons_action_after_widget_fields', $instance, 'trx_addons_widget_audio', $this );
	}
}


// Load required styles and scripts for the frontend
if ( ! function_exists( 'trx_addons_widget_audio_load_scripts_front' ) ) {
	add_action( 'wp_enqueue_scripts', 'trx_addons_widget_audio_load_scripts_front', TRX_ADDONS_ENQUEUE_SCRIPTS_PRIORITY );
	add_action( 'trx_addons_action_pagebuilder_preview_scripts', 'trx_addons_widget_audio_load_scripts_front', 10, 1 );
	function trx_addons_widget_audio_load_scripts_front( $force = false ) {
		trx_addons_enqueue_optimized( 'widget_audio', $force, array(
			'css'  => array(
				'trx_addons-widget_audio' => array( 'src' => TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio.css' ),
			),
			'js'  => array(
				'trx_addons-widget_audio' => array( 'src' => TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio.js', 'deps' => 'jquery' ),
			),
			'check' => array(
				array( 'type' => 'sc',  'sc' => 'trx_widget_audio' ),
				array( 'type' => 'gb',  'sc' => 'wp:trx-addons/audio' ),
				array( 'type' => 'elm', 'sc' => '"widgetType":"trx_widget_audio"' ),
				array( 'type' => 'elm', 'sc' => '"shortcode":"[trx_widget_audio' ),
			)
		) );
	}
}

// Merge widget specific styles into single stylesheet
if ( ! function_exists( 'trx_addons_widget_audio_merge_styles' ) ) {
	add_filter( 'trx_addons_filter_merge_styles', 'trx_addons_widget_audio_merge_styles' );
	function trx_addons_widget_audio_merge_styles( $list ) {
		$list[ TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio.css' ] = false;
		return $list;
	}
}

// Merge widget specific scripts into single file
if ( ! function_exists( 'trx_addons_widget_audio_merge_scripts' ) ) {
	add_action( 'trx_addons_filter_merge_scripts', 'trx_addons_widget_audio_merge_scripts' );
	function trx_addons_widget_audio_merge_scripts( $list ) {
		$list[ TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio.js' ] = false;
		return $list;
	}
}

// Load styles and scripts if present in the cache of the menu
if ( !function_exists( 'trx_addons_widget_audio_check_in_html_output' ) ) {
	add_filter( 'trx_addons_filter_get_menu_cache_html', 'trx_addons_widget_audio_check_in_html_output', 10, 1 );
	add_action( 'trx_addons_action_show_layout_from_cache', 'trx_addons_widget_audio_check_in_html_output', 10, 1 );
	add_action( 'trx_addons_action_check_page_content', 'trx_addons_widget_audio_check_in_html_output', 10, 1 );
	function trx_addons_widget_audio_check_in_html_output( $content = '' ) {
		$args = array(
			'check' => array(
				'class=[\'"][^\'"]*widget_audio'
			)
		);
		if ( trx_addons_check_in_html_output( 'widget_audio', $content, $args ) ) {
			trx_addons_widget_audio_load_scripts_front( true );
		}
		return $content;
	}
}


// Add shortcodes
//----------------------------------------------------------------------------
require_once TRX_ADDONS_PLUGIN_DIR . TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio-sc.php';

// Add shortcodes to Elementor
if ( trx_addons_exists_elementor() && function_exists('trx_addons_elm_init') ) {
	require_once TRX_ADDONS_PLUGIN_DIR . TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio-sc-elementor.php';
}

// Add shortcodes to Gutenberg
if ( trx_addons_exists_gutenberg() && function_exists( 'trx_addons_gutenberg_get_param_id' ) ) {
	require_once TRX_ADDONS_PLUGIN_DIR . TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio-sc-gutenberg.php';
}

// Add shortcodes to VC
if ( trx_addons_exists_vc() && function_exists( 'trx_addons_vc_add_id_param' ) ) {
	require_once TRX_ADDONS_PLUGIN_DIR . TRX_ADDONS_PLUGIN_WIDGETS . 'audio/audio-sc-vc.php';
}
