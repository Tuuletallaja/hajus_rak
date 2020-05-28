<?php

//mysql query for get markers

$servername = "";
$username = "";
$password = "";
$database = "";

/* echo 'hei'; */

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}


// Perform query
if ($result = $mysqli -> query("SELECT * FROM markers")) {

    $places =[];
    while($r = mysqli_fetch_assoc($result)) {
        $places[] = $r;
    }
    echo json_encode($places);
}

$mysqli -> close();
/* 
$places = [
    ['lat' => 58.247537, 'lng' => 22.479283],
    ['lat' => 58.247537, 'lng' => 22.48],
    ['lat' => 58.25, 'lng' => 22.48],
]; */
