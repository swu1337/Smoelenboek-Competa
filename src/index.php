<?php
session_start();

require_once('php/constants.php');
require_once(GOOGLE_API);
include_once("php/lib/googleLib.php");

require_once('php/database/dbmanager.php');

$db = new DBManager();
include_once('php/page_manager.php');
