<?php 
namespace  DisablePaymentGateway\Admin;
use DisablePaymentGateway\Helpers; 

/**
 * The Menu handler class
 */
class Menu {

    /**
    * Option name
    *
    */
    public $_optionName  = 'dpgw_settings';

    /**
    * Option group
    *
    */
    public $_optionGroup = 'dpgw_options_group';

    /**
    * Default option
    *
    */
    public $_defaultOptions = [];

    /**
     * Initialize the class
     */
    function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        add_action( 'plugins_loaded', [ $this, 'set_default_options' ] );
        add_action( 'admin_init', [ $this, 'menu_register_settings' ] );
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu() {
        
        $parent_slug = 'disable-payment-gateway';
        $capability = 'manage_options';
        $icon_url = 'dashicons-cart';    

        $hook = add_menu_page( __( 'Disable Payment Gateway', 'disable-payment-gateway' ), __( 'Disable Payment Gateway', 'disable-payment-gateway' ), $capability, $parent_slug, [ $this, 'plugin_page' ], $icon_url, 45 );
        add_action( 'admin_head-' . $hook, [ $this, 'enqueue_assets' ] );

    }

    /**
     * Enqueue scripts and styles
     * 
     * @since 1.0.0
     * @param none
     * @return void
     */
    public function enqueue_assets() {
        // wp_enqueue_style( 'dpgw-admin-boostrap' );
        // wp_enqueue_style( 'dpgw-admin-style' );
        // wp_enqueue_script( 'dpgw-admin-script' );
    }

    /**
     * Display plugin page in admin area
     *
     * @since 1.0.0
     * @param none
     * @return void
     */
    public function plugin_page() {
        $template = __DIR__ . '/views/settings.php';

        if (file_exists($template)) {
            $product_types = Helpers::get_all_product_types();
            $payment_methods = Helpers::get_all_payment_methods();
            $settings = Helpers::get_settings();
            
            require_once $template;
        } else {
            echo $error_message = "Settings template not found.";
            // Handle the error message appropriately, such as logging or displaying it to the user.
        }
    }

    /**
	 * Save the setting options		
	 * 
	 * @since  1.0.0
	 * @param  none
     * @return void
	 */
	public function menu_register_settings() {
		add_option( $this->_optionName, $this->_defaultOptions );	
		register_setting( $this->_optionGroup, $this->_optionName );
	}

    /**
	 * Apply filter with default options
	 * 
	 * @since    1.0.0
	 * @param    none
     * @return void
	 */
	public function set_default_options() {
		return apply_filters( 'dpgw_default_options', $this->_defaultOptions );
	}

}
