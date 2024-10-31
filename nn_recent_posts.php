<?php

/**
 * @link              https://www.linkedin.com/in/amirkeshavarzreza/
 * @since             1.0.0
 * @package           NN_Recent_Posts
 *
 * @wordpress-plugin
 * Plugin Name:       NN Recent Posts
 * Plugin URI:        http://neginnet.com
 * Description:       Responsive and configurable display of your site's latest posts.
 * Version:           1.0.0
 * Author:            Amir Keshavarz
 * Author URI:        https://www.linkedin.com/in/amirkeshavarzreza/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nn_recent_posts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'NNRP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in inc/class-nn_recent_posts-activator.php
 */
function activate_nn_recent_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-nn_recent_posts-activator.php';
	nn_recent_posts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in inc/class-nn_recent_posts-deactivator.php
 */
function deactivate_nn_recent_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-nn_recent_posts-deactivator.php';
	nn_recent_posts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nn_recent_posts' );
register_deactivation_hook( __FILE__, 'deactivate_nn_recent_posts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'inc/class-nn_recent_posts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nn_recent_posts() {

	$plugin = new nn_recent_posts();
	$plugin->run();

}
run_nn_recent_posts();


//
/// NEGIN START
//

/**
 * Directory Constant
 */
define( 'nn_recent_posts_URL', plugins_url('/') . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'nn_recent_posts_DIR', plugin_dir_path( __FILE__ ) );
define( 'nn_recent_posts_BASENAME', plugin_basename( __FILE__ ) );


/**
 * Include files
 */
require_once( nn_recent_posts_DIR . 'inc/scripts.php' );
require_once( nn_recent_posts_DIR . 'inc/shortcodes.php' );

//
/// NEGIN END
//
