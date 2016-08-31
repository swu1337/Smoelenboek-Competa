<?php
define("ROOT_PATH", "/Smoelenboek-Competa");


//USER CONFIGURABLE
define("GOOGLE_API", "../../../google-api-php-client/src/Google/autoload.php");
define("CLIENT_SECRETS", 'C:/Users/Nick/XAMPP/smoelenboek_secure/client_secrets.json');
define("MYSQL_CONNECT", 'mysql_connect.php');

define("REDIRECT_URI", 'http://' . $_SERVER['HTTP_HOST'] . ROOT_PATH . '/src/index.php');