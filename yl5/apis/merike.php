<?php
$fileName = 'merike.json';
$cacheTime = 2;
print $data;
$data;

/* file_put_contents('merike.json', $data);
 */
if (file_exists($fileName) && (time() - filemtime($fileName) < $cacheTime) ) {
    $data = file_get_contents($fileName);
    /* die(var_dump($content)); */
    
} else {
    $data = file_get_contents("https://ta18toose.itmajakas.ee/Hajusrakendused/lemmikAPI/api.php?limit=14");
    
    /* die(var_dump($result)); */
    if (!$data) {
        return;
    }
    
    file_put_contents($fileName, $data);
    /* die(var_dump($data)); */
    
}

?>

<?php 

foreach (json_decode($data) as $i):?>
    <div class="container data img-thumbnail">
      <img src="<? echo $i->image ?>" alt="" class="image" style="width: auto; height:300px">
      <div>Nimi:
        <?echo $i->title ?>
      </div>
      <div>Kirjeldus: 
        <?echo $i->description ?>
      </div>
      <div>Raskus:
        <?echo $i->difficulty ?>
      </div>
      <div>Loodud:
        <?echo $i->made_at ?>
      </div>
    </div>
<?php endforeach ?>