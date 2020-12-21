<?php
require "authenticate.php";
require "db_functions.php";

if ($login) {
    $conn = connect_db();
    $query = "SELECT CAST(jogo1 AS unsigned integer) AS J1, 
    CAST(jogo2 AS unsigned integer) AS J2, 
    CAST(jogo3 AS unsigned integer) AS J3
    FROM GRR20204439_Project_Users WHERE id=$user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
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

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <?php if ($login): ?>
          <li class="nav-item active">
            <a class="nav-link" href="#"><?php echo $user_name ?> <span class="sr-only">(current)</span></a>
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
    <h1 class="my-4">Lista de Desejos</h1>
    <?php if($login):?>
    <div class="row">

        <div class="row">

          <?php if ($row["J1"]==1) { ?>
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
          
          <?php if ($row["J2"]==1) { ?>
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

          <?php if ($row["J3"]==1) { ?>
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
    <?php endif;?>
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
