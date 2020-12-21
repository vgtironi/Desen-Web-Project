<?php
  require "check_form.php";
  require "db_functions.php";
  $success = false;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrar-se</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="check_form.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Registrar-se</h1>

      <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if ($erro) { ?>
          <div class="alert alert-danger">
            Erros no formulário.
          </div>
        <?php } else {
          $conn = connect_db();

          $name = mysqli_real_escape_string($conn,$_POST["name"]);
          $email = mysqli_real_escape_string($conn,$_POST["email"]);
          $password = mysqli_real_escape_string($conn,$_POST["password"]);
          $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);

          $password = md5($password);

          $sql = "INSERT INTO $table_users
              (name, email, password, jogo1, jogo2, jogo3) VALUES
              ('$name', '$email', '$password', B'0', B'0', B'0');";
          
          if(mysqli_query($conn, $sql)){
            $success = true;
          }
          else {
            $error_msg = mysqli_error($conn);
            $error = true;
          }
        }
        ?>
      <?php endif; ?>
      
      <?php if ($success): ?>
        <h3 style="color:lightgreen;">Usuário criado com sucesso!</h3>
        <p>
        Seguir para <a href="login.php">login</a>.
        </p>
      <?php endif; ?>

      <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="register.php">

        <div class="form-group <?php if(!empty($erro_nome)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="name" placeholder="Seu nome completo" value="<?php echo $nome; ?>">
            <div id="erro-nome">

            </div>
            <?php if (!empty($erro_nome)): ?>
              <span class="help-block"><?php echo $erro_nome ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group <?php if(!empty($erro_email)){echo "has-error";}?>">
          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input required type="email" class="form-control" name="email" placeholder="Seu email" value="<?php echo $email; ?>">
            <div id="erro-email">

            </div>
            <?php if (!empty($erro_email)): ?>
              <span class="help-block"><?php echo $erro_email ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group <?php if(!empty($erro_senha)){echo "has-error";}?>">
          <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="password" value="<?php echo $senha; ?>">
            <div id="erro-senha">

            </div>
            <?php if (!empty($erro_senha)): ?>
              <span class="help-block"><?php echo $erro_senha ?></span>
            <?php endIf; ?>
            <span class="help-block">A senha precisa ter de 8-20 cacarteres contendo pelo menos uma letra maiúscula, uma minúscula e um número.</span>
          </div>
        </div>

        <div class="form-group <?php if(!empty($erro_conf)){echo "has-error";}?>">
          <label for="inputConf" class="col-sm-2 control-label">Confirmação da senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="confirm_password" value="<?php echo $conf; ?>">
            <div id="erro-conf">

            </div>
            <?php if (!empty($erro_conf)): ?>
              <span class="help-block"><?php echo $erro_conf ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
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
