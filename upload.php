<?php
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
	$nome_final = randString(20).".png";	

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
			echo "Erro ao gravar o arquivo";	
		}
	}
	else
	{
			echo "Não é documento png";
	}
?>


