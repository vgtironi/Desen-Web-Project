<?php
require "authenticate.php";

$RPG = true;
$FPS = true;
$Plataforma = true;

if (isset($_GET["tipo"])) {
  if ($_GET["tipo"] == "RPG") {
    $FPS = $Plataforma = false;
  }
  elseif ($_GET["tipo"] == "FPS") {
    $RPG = $Plataforma = false;
  }
  elseif ($_GET["tipo"] == "Plataforma") {
    $RPG = $FPS = false;
  }
}
?>

<!DOCTYPE html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Página Inicial</title>

  <!-- Bootstrap CSS -->
  <link href="packs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navegação -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Loja de Jogos Maneiros</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <?php if ($login): ?>
          <li class="nav-item">
            <a class="nav-link" href="lista_desejos.php"><?php echo $user_name ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Registrar-se</a>
          </li>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Jogos Maneiros</h1>
        <div class="list-group">
          <a href="index.php" class="list-group-item">Todos</a>
          <a href="?tipo=RPG" class="list-group-item">RPG</a>
          <a href="?tipo=FPS" class="list-group-item">FPS</a>
          <a href="?tipo=Plataforma" class="list-group-item">Plataforma</a>
        </div>

      </div>

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <a href="Skyrim.php">
                <img class="d-block img-fluid" title="The Elder Scrolls V: Skyrim" src="https://cutewallpaper.org/21/skyrim-1080p-wallpaper/Skyrim-4K-Wallpapers-Top-Free-Skyrim-4K-Backgrounds-.jpg" alt="First slide">
              </a>
            </div>
            <div class="carousel-item">
              <a href="Titanfall2.php">
                <img class="d-block img-fluid" title="Titanfall 2" src="https://s1.1zoom.me/b5050/750/Warriors_Battles_Titanfall_2_Robot_525242_1920x1080.jpg" alt="Second slide">
              </a>
            </div>
            <div class="carousel-item">
              <a href="HollowKnight.php">
                <img class="d-block img-fluid" title="Hollow Knight" src="https://images4.alphacoders.com/998/thumb-1920-998560.jpg" alt="Third slide">
              </a>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          <?php if ($RPG == true) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="https://steamcdn-a.akamaihd.net/steam/apps/489830/header.jpg?t=1590515887" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="Skyrim.php">The Elder Scrolls V: Skyrim</a>
                </h4>
                <h5>R$ 169,90</h5>
                <p class="card-text">RPG que mantém a tradicional jogabilidade de mundo aberto encontrada na série The Elder Scrolls.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <?php } ?>
          
          <?php if ($FPS == true) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="https://steamcdn-a.akamaihd.net/steam/apps/1237970/header.jpg?t=1597779431" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="Titanfall2.php">Titanfall 2</a>
                </h4>
                <h5>R$ 59,90</h5>
                <p class="card-text">FPS com jogabilidade muito dinâmica, com diversas armas e habilidades além de titans gigantes</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <?php } ?>

          <?php if ($Plataforma == true) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="https://steamcdn-a.akamaihd.net/steam/apps/367520/header.jpg?t=1589274477" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="HollowKnight.php">Hollow Knight</a>
                </h4>
                <h5>R$ 27,99</h5>
                <p class="card-text">Uma aventura de ação clássica em estilo 2D por um vasto mundo obscuro e interligado.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <?php } ?>

        </div>

      </div>

    </div>

  </div>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Loja de Jogos Maneira - DS122 Desenvolvimento Web I</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="packs/jquery/jquery.min.js"></script>
  <script src="packs/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
