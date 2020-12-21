<?php 
require "authenticate.php";
require "db_functions.php";

if (isset($_GET["lista"])) {
  $conn = connect_db();
  if ($_GET["lista"] == "sim") {
    $query = "UPDATE GRR20204439_Project_Users
    SET jogo2 = B'1'
    WHERE id=$user_id";
  }
  elseif ($_GET["lista"] == "nao") {
    $query = "UPDATE GRR20204439_Project_Users
    SET jogo2 = B'0'
    WHERE id=$user_id";
  }
  mysqli_query($conn, $query);
  disconnect_db($conn);
}

if ($login) {
  $conn = connect_db();
  $query = "SELECT CAST(jogo2 AS unsigned integer) AS Desejo FROM GRR20204439_Project_Users WHERE id=$user_id";
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

  <title>Titanfall 2</title>

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
          <img class="card-img-top img-fluid" src="https://www.centralxbox.com.br/wp-content/uploads/2016/11/theVideoGameGallery_28836_1920x1080.jpg" alt="">
          <div class="card-body">
            <h3 class="card-title">Titanfall 2</h3>
            <h4>R$ 59,90</h4>
            <p class="card-text">O jogo tintanfall 2, é sequência do tintanfall 1(2014), destribuido pela EA e desenvolvido pela Respawn Entertainment.</p>
            <p class="card-text">Lançado em 28 de outubro de 2016, para plataformas PlayStation 4, Xbox One e Microsoft Windows.</p>
            <p class="card-text">Jogo de tiro em primeira pessoa, que envolve jogabilidade muito dinâmica, com pulo duplo, diversas armas para diversas situações, e habilidades diferentes para cada personagem.
                                Porém, o principal ponto que difere ele de outros jogos de tiro é a opoturnidade de jogar com um robô enorme, no qual o jogador pode chama-lo em meio a batalha e entrando nele para controla-lo.
                                Cada robo também tem habilidades diferentes assim aumentando a maneira que se pode jogar em cada batalha.</p>
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
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ktw2k3m7Qko" allowfullscreen></iframe>
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
