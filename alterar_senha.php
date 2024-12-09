<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
</head>
<body>
<?php
session_start();
include('functions.php');
if (isset($_SESSION["user_id"])){
  $user_id = $_SESSION["user_id"];
  $connection = connection_checker();
  if (isset($_POST['senha-atual'])){
    $query = "SELECT user_password FROM users WHERE user_id = {$user_id}";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0){
      if (mysqli_fetch_array($result)[0] == md5($_POST['senha-atual'])){
        $nova_senha = md5($_POST['senha-nova']);
        $confirmacao = md5($_POST['senha-confirmacao']);
        if ($nova_senha == $confirmacao){
          $query = "UPDATE users SET user_password = '{$nova_senha}', senha_prov = '0' WHERE user_id='{$user_id}'";
          if (mysqli_query($connection, $query)){
            echo "Senha alterada com sucesso!";
          } else {
            echo "Desculpe, houve algo de errado. " . mysqli_connect_error($connection);
          }

        } else {
          echo "As senhas não sao iguais!";
        }
      } else {
        echo "Senha atual inválida!";
      }

    }else{
      echo '<script>
        alert("Desculpe, houve algum erro!");
        window.location = index.php;
      </script>';
    }
  }
}else{
  header("location: index.php");
}

 ?>
</body>
</html>


