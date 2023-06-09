<?php
namespace DisablePaymentGateway;

/**
 * Support language
 * 
 * @since    1.0.0
 */ 
class DisablePaymentGatewayi18n 
{

	/**
	* Call language method 
	*
	* @since    1.0.0
	*/
    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'load_plugin_textdomain' ] );
    }

	/**
	* Load language file from directory
	*
	* @since    1.0.0
	*/
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'disable-payment-gateway',
			false,
			dirname( dirname( SAMPLY_BASENAME ) ) . '/languages/'
		);

	}

}