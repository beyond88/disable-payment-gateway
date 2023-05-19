<?php

namespace DisablePaymentGateway;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     *
     * @since 1.0.0
     * @param none
     * @return void
     */
    public function run() {
        $this->add_version();
    }

    /**
     * Add time and version on DB
     * 
     * @since 1.0.0
     * @param none
     * @return void
     */
    public function add_version() {
        $installed = get_option( 'dpgw_installed' );

        if ( ! $installed ) {
            update_option( 'dpgw_installed', time() );
        }

        update_option( 'dpgw_version', DPGW_VERSION );
    }

}