<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '1412197915693078',
            'client_secret' => '88140493a47ab7b5ac0f2af3ed281ec1',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),		

        'Google' => array(
		    'client_id'     => '157114228151-knu6s4sj30l30gg7h98a5bdign842052.apps.googleusercontent.com',
		    'client_secret' => 'zTtos-7KiNgS7QPNr_12DE1L',
		    'scope'         => array('userinfo_email', 'userinfo_profile'),
		),  

	)

);