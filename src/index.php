<!DOCTYPE HTML>
<html>
<head>
	<title>Competa Smoelenboek</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../build/css/style.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
session_start();

require_once('php/constants.php');
require_once(GOOGLE_API);
require_once('php/database/dbmanager.php');
$db = new DBManager();

include_once("php/lib/googleLib.php");
define('ROOT_P', str_replace("\\", "/", dirname (__FILE__)));

include_once('php/page_manager.php');

?>

<script type="text/javascript" src="../build/js/app.min.js"></script>
</body>
</html>