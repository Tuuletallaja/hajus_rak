<?php
require 'crud/database.php';

$attr = [];
foreach($_GET as $key => $value) {
    $attr[$key] = $value;
}


if (empty($attr)) {
    die('Query failed, attributes missing');
}

$limit = $attr['limit'];



$sql = "SELECT * from yl5 limit $limit";
$items = [];

$result = $conn->query($sql);
while($r = mysqli_fetch_assoc($result)) {
    $img_link = 'https://ta18aru.itmajakas.ee/hajusrak/yl5/pics/'.$r['image'];
    $r['image'] = $img_link;

    $items[] = $r;
}

$content = json_encode($items, JSON_UNESCAPED_UNICODE);

print $content;