<?php

$client = new Google_Client();
$client->setAuthConfigFile(CLIENT_SECRETS);
$client->setRedirectUri(REDIRECT_URI_LOGGEDOUT);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

/**
 * Clear local access token on log out
 **/
if (isset($_REQUEST['logout']) ) {
	unset($_SESSION['access_token']);
	header('Location: ' . filter_var(REDIRECT_URI_LOGGEDOUT, FILTER_SANITIZE_URL));
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
	$redirect_uri = REDIRECT_URI_LOGGEDIN;
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

/**
 * If access token is present,
 *  - set access token in client object, 
 * Otherwise
 *	- Redirect
 **/
if ( isset($_SESSION['access_token']) && $_SESSION['access_token'] ) {
	$client->setAccessToken($_SESSION['access_token']);
} else {
	require_once('util.php');
	if( !endsWith($_SERVER["SCRIPT_FILENAME"], "index.php") ) {
		header('Location: ' . filter_var(REDIRECT_URI_LOGGEDOUT, FILTER_SANITIZE_URL));
	}
	$auth_url = $client->createAuthUrl();
}

/**
 * If we have the access token,
 *  - put the access token back into the session storage
 *  - Verify the ID Token and get the attributes
 **/
if ( $client->getAccessToken() ) {
	$_SESSION['access_token'] = $client->getAccessToken();
	$token_data = $client->verifyIdToken()->getAttributes();
}

?>
<div class="box">
	<div class="request">
		<?php
		/**
		 * Create Login/Logout buttons
		 **/
		if (isset($auth_url)) {
			echo "<a class='login' href='" . $auth_url . "'>Login</a>";
		} else {
			echo "<a class='logout' href='?logout'>Logout</a>";
		}
		?>
 	</div>

	 <div class="data">
	 	<?php
		 	if ( isset($token_data) ) {
				 var_dump($token_data);
			 }
		?>
	 </div>
</div>