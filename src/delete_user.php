<?php
    require_once('dbmanager.php');
    $db = new DBManager();

    if(!empty($_GET['id'])) {
        //$db->delete_user($_GET['id']);
        echo 'asd';
    }
    else{
        echo 'hi';
    }
?>
