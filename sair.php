<html><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sair</title>
</head>
<body>
<?php
  session_start();
  session_destroy();
  header("Location: index.php");
?>

</body>
</html></html>