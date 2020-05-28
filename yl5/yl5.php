<?php
require 'crud/get.php';

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>So very cool API page!</title>
</head>

<body>

  <header class="container">
    <div class="row">
      <div class="col-sm-3"><a href="apis/merike.php">Merikese API</a></div>
      <div class="col-sm-3">menu item</div>
      <div class="col-sm-3">menu item</div>
      <div class="col-sm-3">menu item</div>
    </div>
  </header>

  <div class="container">
    <form action="crud/submit.php" method="post" id="addForm" enctype="multipart/form-data">
      <h2>Lisa uus</h2>
      <div class="form-group">
        <input type="text" name="title" id="title" placeholder="Nimi">
      </div>
      <div class="form-group">
        <input type="text" name="description" id="description" placeholder="Tõug">
      </div>
      <div class="form-group">
        <input type="text" name="nature" id="nature" placeholder="Iseloom">
      </div>
      <div class="form-group">
        <input type="text" name="appearance" id="appearance" placeholder="Välimiku iseloomustus">
      </div>
      <div class="form-group">
        <input type="file" name="pic" id="file">
      </div>
      <div class="form-group">
        <input type="submit" value="LISA" name="submit">
      </div>
    </form>
    <div id="result" class="col"></div>

  </div>
  <div id="data">

    <?php 
/*     $content = file_get_contents("crud/cache.json");
    var_dump($content); */
    $data = json_decode($content);
    foreach ($data as $i): 
      ?>
    <div class="container data">
      <img src="pics/<? echo $i->image ?>" alt="" class="image">
      <div>Nimi:
        <?echo $i->title ?>
      </div>
      <div>Tõug:
        <?echo $i->description ?>
      </div>
      <div>Iseloom:
        <?echo $i->nature ?>
      </div>
      <div>Välimiku iseloomustus:
        <?echo $i->appearance ?>
      </div>
    </div>

    <?php endforeach; ?>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>