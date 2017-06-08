<?php
/**
 * Plugin Name:         Staff for Genesis
 * Plugin URI:          https://fewerthanthree.com
 * Description:         Create a seamless "Staff" section for your Genesis powered site.
 * Author:              LimeCuda
 * Version:             0.2.0
 * Author URI:          https://fewerthanthree.com
 * GitHub Plugin URI:   https://github.com/BeardedGinger/staff-genesis
 *
 * @package staff-genesis
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( 'vendor/autoload.php' );

if ( ! defined( 'LIMECUDA_STAFF_GENESIS_VERSION' ) ) {
	define( 'LIMECUDA_STAFF_GENESIS_VERSION', '0.2.0' );
}

if ( ! defined( 'LIMECUDA_STAFF_GENESIS_PLUGIN_DIR' ) ) {
	define( 'LIMECUDA_STAFF_GENESIS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'LIMECUDA_STAFF_GENESIS_PLUGIN_URL' ) ) {
	define( 'LIMECUDA_STAFF_GENESIS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
}

/**
 * Run our plugin!
 */
function hello_lc_staff_genesis() {

	require_once( LIMECUDA_STAFF_GENESIS_PLUGIN_DIR . 'src/class-plugin-main.php' );

	$staff_genesis = new LimeCuda\Staff_Genesis\Main();
	$staff_genesis->run();

}

hello_lc_staff_genesis();
