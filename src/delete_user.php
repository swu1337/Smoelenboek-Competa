<?php
   require_once('php/database/dbmanager.php');

   $db = new DBManager();

   if(!empty($_POST['id'])) {
       $db->delete_user($_POST['id']);
   }
?>
