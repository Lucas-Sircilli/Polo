<?php
include_once("funcoes.php");
include_once("conexao.php");
	$IdComposicao = $_POST["IdComposicao"];	
    
    $stmt = $conn->prepare("UPDATE Composicoes SET Status=0, DataEnvio=null, Arquivo=null WHERE Id=?");

    $stmt->bind_param('i', $IdComposicao);
    if (!$stmt->execute()) {
        $erro = $stmt->error;
    } else {
        $sucesso = "Registro gravado com sucesso!";
    }
    
?>