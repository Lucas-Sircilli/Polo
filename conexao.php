<?php


	$servidor = "localhost";
	$usuario = "gvdsol57_poloarq";
	$senha = "drupal03031984";
	$dbname = "gvdsol57_poloarq";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	
?>