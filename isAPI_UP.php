<?php
    //Se connecter à la BDD
    include("db_connect.php");
    global $conn;
    if ($conn) {
      echo 'UP';
    } else {
      echo 'DOWN';
    }
?>