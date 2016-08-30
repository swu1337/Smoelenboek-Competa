<?php
//USER CONFIGURABLE
define("PROJECT_ROOT", "/Smoelenboek-Competa");
define("GOOGLE_API", "../../../google-api-php-client/src/Google/autoload.php");
define("CLIENT_SECRETS", 'C:/Users/Nick/XAMPP/smoelenboek_secure/client_secrets.json');

define("REDIRECT_URI_LOGGEDIN", 'http://' . $_SERVER['HTTP_HOST'] . PROJECT_ROOT . '/src/php/home.php');
define("REDIRECT_URI_LOGGEDOUT", 'http://' . $_SERVER['HTTP_HOST'] . PROJECT_ROOT . '/src/index.php');