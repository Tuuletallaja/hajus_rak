<?php
$servername = "";
$username = "";
$password = "";
$database = "";

/* echo 'hei'; */

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$lat = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$lng = filter_input(INPUT_POST, 'lng', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$name = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

$sql = "INSERT INTO markers ( name, description, lat, lng) 
VALUES ('$name','$description','$lat','$lng')";

$send = mysqli_query($conn, $sql);

header("Location: yl2.php");