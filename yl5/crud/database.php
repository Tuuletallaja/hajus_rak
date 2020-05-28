<?php

$servername = "";
$username = "";
$password = "";
$database = "";

/* echo 'hei'; */

$conn = new mysqli($servername, $username, $password, $database);
mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}