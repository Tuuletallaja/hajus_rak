<?php 
require 'database.php';

$fileName = '../cache.json';
$cacheTime = 2;
$sql_get = "select * from yl5";
$content;


if (file_exists($fileName) && (time() - filemtime($fileName) < $cacheTime) ) {
    $content = file_get_contents($fileName);
    /* die(var_dump($content)); */
    
} else {
    $result = $conn->query($sql_get);
    
    /* die(var_dump($result)); */
    if (!$result) {
        return;
    }
    
    while($r = mysqli_fetch_assoc($result)) {
        $items[] = $r;
        /* var_dump($r); */
    }
    
    $content = json_encode($items);
    /* $jsonData = json_encode($items, JSON_UNESCAPED_UNICODE); */
    
    file_put_contents($fileName, $content);
    /* die(var_dump($content)); */
    
}

$conn->close();

