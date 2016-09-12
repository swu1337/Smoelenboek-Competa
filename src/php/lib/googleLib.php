<?php

$client = new Google_Client();
$client->setAuthConfigFile(CLIENT_SECRETS);
$client->setRedirectUri(REDIRECT_URI);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->setPrompt('select_account');

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
	unset($_SESSION['login_error']);
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
$login_error = "";

if ( $client->getAccessToken() ) {
    $_SESSION['access_token'] = $client->getAccessToken();

    if(!$client->isAccessTokenExpired()) {
		$token_data = $client->verifyIdToken()->getAttributes();



	    if( !(isset($_SESSION["user_info"] ) && $_SESSION["user_info"]) ) {
			$url_user_info = "https://www.googleapis.com/oauth2/v1/userinfo?access_token=" . json_decode( $client->getAccessToken(), true)["access_token"];
			$req = new Google_Http_Request($url_user_info);
			$REST = new Google_Http_REST();
			$res = $REST->execute($client, $req);
			$_SESSION["user_info"] = $res;

			$result = $db->get_user_by_google_id($token_data['payload']['sub']);

			if(!$result) {
				$result = $db->get_user_by_email($token_data['payload']['email']);

				if( substr(strrchr($token_data['payload']['email'] , "@"), 1) === 'competa.com' || $result ) {
					include_once('php/lib/util.php');
				
					if(!$result) {
						$db->add_user(1, $token_data['payload']['email'], $token_data['payload']['sub'], 
						$_SESSION["user_info"]['given_name'], null, $_SESSION["user_info"]['family_name'], null, $_SESSION['user_info']['picture']);
					} else {	
						$result->set_google_sub($token_data['payload']['sub']);
						$db->update_user($result);
					}

				} else {
					header('Location: ' . filter_var(REDIRECT_URI  . '?error=true', FILTER_SANITIZE_URL));
					session_unset();
					$auth_url = $client->createAuthUrl();
				}
			}

			if($result) {
				if( (startsWith( $result->get_photo_path(), 'http' ) || $result->get_photo_path() == null) 
						&& $result->get_photo_path() != $_SESSION['user_info']['picture'] ) {
							$result->set_photo_path( $_SESSION['user_info']['picture'] );	
							$db->update_user($result);				
				}
			}

		}
    } else {
       	session_unset();
    	$auth_url = $client->createAuthUrl();
    }
}