<?php
require_once realpath( __DIR__ ) . '/Autoload.php';

TechAPIAutoloader::register();

use TechAPI\Constant;
use TechAPI\Client;
use TechAPI\Auth\ClientCredentials;

// config api
Constant::configs(array(
	// 'mode'            => Constant::MODE_LIVE,
	'mode'            => Constant::MODE_SANDBOX,
	'connect_timeout' => 15,
	'enable_cache'    => false,
	'enable_log'      => true,
	'log_path'        => realpath( __DIR__ ) . '/logs',
));


// config client and authorization grant type
function getTechAuthorization() {
	$client = new Client(
		'B5c08EEb4409fda936f8ce35f33eb3e696c56De8',
		'c27f3f91B167244A809aef2c5cec6Fe2a4d4afc36E7599936eff182ea919093b7239d8eb',
		array( 'send_brandname', 'send_brandname_otp' ) // array('send_brandname', 'send_brandname_otp')
	);

	return new ClientCredentials( $client );
}
