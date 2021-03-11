<?php
    //Se connecter à la BDD
    include("db_connect.php");
    global $conn;

    $users_id = mysqli_real_escape_string($conn, $_GET["users_id"]);
    $response = array();
    $result = mysqli_query($conn, "SELECT * FROM vm WHERE users_id='$users_id'");
    while($row = $result->fetch_assoc())
    {
      $response[] = $row;
    }
    header('Content-Type: text/html');
    echo "{\"VM\":".json_encode($response[0], JSON_PRETTY_PRINT)."}";
?>