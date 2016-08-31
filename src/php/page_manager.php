<?php
if( isset($_SESSION["access_token"]) && $_SESSION["access_token"] ){
	$page = isset($_GET['p']) ? $_GET['p'] : "home";
	switch( $page ) {	
		case "add_user":
			require_once("pages/add_user.php");
			break;
		default:
			require_once("pages/home.php");
			break;
	}
}
else {
	require_once("pages/login.php");
}