<?php
define("ROOT_PATH", "/Smoelenboek-Competa");


//USER CONFIGURABLE
define("GOOGLE_API", "C:/Users/Geert/Documents/google-api-php-client/src/Google/autoload.php");
define("CLIENT_SECRETS", 'C:/Users/Geert/Documents/Client-Secret/Smoelenboek_client_secret.json');
define("MYSQL_CONNECT", 'mysql_connect.php');

define("REDIRECT_URI", 'http://' . $_SERVER['HTTP_HOST'] . ROOT_PATH . '/src/index.php');