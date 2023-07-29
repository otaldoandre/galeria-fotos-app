<?php

	
	$id = $_GET['id'];
	///$mysql = new BancodeDados();
	//$mysql->conecta();
	
	include_once('conexao.php');
	// recuperando a informação da URL
	// verifica se parâmetro está correto e dento da normalidade 
	if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id'])))
	{
		$id = base64_decode($_GET['id']);
	} 
	else 
	{
		header('Location: index.php');
	}
	
	// recuperando o nome do arquivo 
	$sqlstring = "select * from tblfotos where id=$id";
	$query = mysqli_query($conexao, $sqlstring);
	$dados = mysqli_fetch_array($query);
	
	// excluindo o registro
	$sqlstring = "DELETE from tblfotos where id=$id";
	$resultado = mysqli_query($conexao, $sqlstring);
	///echo $dados['imagem'];
	///echo $resultado;
	unlink ('img/'.$dados['imagem']);
	mysqli_close($conexao);
	header('Location: index.php'); 

?>