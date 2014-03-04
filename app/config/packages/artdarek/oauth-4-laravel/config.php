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
		    'client_id'     => '380222797157-umphsddkl23s7ihgrtva6tiqn7d9cjd1.apps.googleusercontent.com',
		    'client_secret' => '8hRlh1H9mzXd99d3b_r6HW5O',
		    'scope'         => array('userinfo_email', 'userinfo_profile'),
		),  

	)

);