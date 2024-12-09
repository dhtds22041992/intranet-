<html><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>atualizar_dados</title>
</head>
<body>
<?php
session_start();
include('functions.php');
if (isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $connection = connection_checker();
  $query = "SELECT user_password FROM users WHERE user_id = '{$user_id}'";
  $result = mysqli_query($connection, $query);
  if (mysqli_num_rows($result) > 0){
    $result = mysqli_fetch_array($result)[0];
    if (md5($_POST['confirmacao']) == $result){
      $nome = $_POST['first-name'];
      $sobrenome = $_POST['last-name'];
      $username = $_POST['username'];
      $email = $_POST['email'];

      $existe_usuario = existeUsuario($username, $email);
      switch ($existe_usuario) {
        case 0:
          $query = "UPDATE users
          SET user_first_name = '{$nome}',
          user_last_name = '{$sobrenome}',
          username = '{$username}',
          email = '{$email}'
          WHERE user_id = '{$user_id}'";
          if (mysqli_query($connection, $query)){
            echo '<div class="system-info warning"><p> Seus dados  foram atualizados!</p></div>';
          } else {
            echo '<div class="system-info error"><p> Desculpe, há algo errado.</p></div>';
          }
          break;
          case 1:
            echo '<div class="system-info error"><p>Este usuário já existe.</p></div>';
            break;
          case 2:
            echo '<div class="system-info error"><p>Já existe um usuário com este e-mail.</p></div>';
            break;
          case 3:
            echo '<div class="system-info error"><p>Já existe um usuário com o mesmo nome de usuário e e-mail.</p></div>';
            break;
          default:
            echo '<div class="system-info error"><p>Oh! É algo terrível!</p></div>';
            break;
      }

    } else {
      echo '<div class="system-info error"><p> Senha incorreta.</p></div>';
    }
  } else {
    echo '<script>
      alert("Desculpe, algo terrível aconteceu!");
    </script>';
    header('location: index.php');
  }
} else {
  header("location: index.php");
}
?>
</body>
</html></html>

