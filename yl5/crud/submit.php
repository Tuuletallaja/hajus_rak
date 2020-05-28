<?php
/* die('submit'); */

require 'database.php';
require 'upload.php';



$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$nature = filter_input(INPUT_POST, 'nature', FILTER_SANITIZE_STRING);
$appearance = filter_input(INPUT_POST, 'appearance', FILTER_SANITIZE_STRING);
$filename = $_FILES['pic']['name'];

if (empty($title) || empty($description) || empty($nature) || empty($appearance) || empty($filename)) {
  die('<h1 style="color: red">Palun täida kõik väljad ja vali fail</h1>');
}

$filename = time()."_".$filename;

$sql = "INSERT INTO yl5 (title, description, nature, appearance, image)
VALUES ('$title', '$description', '$nature', '$appearance', '$filename')";

if ($conn->query($sql) === TRUE) {
  uploadFile();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


/* 
try {
    $conn->exec($sql);
    uploadFile();
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
$conn = null; */
header('Location: ../yl5.php');