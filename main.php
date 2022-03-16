<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://kit.fontawesome.com/6f3d41182b.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Gerechten app</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="main.php">HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="opgeslagen.php">OPGESLAGEN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="help.php">HELP</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="h1_class">Recepten randomizer</h1>
    
    
    <div class="container pt-5">
    </div>
    <div class="nieuwbutton"><button type="button" class="btn btn-danger"><i class="fa-solid fa-bookmark"></i> Opslaan</button></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
      $api_url = 'https://aventus-173566.aventusfactory.nl/Recepten/connect.php';
      $data = json_decode( file_get_contents($api_url), true);

      $gerecht = $data[0]['name'];
      $recept = $data[0][''];
      $ingredient = $data[0]['ingredients'];
      $portie = $data[0]['portions'];
      ?>
      <div class="buttonrefresh"><button type="button" onClick="window.location.reload()" class="btn btn-danger"><i class="fa-solid fa-arrow-rotate-right"></i> Nieuw recept</button></div>
  </body>
</html>
