<?php
  session_start();
  include('../functions.php');
  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $connection = connection_checker();
    $query = "SELECT username, email, user_first_name, user_last_name FROM users WHERE user_id = '{$user_id}'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0){
      $result = mysqli_fetch_array($result);
    } else {
      echo '<script>
        alert("Desculpe, algo terrível aconteceu!");
      </script>';
      header('location: index.php');
    }
  }else{
    header("location: index.php");
  }

?>
<div  class="form atualizar-dados">
  <form class="atualizar-dados" action="atualizar_dados.php" method="POST">
    <label for="first-name"> Nome </label>
    <input type="text" name="first-name" value="<?php echo $result['user_first_name'] ?>" class="form-input" required >
    <label for="last-name"> Sobrenome </label>
    <input type="text" name="last-name" value="<?php echo $result['user_last_name'] ?>" class="form-input" required >
    <label for="username"> Username </label>
    <input type="text" name="username" value="<?php echo $result['username'] ?>" class="form-input" required >
    <label for="email"> E-mail </label>
    <input type="email" name="email" value="<?php echo $result['email'] ?>" class="form-input" required >
    <hr>
    <label for="confirmacao"> Confirme sua identidade, digite sua senha:  </label>
    <input type="password" name="confirmacao" class="form-input" required >

    <div class="form-submit-control">
      <button type="submit" class="form-submit">ATUALIZAR</button>
    </div>
  </form>
</div>

<script src="js/"></script>
