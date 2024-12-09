<?php
  session_start();
  include("../functions.php");
  $connection = connection_checker();
  $user_id = $_SESSION['user_id'];
  if(!$connection){
    echo "falha na query";
  } else {
    $query = "SELECT nome_original, url, proprietario, ref, data_hora, visibilidade, extencao, cod FROM arquivos WHERE proprietario={$user_id}";
    $result = mysqli_query($connection, $query);
    echo "<div class='table list-file' id='list-file'><table><thead><tr><th></th><th></th><th>Nome</th><th>Data</th><th>Visível</th><th>Ações</th></tr></thead><tbody>";

    foreach ($result as $linha) {
      echo '<tr>';
      echo '<td id=fileCheck><input type="checkbox" name="file-check" value=' . $linha['cod'] . '></td>';
      echo '<td id=fileType>' . $linha['extencao'] . '</td>';
      echo '<td id="fileName"><a href="' . $linha['url'] . '" download="' . $linha['nome_original'] . '.' . $linha['extencao'] . '" >' . $linha['nome_original'] . '</a></td>';
      echo '<td id=fileDate>' . $linha['data_hora'] . '</td>';
      echo '<td id=fileVisibilidade>' . $linha['visibilidade'] . '</td>';
      echo '<td id="fileAcoes"><span title="Excluir" id="excluir">1</span><span title="Renomear" id="renomear">2</span><span title="Alterar Visibilidade" id="visibilidade">3</span></td>';
      echo '</tr>';
    }
    echo "</tbody><tfoot><tr><th></th><th></th><th>Nome</th><th>Data</th><th>Visível</th><th>Ações</th></tr></tfoot></table></div>";

  }

?>
