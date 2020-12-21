<?php
function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}


$nome = $email = $senha = $conf = "";
$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["name"])){
    $erro_nome = "Nome é obrigatório.";
    $erro = true;
  }
  else{
    $nome = verifica_campo($_POST["name"]);
    if (!preg_match("/^[a-zA-Z \p{L}]+$/ui",$nome)) {
      $erro_nome = "Digite apenas letras e espaço.";
      $erro = true;
    }
  }

  if(empty($_POST["email"])){
    $erro_email = "Email é obrigatório.";
    $erro = true;
  }
  else{
    $email = verifica_campo($_POST["email"]);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erro_email = "Digite o endereço corretamente.";
      $erro = true;
    }
  }

  if(empty($_POST["password"])){
    $erro_senha = "Senha é obrigatória";
    $erro = true;
  }
  else{
    $senha = verifica_campo($_POST["password"]);
    if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$senha)) {
      $erro_senha = "A senha não atende as obrigações.";
      $erro = true;
    }
  }

  if(empty($_POST["confirm_password"])){
    $erro_conf = "Confirmação é obrigatória";
    $erro = true;
  }
  else{
    $conf = verifica_campo($_POST["confirm_password"]);
    $senha = verifica_campo($_POST["password"]);
    if ($conf!=$senha) {
      $erro_conf = "A confirmação não é igual a senha";
      $erro = true;
    }
  }

}
?>
