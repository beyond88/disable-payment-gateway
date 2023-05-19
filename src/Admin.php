<?php

namespace DisablePaymentGateway;

/**
 * Load classes for backend functionality
 *
 */
class Admin {

    /**
     * Load backend required classes
     *
     * @param none
     * @return object
    */
    public function __construct() {
        new Admin\Main();
    }

}