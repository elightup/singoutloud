<?php
require_once realpath( __DIR__ ) . '/Autoload.php';

TechAPIAutoloader::register();

use TechAPI\Constant;
use TechAPI\Client;
use TechAPI\Auth\ClientCredentials;

// config api
Constant::configs(array(
	'mode'            => Constant::MODE_LIVE, // Môi trường thực
	// 'mode'            => Constant::MODE_SANDBOX, // Môi trường demo
	'connect_timeout' => 15,
	'enable_cache'    => false,
	'enable_log'      => true,
	'log_path'        => realpath( __DIR__ ) . '/logs',
));


// config client and authorization grant type
function getTechAuthorization() {
	$client = new Client(
		// Client ID và Secret môi trường demo
		// 'B5c08EEb4409fda936f8ce35f33eb3e696c56De8',
		// 'c27f3f91B167244A809aef2c5cec6Fe2a4d4afc36E7599936eff182ea919093b7239d8eb',
		// Client Secret môi trường Live
		'd54d2c0680743E7f466c050e927065b7e445cf20',
		'887319ebf3168613Cef370f3e224b1a447da7001fcf290b485e55571D20eC35F8749bb63',
		array( 'send_brandname', 'send_brandname_otp' )
	);

	return new ClientCredentials( $client );
}
