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

		add_action( 'genesis_init', array( $this, 'template_adjustments' ), 20 );

	}

	/**
	 * Get all of our files for the plugin. I know I know... use an autoloader.
	 */
	private function get_files() {

		require_once( LIMECUDA_STAFF_GENESIS_PLUGIN_DIR . 'src/class-plugin-assets.php' );
		require_once( LIMECUDA_STAFF_GENESIS_PLUGIN_DIR . 'src/class-custom-content.php' );
		require_once( LIMECUDA_STAFF_GENESIS_PLUGIN_DIR . 'src/includes/acf-meta.php' );
		require_once( LIMECUDA_STAFF_GENESIS_PLUGIN_DIR . 'src/class-template-adjustments.php' );

	}

	/**
	 * Genesis template adjustments to make sure they trigger at the right time.
	 */
	public function template_adjustments() {

		$adjustments = new Template_Adjustments();
		$adjustments->adjust_it();

	}
}
