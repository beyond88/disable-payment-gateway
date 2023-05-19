<?php

namespace DisablePaymentGateway;

/**
 * Helpers class
 */
class Helpers {

    /**
    * Option name
    *
    */
    public static $_optionName  = 'dpgw_settings';

    /**
    * Option group
    *
    */
    public static $_optionGroup = 'dpgw_options_group';

    /**
    * Default option
    *
    */
    public static $_defaultOptions = [];

    /**
     * Get all woocommerce product types
     * 
     * @since 1.0.0
     * @param none
     * @return array
     */
    public static function get_all_product_types() {
        $product_types = wc_get_product_types();
        return $product_types ?: [];
    }

    /**
     * Get all enabled payment methods
     * 
     * @since 1.0.0
     * @param none
     * @return array
     */
    public static function get_all_payment_methods() {
        $payment_methods = WC()->payment_gateways()->payment_gateways();
        return $payment_methods ?: [];
    }

	/**
	 * Get options
	 * 
	 * @since    1.0.0
	 * @param    none
	 */	
	public static function get_settings() {
		return wp_parse_args( get_option(self::$_optionName), self::$_defaultOptions );
	}

}