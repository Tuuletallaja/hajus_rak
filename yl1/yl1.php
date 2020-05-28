
<?php

$url = 'http://api.openweathermap.org/data/2.5/group?id=590939,591632,592225,588335&units=metric&appid=ADD_API_KEY_HERE';
$fileName = './cache.json';
$cacheTime = 360;

if ( file_exists($fileName) && (time() - filemtime($fileName) < $cacheTime) ) {
    $content = file_get_contents($fileName);
    //die(var_dump(time() - filemtime($fileName)));
    //die(var_dump($content));
} else {
    $content = file_get_contents($url);
    //die(var_dump($content));

    file_put_contents($fileName, $content);

}


$json = json_decode($content);
//die(print_r($content));

$cityList = $json->list;

//die(var_dump($test));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hetke ilm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="cityContainer">
        <?php foreach ($cityList as $city): ?>
        
        <div class="city">
            <div id="name">
                <div><?php echo $city->name; ?></div>
                <img src="http://openweathermap.org/img/wn/<?php echo $city->weather[0]->icon;?>.png">
            </div>
            
            <div id="date">Andmed: <?php echo date('d.m', $city->dt); ?> kell <?php echo date('H:i:s', $city->dt); ?></div>
            
            <div class="description">
                <div>Temperatuur: <?php echo $city->main->temp ?></div>
                <div>Tuulekülm: <?php echo $city->main->feels_like ?></div>
            </div>
        </div>
        
        <?php endforeach; ?>
    </div>
</body>
</html>

