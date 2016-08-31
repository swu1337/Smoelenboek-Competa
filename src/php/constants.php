<?php
define("ROOT_PATH", "/Smoelenboek-Competa");


//USER CONFIGURABLE
define("GOOGLE_API", "C:/Users/gebruiker/Documents/google-api-php-client/src/Google/autoload.php");
define("CLIENT_SECRETS", 'C:/Users/gebruiker/Documents/Client_secrets/Smoelenboek/client_secrets.json');
define("MYSQL_CONNECT", 'mysql_connect.php');

define("REDIRECT_URI", 'http://' . $_SERVER['HTTP_HOST'] . ROOT_PATH . '/src/index.php');
