<?php
//parameter to connect to the database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "smdc_db";

//connect to the database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);


if (!$conn) {
    die("Could not connect to the Database");
}
