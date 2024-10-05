<?php

    // url of database
    $host = "localhost";
    $user = "root";

    // info on database
    $password = "";
    $dbname = "alvarez";

    // connection to database
    $dsn = "mysql:host={$host};dbname={$dbname}";

    // establish connection
    $pdo = new PDO($dsn, $user, $password);
    $pdo->exec("SET time_zone = '+08:00';");

?>