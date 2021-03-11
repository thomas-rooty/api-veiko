<?php
    //Se connecter à la BDD
    include("db_connect.php");
    global $conn;

    //$users_name = mysql_escape_string($GET_['users_name']);
    //$users_password = mysql_escape_string($GET_['users_password']);

    $users_name = mysqli_real_escape_string($conn, $_GET["users_name"]);
    $users_password = mysqli_real_escape_string($conn, $_GET["users_password"]);
    
    $squery = mysqli_query($conn, "SELECT * FROM users WHERE users_name='$users_name' AND user_group='administrateur'");
    $query = mysqli_fetch_array($squery);
    $rowcount = mysqli_num_rows($squery);

    if($rowcount == 1)
    {
      if(md5($users_password) != md5($query['users_password'])) {
        echo 'PasswordError';
      }
      else {
        echo 'LoginSuccess';
      }
    }
    else {
      echo 'AccountNotRegistered';
    }
?>