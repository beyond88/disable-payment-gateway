<?php
/**
 *
 * @link              https://github.com/beyond88/disable-payment-gateway
 * @since             1.0.0
 * @package           DisablePaymentGateway
 *
 * @wordpress-plugin
 * Plugin Name:       Disable Payment Gateway Based on Product Type
 * Plugin URI:        https://github.com/beyond88/disable-payment-gateway
 * Description:       A bespoke plugin is to enable the selective disabling of a specific payment gateway in WooCommerce, based on the product type.
 * Version:           1.0.0
 * Author:            Mohiuddin Abdul Kader
 * Author URI:        https://github.com/beyond88
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       disable-payment-gateway
 * Domain Path:       /languages
 * Requires PHP:      5.6
 * Requires at least: 4.4
 * Tested up to:      6.2
 *
 * WC requires at least: 3.1
 * WC tested up to:   7.7.0
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';
/**
 * The main plugin class
 */
final class DisablePaymentGateway {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0.0';

    /**
     * Class constructor
     */
    private function __construct() {
        
        //REMOVE THIS AFTER DEV
        error_reporting(E_ALL ^ E_DEPRECATED);

        $this->define_constants();

        register_activation_hook( DPGW_FILE, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \DisablePaymentGateway
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
        define( 'DPGW_VERSION', self::version );
        define( 'DPGW_FILE', __FILE__ );
        define( 'DPGW_PATH', __DIR__ );
        define( 'DPGW_URL', plugins_url( '', DPGW_FILE ) );
        define( 'DPGW_ASSETS', DPGW_URL . '/assets' );
        define( 'DPGW_BASENAME', plugin_basename( __FILE__ ) );
        define( 'DPGW_PLUGIN_NAME', 'Disable Payment Gateway Based on Product Type' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {

        new DisablePaymentGateway\DisablePaymentGatewayi18n();

        if ( is_admin() ) {
            new DisablePaymentGateway\Admin();
        }

        new DisablePaymentGateway\Frontend();

    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new DisablePaymentGateway\Installer();
        $installer->run();
    }
}

/**
 * Bootstrap the plugin
 */
function disable_payment_gateway() {
    return DisablePaymentGateway::init();
}

// Fly
disable_payment_gateway();