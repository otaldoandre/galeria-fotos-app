<?php 
	if (!isset($_SESSION))
	{
		session_start();
	}


  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "Você precisa logar primeiro";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
  

?>
<html>
<head>
	<title> Projeto Fotografias - Index </title>
	<script src="jquery-3.7.0.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<script src="https://kit.fontawesome.com/bd7b48f28d.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<nav class="navbar navbar-expand-lg navbar-light bg-light py-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style=" font-size: 25";>Sistema de Galeria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </div>
    </div>
  </div>
</nav>
	<section class="products">
		<div class="container">
			
			<div class="row">
				<ul class="nav navbar-nav navbar-left"> 
							<li class="navbar-text"> 
								<p>
								<strong> Bem vindo! </strong>
								Você está logado como 
								<strong> 
									etec
								</strong>
								 | 
								 <a href='?logout'>Log Out <a/>
								</p>
							</li>
						
						</ul>
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Galeria de Fotografias</h3>
						
					</div>
				</div>
				<div class="col-md-12 ">
						<div class="btn-add-img">
							<button  class="btn btn-primary" onclick="window.location.href='inclusao.php'">Adicionar Imagem</button>
						</div>
					</div>
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<?php 
								include_once('conexao.php');
					
								// ajustando a instrução select para ordenar por nome
								$query = mysqli_query($conexao, "select * from tblfotos order by nome");
								while($dados=mysqli_fetch_array($query)) 
								{
									$id = base64_encode($dados['id']);
									$nome = $dados['nome'];
									$imagem = $dados['imagem'];
												echo'<div class="product">';
													echo'<div class="product-img">';
														echo "<a href='ver_foto.php?id=$id'". 'target="_blank">';
															echo "<img src='img/$imagem' alt='$nome'>";
														echo '</a>';
													echo '</div>';
													echo '<div class="product-body">';
													
														echo  '<h3 class="product-name">';
															echo "<a href='#'>$nome</a>";
														echo '</h3>';
														echo '<div class="product-btns">';
															echo "<a href='apagar.php?id=$id'>";
																
																	echo '<i class="fa-solid fa-trash"></i>';
																
															echo '</a>';
															echo '<span></span><span></span><span></span>';
															echo "<a href='ver_foto.php?id=$id'>";
																	echo '<i class="fa-solid fa-magnifying-glass"></i>';
															echo '</a>';
														echo '</div>';
													echo '</div>';
												echo '</div>';
												echo '<span></span>';
									
								}
								mysqli_close($conexao);
							?>
						</div>
					</div>
				</div>
			</div>
			<br><br><br><br>
		</div>
</section>
</body>
</html> 