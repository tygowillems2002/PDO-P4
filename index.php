<?php
    $host = "localhost:3306";
    $user = "root";
    $db = "winkel1";
    $pass = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
    }
?>