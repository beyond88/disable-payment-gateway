<?php

namespace DisablePaymentGateway\Admin;

/**
 * Inject all backend handler classes
 */
class Main 
{

	public function __construct() {
		//Menu::init();
		new Menu();
	}    
    
}
