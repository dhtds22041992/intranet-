<html><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload_file</title>
</head>
<body>
<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include('functions.php');
if (isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $files_dir = "files/";
  if (is_dir($files_dir)){
    if (isset($_FILES['arquivo'])){
      $file_name = explode(".", $_FILES['arquivo']['name']);
      $file_name[count($file_name)-1] = "";
      $new_name = "";
      foreach ($file_name as $key => $value) {
        $new_name .= $value;
      }
      $file_type = $_FILES['arquivo']['type'];
      $file_ext = get_file_ext($file_type);
      $file_proprietario = $user_id;
      $file_upload_date = date("Y-m-d H:i:s");
      $file_server_name = $file_proprietario."_".str_replace(":","",str_replace("-","",str_replace(" ","",str_replace("-","",$file_upload_date))));
      $file_url = $files_dir . $file_server_name;
      if (isset($_POST['visibilidade'])){
        $file_visibilidade = $_POST['visibilidade'];
      } else {
        $file_visibilidade = "private";
      }

      $connection = connection_checker();
      if ($connection){
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $file_url)){
          $query = "INSERT INTO arquivos (
            data_hora,
            extencao,
            proprietario,
            ref,
            visibilidade,
            url,
            nome_original,
            tipo
          ) VALUES (
            '{$file_upload_date}',
            '{$file_ext}',
            '{$file_proprietario}',
            '{$file_server_name}',
            '{$file_visibilidade}',
            '{$file_url}',
            '{$new_name}',
            '{$file_type}'
          )";
          if (mysqli_query($connection, $query)){
            echo "<script >
        		window.location='index.php';
            alert('Arquivo enviado com sucesso!');
        		</script>";
          } else {
            echo "<script >
        		window.location='index.php';
            alert('Falha ao atualizar o banco!');
            console.log(" . mysqli_connect_error() . ");
        		</script>";

          }
        } else {
          echo "<script >
          window.location='index.php';
          alert('Falha ao enviar o arquivo!');
          </script>";
        }
      }
    }
  } else {
    echo "Diretorio nao encontrado!";
  }
} else{
  header("Location: index.php");
}


?>
</body>
</html></html>
