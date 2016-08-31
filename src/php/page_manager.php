<?php
if( isset($_SESSION["access_token"]) && $_SESSION["access_token"] ){
	$page = isset($_GET['p']) ? $_GET['p'] : "default";
	switch( $page ) {	
		case "add":
			require_once("pages/add.php");
			break;
		case "delete":
			require_once("pages/delete.php");
			break;
		default:
			require_once("pages/default.php");
			break;
	}
}
else {
	require_once("pages/login.php");
}