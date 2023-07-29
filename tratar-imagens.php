<?php
	$imgs = scandir('img');
	for($fig = 2; $fig < count($imgs);$fig++ )
	{
		echo "<img src='img/$imgs[$fig]' width='100px' heigth='100px'>&nbsp;&nbsp;";
	}
	
	
	// Limitando tipos de img para PNG e JPG
	if(substr($_FILES['img']['name'], -3)=="png")
	{
		// TO DO
		// move_uploaded_file
	}
	
	function randString($size)
	{
	 //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados
	 $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	 $return= "";
	 for($count= 0; $size > $count; $count++)
	 {
		//Gera um caracter aleatorio
		$return.= $basic[rand(0, strlen($basic) - 1)];
	 }
	 return $return;
	}
	
	// 20 caracteres com a extensão .png
	$nome_final = randString(20).".jpg";
	if(substr($_FILES['img']['name'], -3)=="jpg")
	{
		$dir = 'img/'; 
		$tmpName = $_FILES['img']['tmp_name']; 
		$name = $_FILES['img']['name']; 
		// move_uploaded_file
		if( move_uploaded_file( $tmpName, $dir . $nome_final) ) 
		{ 
			$mysql = new BancodeDados();
			$mysql->conecta();
			$sqlstring = "insert into imagens (id, img) values (null, '$nome_final')";
			mysqli_query($mysql->con, $sqlstring);
			header('Location: index.php'); 
		} 
	else 
	{
		echo "Erro ao gravar o img";
	}
	}
	else
	{
	echo "Não é documento png";
	}


?>