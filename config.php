<?php

    session_start();

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "dbelcco";

    $conn = mysqli_connect($server, $user, $password, $database);

    if(!$conn) {
        die('Connection failed to database : ' . mysqli_connect_error());
    }   

?>  