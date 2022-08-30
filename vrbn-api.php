<?php
/**
 * Plugin Name: VRBN Api
 * Description: Sets of dedicated apis for vrbn eshop
 * Plugin URI: https://selise.ch/
 * Author: Selise Digital Platforms
 * Author URI: https://selise.ch/
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Vrbn_Api {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';

	/**
	 * Class construcotr
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, [ $this, 'activate' ] );

		add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return \Vrbn_Api
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define the required plugin constants
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'VRBN_API_VERSION', self::version );
		define( 'VRBN_API_FILE', __FILE__ );
		define( 'VRBN_API_PATH', __DIR__ );
		define( 'VRBN_API_URL', plugins_url( '', VRBN_API_FILE ) );
		define( 'VRBN_API_ASSETS', VRBN_API_URL . '/assets' );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {

//		new WeDevs\Academy\Assets();
//
//		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
//			new WeDevs\Academy\Ajax();
//		}
//
//		if ( is_admin() ) {
//			new WeDevs\Academy\Admin();
//		} else {
//			new WeDevs\Academy\Frontend();
//		}
//
		new Vrbn\Api\API();
	}

	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function activate() {
		$installer = new Vrbn\Api\Installer();
		$installer->run();
	}
}

/**
 * Initializes the main plugin
 *
 * @return \Vrbn_Api
 */
function vrbn_api() {
	return Vrbn_Api::init();
}

// kick-off the plugin
vrbn_api();
