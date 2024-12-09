<?php
  session_start();
  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }else{
    header("location: index.php");
  }

?>
<div  class="form alterar-senha">
  <form class="alterar-senha" action="alterar_senha.php" method="POST">
    <label for="senha-atual"> Senha atual </label>
    <input type="password" name="senha-atual" class="form-input" required autofocus>
    <label for="senha-nova"> Nova senha </label>
    <input type="password" name="senha-nova" class="form-input" required >
    <label for="senha-confirmacao"> Confirmação da nova senha </label>
    <input type="password" name="senha-confirmacao" class="form-input" required >
    <div class="form-submit-control">
      <button type="submit" class="form-submit">ALTERAR SENHA</button>
    </div>
  </form>
</div>

<script src="js/ajax_trocar_senha.js"></script>
