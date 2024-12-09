<?php
  include("../functions.php");
  $connection = connection_checker();
  if(!$connection){
    echo "falha na query";
  } else {
    $query = "SELECT user_id, username, email, user_tipo, senha_prov FROM users WHERE 1";
    $result = mysqli_query($connection, $query);
    echo "<div class='table list-user' id='list-user'><table><thead><tr><th>ID</th><th>Nome de Usuário</th><th>E-mail</th><th>Tipo</th><th>Senha provisória</th></tr></thead><tbody>";

    foreach ($result as $linha) {
      echo '<tr>';
      foreach ($linha as $coluna => $value) {
        echo "<td>" . $value . "</td>";
      }
      echo '</tr>';
    }
    echo '</tbody><tfoot><tr><th>ID</th><th>Nome de Usuário</th><th>E-mail</th><th>Tipo</th><th>Senha provisória</th></tr></tfoot></table></div>';
  }

?>
<script src="js/list_user.js"> </script>
