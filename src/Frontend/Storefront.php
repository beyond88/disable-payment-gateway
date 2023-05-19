<?php 
namespace  DisablePaymentGateway\Frontend;
use DisablePaymentGateway\Helpers;

/**
 * This classs is responsible to handle 
 * frontend functionality
 *
 */
class Storefront {

    /**
     * Unset payment methods for the selected product types
     * 
     * @since 1.0.0
     * @param none
     * @return void
     */
    public function __construct() {
        add_filter( 'woocommerce_available_payment_gateways', [ $this, 'unset_gateway_by_products' ], PHP_INT_MAX );
    }
 
    /**
     * Unset payment methods for the selected product types
     * 
     * @since 1.0.0
     * @param array
     * @return array
     */
    public function unset_gateway_by_products( $available_gateways ) {
        

        if ( ! is_checkout() ) return $available_gateways;

        $settings = Helpers::get_settings();
        $target_product_type = $settings['product_type'];
        $target_payment_method = $settings['payment_gateway'];
        $unset = false;

        if( Helpers::check_is_in_cart( $target_product_type ) ) {
            $unset = true;
        }

        if ($unset) {
            unset($available_gateways[$target_payment_method]);
        }
        return $available_gateways;

    }
}