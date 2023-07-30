<?php include_once('conexao.php'); ?>
<!doctype html>
<html>
<head>
	<title> Login </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<script src="https://kit.fontawesome.com/bd7b48f28d.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>

<style>

	* {
	margin: 0;
	padding: 0;
	font-family: 'Poppins';
	
	
}
	body{
	background-color: #2B3F66;
	}
	
	h1, label, h5 {
		color: #fff;
	}
	
	.row {
		margin-left: 0;
		margin-right: 0;

	}
	
	.login-section{
		 
		padding-top:200px;
		padding-left: 150px;
		
	}
	
	img {
		border-radius: 18px;
		width: 100vh;
		height: 96vh;
		object-fit: cover;
	}
	
	label{
		font-size: 12px;
		line-height: 5px;
		
	}
	
	.btn {
		padding: 10px 20px;
		background-color: #608DE6;
		border-color:  #608DE6;
	}
</style>

<body class="p-3 m-0 border-0 bd-example">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
	<div class="container-fluid">
		<div class="row">
			<div id="part1" class="col-md-6 d-flex justify-content-center">
				<img src="login.jpg" >	
			</div>
			<div id="part2"class="col-md-6 justify-content-center" >
				<div class="login-section"> 
					<form name="login_user" class="form-signin" method="post" action="login.php">
						<h1> <b>Faça seu login</b> </h1>
						<div class="mb-3 w-75">
							<label for="inputLogin" class="form-label" >Login</label>
							<input type="text" class="form-control form-control-lg" placeholder="Login" name="login" id="inputLogin"  required>
						</div>	
						<div class="mb-3 w-75">
							<label for="inputPassword" class="form-label" >Senha</label>
							<input type="password" class="form-control form-control-lg" placeholder="Senha" name="senha" id="inputPassword"  required>
						</div>
						<br>
						
						<button type="submit" class="btn btn-primary" name="login_user">Entrar</button>
						<br><br><br><br>
						<h5> Login: etec </h5>
						<h5> Senha: rosa </h5>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html> 

<?php
	include_once('conexao.php');
	// Login 
	
	if (isset($_POST['login_user']) )
	{
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$query = "SELECT * FROM usuarios WHERE usuario = '$login' LIMIT 1";
		$resultado = mysqli_query($conexao, $query) or die(mysqli_error);
		$usuario = mysqli_fetch_assoc($resultado);
		echo $senha;
		echo $usuario['senha'];
		if ($senha == $usuario['senha'])
		{
			echo "Usuario logado!";
			if (!isset($_SESSION))
			{
				session_start();
			}
			$_SESSION['id'] = $usuario['id'];
			$_SESSION['username'] = $usuario['usuario'];
			header('location: index.php');
			
		}
		
		//"N�o foi poss�vel realizar o login com o e-mail e senha fornecidos. Por favor, verifique os dados e tente novamente."
		
	}
?>