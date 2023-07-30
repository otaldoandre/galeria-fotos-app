<html>
	<head>
		<title> Adicionar imagem </title>
		<script src="jquery-3.7.0.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<script src="https://kit.fontawesome.com/bd7b48f28d.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	</head>
	<style>

	* {
	margin: 0;
	padding: 0;
	font-family: 'Poppins', sans-serif;
	
	
}
	body{
	background-color: #2B3F66;
	}
	
	h1, label {
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
	
	input[type="file"]{
    color: #fff;
}
</style>
	<body class="p-3 m-0 border-0 bd-example">
		<div class="container-fluid">
		<div class="row">
			<div id="part1" class="col-md-6 d-flex justify-content-center">
				<img id="imgid"src="img/fotografia.png" >	
				<output></output>

			</div>
			<div id="part2"class="col-md-6 justify-content-center" >
				<div class="login-section"> 
					<form class="form-inline"name="produto" action="inclusao.php" method="post" enctype="multipart/form-data">
						<h1> <b>Faça upload da sua fotografia</b> </h1>
						<div class="mb-3 w-75">
							<label for="inputName" class="form-label">Nome</label>
							<input type="text" placeholder="Nome" class="form-control" name="nome" id="inputName" style="width:250px" required><br>
						</div>	
						<div class="mb-3 w-75">
							<label for="textAreaInput"  class="form-label" >Descrição</label>
							<textarea class="form-control" placeholder="Descrição"name="descricao" id="textAreaInput" rows='3' cols='60' style="resize: none;" ></textarea>
						</div>
						<br>
						<div class="mb-3 w-75">
							<label for="arquivo">Arquivo:</label>
							<input class="form-control-file" type="file" name="arquivo" id="myarquivo"/>
							<output></output>

						</div>
						
						<button type="submit" value="Ok" name="enviado" class="btn btn-primary">Enviar</button>
						<button type="reset" value="Limpar" class="btn btn-primary">Limpar</button>
						<button type="button" onclick="window.location='index.php';" value="Voltar" class="btn btn-primary">Voltar</button>
						
					</form>
				</div>
			</div>
		</div>
		
	</div>

		
		
			
		<?php
			echo "<br><br>";
			include_once('conexao.php');

			function randString($size){
				//String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
				$basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				$return= "";
				for($count= 0; $size > $count; $count++){
					//Gera um caracter aleatorio
					$return.= $basic[rand(0, strlen($basic) - 1)];
				}
				 return $return;
			}
			
				
			if(isset($_POST['enviado'])) 
			{
				if(substr($_FILES['arquivo']['name'], -3)=="png" )
				{
					
					$nome_final = randString(20).".png";
					echo $nome_final;
				}
				else if (substr($_FILES['arquivo']['name'], -3)=="jpg")
				{
					$nome_final = randString(20).".jpg";
					echo $nome_final;
				}
				if(substr($_FILES['arquivo']['name'], -3)=="png" or substr($_FILES['arquivo']['name'], -3)=="jpg"){
				$dir = 'img/'; 
				$tmpNameFile = $_FILES['arquivo']['tmp_name']; 
				$nameFile = $_FILES['arquivo']['name']; 
				$descricao = $_POST['descricao'];
				$nome = $_POST['nome'];
				// move_uploaded_file
				if( move_uploaded_file( $tmpNameFile, $dir . $nome_final) ) { 	
						//$mysql = new BancodeDados();
						//$mysql->conecta();
						$sqlstring = "insert into tblfotos (id, nome, descricao, imagem) values (null, '$nome', '$descricao', '$nome_final')";
						mysqli_query($conexao, $sqlstring);
						header('Location: index.php'); 		
				} 
				else 
				{		
					echo "Erro ao gravar o arquivo. Tente novamente.";	
				}
			}
			else
			{
					echo "Não é documento com extensão .png ou .jpg. Tente novamente com um arquivo válido.";
			}
			}
			
			
		?>

		</form>
	<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
