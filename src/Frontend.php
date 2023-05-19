<?php
namespace DisablePaymentGateway;
use DisablePaymentGateway\Frontend\Storefront;

/**
 * Load classes for frontend functionality
 */
class Frontend {

    public function __construct() {
        new Storefront();
    }
}