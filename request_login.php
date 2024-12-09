<html><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Request_login</title>
</head>
<body>
<?php
	include('functions.php');
	session_start();
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user = $_POST['username'];
		$password = md5($_POST['password']);
		$query = "SELECT user_id, username, user_password, user_first_name, user_last_name
		FROM users WHERE username='{$user}'
		AND user_password='{$password}'";

		$connection = connection_checker();
		if ($connection == false){
			//tratar erro de conexão
		}else{
			$result = mysqli_query($connection, $query);
			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_array($result);
				$_SESSION['user_id'] = $row[0];
				$_SESSION['username'] = $row[1];
				$_SESSION['user_first_name'] = $row[3];
				header("Location: home.php");
			} else {
				echo "<script >
				alert('Login inváldo, insira um usuário e uma senha válidos.');
				window.location='index.php';
				</script>";
			}
			mysqli_close($connection);
		}


	}else{
		echo "<script >
		alert('Preencha todos os campos.');
		window.location='index.php';
		</script>";
	}

?>

</body>
</html></html>