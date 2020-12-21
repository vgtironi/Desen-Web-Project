<?php
require "db_functions.php";
require "authenticate.php";

$error = false;
$password = $email = "";

if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["email"]) && isset($_POST["password"])) {

    $conn = connect_db();

    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password = md5($password);

    $sql = "SELECT id,name,email,password FROM $table_users
            WHERE email = '$email';";

    $result = mysqli_query($conn, $sql);
    if($result){
      if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user["password"] == $password) {

          $_SESSION["user_id"] = $user["id"];
          $_SESSION["user_name"] = $user["name"];
          $_SESSION["user_email"] = $user["email"];

          header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/index.php");
          exit();
        }
        else {
          $error_msg = "Senha incorreta!";
          $error = true;
        }
      }
      else{
        $error_msg = "Usuário não encontrado!";
        $error = true;
      }
    }
    else {
      $error_msg = mysqli_error($conn);
      $error = true;
    }
  }
  else {
    $error_msg = "Por favor, preencha todos os dados.";
    $error = true;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Login</h1>

      <?php if ($login): ?>
        <h3>Você já está logado!</h3>
        </body>
        </html>
        <?php exit(); ?>
      <?php endif; ?>

      <?php if ($error): ?>
        <h3 style="color:red;"><?php echo $error_msg; ?></h3>
      <?php endif; ?>

      <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="login.php">

        <div class="form-group <?php if($error){echo "has-error";}?>">
          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input required type="email" class="form-control" name="email" placeholder="Seu email">
          </div>
        </div>

        <div class="form-group <?php if($error) {echo "has-error";}?>">
          <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="password">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Entrar</button>
          </div>
        </div>
      </form>

      <ul>
        <li><a href="index.php">Voltar</a></li>
      </ul>

    </div>
  </div>
</div>
</body>
</html>