<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>
<body>
<h3>CRUD - PHP com mysqli - Inclusão</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$nome = $_POST['nome'];	
	$descricao = $_POST['descricao'];	

	// criando a linha de INSERT
	$sqlinsert =  "insert into tabelafotos (nome, descricao) values ($nome, '$descricao')";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlinsert);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		echo "Registro Cadastrado com Sucesso";
	} 
	mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
