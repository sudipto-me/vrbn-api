<?php

namespace Vrbn\Api;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();
    }

    /**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'vrbn_api_installed' );

        if ( ! $installed ) {
            update_option( 'vrbn_api_installed', time() );
        }

        update_option( 'vrbn_api_version', VRBN_API_VERSION );
    }
}
