<?php    // Database connection
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'kanyavee-2';
    $con = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_error()) {
        echo("Failed to connect MySQL: " . mysqli_connect_error());
        exit();
    }
    // echo "Connected successfully";
?>
