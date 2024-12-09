<html><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
</head>
<body>
<?php
	session_start();
	if (!isset($_SESSION['user_id'])){
		echo "<script >
		alert('Esta área é restrita, faça login para acessar.');
		window.location='index.php';
		</script>";
	}
$user_id = $_SESSION['user_id'];
$user_first_name = $_SESSION['user_first_name'];
include('header.php'); ?>

<div class="top">
	<figure class="system-logo">
		<img src="img/system-logo-dark.png">
	</figure>
	<h1 class="page-title">Bem vindo ao intranet heliux <?php echo $user_first_name ?>!</h1>
</div>
<div class="main-content">
	<div class="nav-bar">
	<?php
		$array_botoes = getBotoes($user_id);
		foreach ($array_botoes as $chave => $valor) {
			echo $valor;
		}
	?>
	</div>
	<div class='section-replace' >
		<?php
		$avisos = getAvisos($user_id);
		foreach ($avisos as $chave => $valor) {
			echo '<div class="system-info warning"><p>';
			echo $valor;
			echo '</p></div>';
		}
		?>
	</div>

</div>



<?php include('footer.php'); ?>

</body>
</html></html>