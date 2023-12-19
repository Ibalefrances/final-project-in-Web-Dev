<?php



if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";

    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)){
        die("SQL error: ". $mysqli->error);
    }

    $stmt->bind_param("sss",
                        $_POST["name"],
                        $_POST["email"],
                        $_POST["password"]);

    if ($stmt->execute()){
       
        header("location: Login.html");
    }
    else{
        die($mssqli->error. " " . $mysqli->errno);
    }
}

?>