<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/amirkeshavarzreza/
 * @since      1.0.0
 *
 * @package    nn_recent_posts
 * @subpackage nn_recent_posts/inc
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    nn_recent_posts
 * @subpackage nn_recent_posts/inc
 * @author     Amir Keshavarz <amirkeshavarzreza@gmail.com>
 */
class nn_recent_posts_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'nn_recent_posts',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
