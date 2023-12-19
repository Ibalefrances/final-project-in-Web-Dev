<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();
    
    if ($user) {
       if ( $_POST["password"] == $user["password"]){

        header("location: http://127.0.0.1:5500/ibale-HP.html");
        
       } 
    }

    echo 'Login Invalid';

}

?>