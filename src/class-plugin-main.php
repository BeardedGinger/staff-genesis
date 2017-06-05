<?php
/**
 * The main class for the plugin.
 *
 * @package staff-genesis
 */

// We always namespace with our company name.
namespace LimeCuda\Staff_Genesis;

/**
 * Pulls everything together for our plugin.
 */
class Main {

	/**
	 * Run the plugin.
	 */
	public function run() {

		// Get our files.
		$this->get_files();

		// Enqueue our assets.
		$assets = new Assets();
		$assets->enqueue();

	}

	/**
	 * Get all of our files for the plugin. I know I know... use an autoloader.
	 */
	private function get_files() {

		require_once( CCEF_COURSE_REGISTRATIONS_PLUGIN_DIR . 'src/class-plugin-assets.php' );
		require_once( CCEF_COURSE_REGISTRATIONS_PLUGIN_DIR . 'src/class-custom-content.php' );

	}
}
