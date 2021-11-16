<?php

$serverName = "localhost:3307";
$username = "root";
$password = "";
$dbName = "computer_store";

$conn = mysqli_connect($serverName, $username, $password, $dbName);

if(!$conn) {
    die("Connection to the database failed: ".mysqli_connect_error());
}

