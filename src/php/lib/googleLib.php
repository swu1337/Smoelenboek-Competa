<?php

$client = new Google_Client();
$client->setAuthConfigFile(CLIENT_SECRETS);
$client->setRedirectUri(REDIRECT_URI);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

/**
 * Clear local access token on log out
 **/
if (isset($_REQUEST['logout']) ) {
	session_unset();
	header('Location: ' . filter_var(REDIRECT_URI, FILTER_SANITIZE_URL));
}


/**
 * If the authentication code is present,
 *   - Get the Access Token with authenticate()
 *   - Set in Session superglobal 
 *   - Redirect
 **/

if ( isset($_GET['code']) ) {
	$client->authenticate($_GET['code']);
	$_SESSION['access_token'] = $client->getAccessToken();
	header('Location: ' . filter_var(REDIRECT_URI, FILTER_SANITIZE_URL));
}

/**
 * If access token is present,
 *  - set access token in client object, 
 * Otherwise
 *	- Redirect
 **/
if ( isset($_SESSION["access_token"]) && $_SESSION["access_token"]  ) {
	$client->setAccessToken($_SESSION['access_token']);
} else {
	$auth_url = $client->createAuthUrl();
}

/**
 * If we have the access token,
 *  - put the access token back into the session storage
 *  - Verify the ID Token and get the attributes
 **/
if ( $client->getAccessToken() ) {
	$_SESSION['access_token'] = $client->getAccessToken();

	if(!$client->isAccessTokenExpired()) {
		$token_data = $client->verifyIdToken()->getAttributes();
	} else {
		session_unset();
		$auth_url = $client->createAuthUrl();
	}
}
?>