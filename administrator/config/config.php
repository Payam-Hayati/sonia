<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sonia";

/*
$username = "pancom_usonia";
$password = "pPYZjg4pE";
$dbname = "pancom_dbsonia";
*/

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset( $conn, 'utf8' );
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 



