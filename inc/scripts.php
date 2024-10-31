<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

/**
 * Scripts and styles
 */
class NNRP_Scripts_AND_Style{

	/**
	 * Script version number
	 */
	protected $version;

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->version = '20170502';

		add_action( 'wp_enqueue_scripts', array( $this, 'nnrp_front_scripts_styles' ) );
	}

	/**
	 * Front Scripts
	 */
	public function nnrp_front_scripts_styles() {
		// CSS Files
		wp_enqueue_style( 'nn-recent-posts-style', nn_recent_posts_URL . 'assets/style.css', false, $this->version );

		//JS Files
		//wp_enqueue_script( 'jquery-magnific-popup', nn_recent_posts_URL . 'assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), $this->version, true );
	}


}
new NNRP_Scripts_AND_Style();