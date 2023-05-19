<?php 
namespace  DisablePaymentGateway\Admin;


/**
 * The Menu handler class
 */
class Menu {

    /**
    * Plugin main file
    *
    */
    public $main;

    /**
     * Initialize the class
     */
    function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
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
        wp_enqueue_style( 'dpgw-admin-boostrap' );
        wp_enqueue_style( 'dpgw-admin-style' );
        wp_enqueue_script( 'dpgw-admin-script' );
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

        if ( file_exists( $template ) ) {
            include $template;
        }
    }

}
