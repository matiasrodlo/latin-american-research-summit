<?php

if ( ! function_exists( 'protalks_core_add_import_sub_page_to_list' ) ) {
	/**
	 * Function that add additional sub-page item into welcome page list
	 *
	 * @param array $sub_pages
	 *
	 * @return array
	 */
	function protalks_core_add_import_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'ProTalksCore_Dashboard_Import_Page';

		return $sub_pages;
	}

	add_filter( 'protalks_core_filter_add_welcome_sub_page', 'protalks_core_add_import_sub_page_to_list', 11 );
}

if ( class_exists( 'ProTalksCore_Dashboard_Sub_Page' ) ) {
	class ProTalksCore_Dashboard_Import_Page extends ProTalksCore_Dashboard_Sub_Page {

		public function __construct() {
			parent::__construct();
		}

		public function add_sub_page() {
			$this->set_base( 'import' );
			$this->set_title( esc_html__( 'Import', 'protalks-core' ) );
			$this->set_atts( $this->set_atributtes() );
		}

		public function set_atributtes() {
			$params = array();

			$iparams = ProTalksCore_Dashboard::get_instance()->get_import_params();
			if ( is_array( $iparams ) && isset( $iparams['submit'] ) ) {
				$params['submit'] = $iparams['submit'];
			}

			return $params;
		}
	}
}
