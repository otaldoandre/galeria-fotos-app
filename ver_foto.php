<html>
<head>
		
		<title> CRUD - PHP com mysqli </title>
		<script src="jquery-3.7.0.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="style.css">
		
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
	
	h1, h2, h3 label {
		color: #fff;
	}
	
	h1 {
		font-size: 50px;
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
		width: 150vh;
		height: 75vh;
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
			<div id="part1" class="col-md-12 d-flex justify-content-center">
			
			<?php
				include_once('conexao.php');
					// recuperando a informação da URL
					// verifica se parâmetro está correto e dento da normalidade 
					if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
							$id = base64_decode($_GET['id']);
					} else {
						header('Location: index.php');
					}
					// realizando a pesquisa com o id recebido
					$query = mysqli_query($conexao,"select * from tblfotos where id = $id");

					if (!$query) {
						echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
						die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
					}
						
					$dados=mysqli_fetch_array($query);
					if (empty($dados['imagem'])){
							$imagem = 'SemImagem.png';
						}else{
							$imagem = $dados['imagem'];
						}
					echo "<br><br><img width='75%' src='img/$imagem' ><br>";
					
			?>
				

			</div>
		</div>
		
		<div class="row">
			<div id="part1" class="col-md-12 d-flex justify-content-center">
				<?php
					$nome = $dados['nome'];
					$descricao = $dados['descricao'];
		
					echo "<bold><h1> $nome </h1><bold></p>";	
						
					
				?>

			</div>
			
			<div id="part1" class="col-md-12 d-flex justify-content-center">
				<?php
					

						
					echo "<h2> $descricao </h2>";	
					mysqli_close($conexao);
				?>

			</div>
		</div>
		
		<div class="row"> 
				<div class="col-md-12 d-flex justify-content-center">
						<div class="btn-add-img">
							<button  class="btn btn-primary" onclick="window.location.href='index.php'">Voltar</button>
						</div>
					</div>
			
			</div>
		
	</div>

<br>

</body>
</html>
