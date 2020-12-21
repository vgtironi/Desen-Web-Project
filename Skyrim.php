<?php 
require "authenticate.php";
require "db_functions.php";

if (isset($_GET["lista"])) {
  $conn = connect_db();
  if ($_GET["lista"] == "sim") {
    $query = "UPDATE GRR20204439_Project_Users
    SET jogo1 = B'1'
    WHERE id=$user_id";
  }
  elseif ($_GET["lista"] == "nao") {
    $query = "UPDATE GRR20204439_Project_Users
    SET jogo1 = B'0'
    WHERE id=$user_id";
  }
  mysqli_query($conn, $query);
  disconnect_db($conn);
}

if ($login) {
  $conn = connect_db();
  $query = "SELECT CAST(jogo1 AS unsigned integer) AS Desejo FROM GRR20204439_Project_Users WHERE id=$user_id";
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

  <title>Skyrim</title>

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
          <img class="card-img-top img-fluid" src="https://pixelkin.org/wp-content/uploads/2013/10/Elder-Scrolls-V-Skyrim-wallpaper.jpeg" alt="">
          <div class="card-body">
            <h3 class="card-title">The Elder Scrolls V: Skyrim</h3>
            <h4>R$ 169,90</h4>
            <p class="card-text">The Elder Scrolls V: Skyrim é um jogo eletrônico de RPG de ação desenvolvido pela Bethesda Game Studios e publicado pela Bethesda Softworks. É o quinto jogo principal da série The Elder Scrolls, seguindo The Elder Scrolls IV: Oblivion. Foi lançado em 11 de novembro de 2011 para Microsoft Windows, PlayStation 3 e Xbox 360. É o primeiro jogo ocidental da história a receber 40/40 (nota máxima) na conceituada Famitsu. O jogo conseguiu três prêmios no VGA 2011, incluindo Jogo do Ano.</p>
            <p class="card-text">Os acontecimentos do jogo passam-se duzentos anos depois da, já quase esquecida, crise de Oblivion, no ano 201 da quarta era (4E 201) na província de Skyrim, no norte de Tamriel, e 30 anos após a mais recente Grande Guerra, onde o Aldmeri Dominion e o Império lutaram arduamente, mas que quase extinguiu os humanos de Tamriel, e para evitar tal derrota, acordaram com a Aldmeri Dominion, rendendo duas forças e sujeitando-se as suas exigências.</p>
            <p class="card-text">Skyrim é um jogo de RPG que mantém a tradicional jogabilidade de mundo aberto encontrada na série The Elder Scrolls. O jogador é livre para andar pela terra de Skyrim a sua vontade. Em Skyrim há nove grandes "posses", com nove capitais que são as principais cidades do jogo. Também há várias pequenas aldeias, cavernas, templos, fazendas e montanhas. Cada vilarejo e cidade possui sua própria economia, que o jogador pode manipular ou sabotar se escolher fazer isso.</p>
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
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/JSRtYpNRoN0" allowfullscreen></iframe>
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
