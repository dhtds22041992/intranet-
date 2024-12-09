<html><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
<?php include('header.php'); ?>
<style>
.login-title{
	text-align: center;
}
.login-title h1{
	color: white;
	font-family: 'Lobster', cursive;
}
.form-login form{
	display: grid;
	color: white;
}
.form-login input{
	color: white;
}
body {
    background: url('img/bg/bg_1.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
.container{
	display: flex;
	align-items: center;
	justify-content: center;
	height: -webkit-fill-available;
}
.jumbotron{
	background: rgba(18,18,18,0.4)!important;
	max-width: 380px;
}
</style>
<div class="login-front">
<div class="login-title">
	<figure class="system-logo">
		<img src="img/system-logo-light.png">
	</figure>
	<h1> Intranet heliux </h1>
</div>
	<div class="form-login">
		<form role="form-inline" action="request_login.php" method="POST">
			<label for="username">Usuário:</label>
			<input type="text" name="username" class="form-input" id="name" autofocus required />
			<label for="email">Senha:</label>
			<input type="password" name="password" class="form-input" id="password" required />
			<button type="submit" class="form-submit" name="entrar">Login</button>
		</form>
	</div>
</div>
<?php include('footer.php'); ?>

</body>
</html>