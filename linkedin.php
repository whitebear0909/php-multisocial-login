<?php
/*$url = urldecode("https://www.linkedin.com/oauth/v2/authorization?client_id=81opa4yl3xr5xw&redirect_uri=http%3A%2F%2Flocalhost%3A8080%2Fhybridauth%2Findex.php%3Fhauth.done%3DLinkedIn&response_type=code&scope=r_liteprofile+r_emailaddress+w_member_social&state=603bca9603bfa83cfc07a169f865efa7e5ab4b01d700fef5fda24d72da75a09b");
print_r($url);
die;*/
echo "LinkedIn Login...";
$provider_name = "LinkedIn";

try
{
	// inlcude HybridAuth library
	// change the following paths if necessary
	echo $config   = dirname(__FILE__) . '/hybridauth/config.php';
	require_once( "hybridauth/Hybrid/Auth.php" );

	// initialize Hybrid_Auth class with the config file
	$hybridauth = new Hybrid_Auth( $config );

	// try to authenticate with the selected provider
	$adapter = $hybridauth->authenticate( $provider_name );

	// then grab the user profile
	$user_profile = $adapter->getUserProfile();
}
// something went wrong?
catch( Exception $e )
{
	header("Location: http://www.example.com/login-error.php");
}

echo "<pre>";
print_r($user_profile);	