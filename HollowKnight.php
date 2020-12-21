<?php 
require "authenticate.php";
require "db_functions.php";

if (isset($_GET["lista"])) {
  $conn = connect_db();
  if ($_GET["lista"] == "sim") {
    $query = "UPDATE GRR20204439_Project_Users
    SET jogo3 = B'1'
    WHERE id=$user_id";
  }
  elseif ($_GET["lista"] == "nao") {
    $query = "UPDATE GRR20204439_Project_Users
    SET jogo3 = B'0'
    WHERE id=$user_id";
  }
  mysqli_query($conn, $query);
  disconnect_db($conn);
}

if ($login) {
  $conn = connect_db();
  $query = "SELECT CAST(jogo3 AS unsigned integer) AS Desejo FROM GRR20204439_Project_Users WHERE id=$user_id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $desejo = $row["Desejo"];
}
?>
<!DOCTYPE html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hollow Knight</title>

  <!-- Bootstrap CSS -->
  <link href="packs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/shop-item.css" rel="stylesheet">

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
          <a href="index.php?tipo=RPG" class="list-group-item">RPG</a>
          <a href="index.php?tipo=FPS" class="list-group-item">FPS</a>
          <a href="index.php?tipo=Plataforma" class="list-group-item">Plataforma</a>
        </div>

      </div>

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cbb10ce3-6329-4e23-a896-e6f38a75023f/d8a1d0l-f0761b1a-fa61-4ba9-9d53-11d25950a72a.jpg/v1/fill/w_1024,h_576,q_75,strp/hollow_knight_wallpaper_by_teamcherry_d8a1d0l-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD01NzYiLCJwYXRoIjoiXC9mXC9jYmIxMGNlMy02MzI5LTRlMjMtYTg5Ni1lNmYzOGE3NTAyM2ZcL2Q4YTFkMGwtZjA3NjFiMWEtZmE2MS00YmE5LTlkNTMtMTFkMjU5NTBhNzJhLmpwZyIsIndpZHRoIjoiPD0xMDI0In1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.IdtDBttPzQIlcI6AoXkeBxgVLOnuwG0jnh1c4yBgR4I" alt="">
          <div class="card-body">
            <h3 class="card-title">Hollow Knight</h3>
            <h4>R$ 27,99</h4>
            <p class="card-text">Abaixo da cidade moribunda de Dirtmouth jaz um reino antigo e arruinado. Muitos são atraídos para o subterrâneo em busca de riquezas, glórias ou respostas para antigos segredos.</p>
            <p class="card-text">Hollow Knight é uma aventura de ação clássica em estilo 2D por um vasto mundo interligado. Explore cavernas serpenteantes, cidades antigas e ermos mortais; lute contra criaturas malignas e alie-se a insetos bizarros, e solucione mistérios antigos no centro do reino.</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
          </div>
          <?php if ($login): ?>
            <?php if ($desejo==0):?>
              <a href="?lista=sim" class="btn btn-success">Adicionar à lista de desejos </a>
            <?php else:?>
              <a href="?lista=nao" class="btn btn-danger">Remover da lista de desejos </a>
            <?php endif;?>
          <?php else: ?>
            <a href="login.php" class="btn btn-warning">Faça Login para adicionar à lista de desejos</a>
          <?php endif; ?>
        </div>

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Trailer do Jogo
          </div>
          <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UAO2urG23S4" allowfullscreen></iframe>
            </div>
          </div>
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
