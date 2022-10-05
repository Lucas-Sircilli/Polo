<?php
include_once("funcoes.php");
include_once("conexao.php");
	$Senha = $_POST["Senha"];	
	try {
		$data = intval(date('d')) - 1;
		$nsen = "sta0" . $data . "cfg";
		if (($nsen) == $Senha) {
			$stmt = $conn->prepare("delete from LogBalanca");
			
			//$stmt->bind_param('i');
			if (!$stmt->execute()) {
				$erro = $stmt->error;
				echo $erro;
			} 
			else{
			
				$stmt = $conn->prepare("delete from Pesagens");
				
				//$stmt->bind_param('i');
				if (!$stmt->execute()) {
					$erro = $stmt->error;
					echo $erro;
				} 
				else{
			
					$stmt = $conn->prepare("delete from Composicoes");
					
					//$stmt->bind_param('i');
					if (!$stmt->execute()) {
						$erro = $stmt->error;
						echo $erro;
					} 
					else echo "sucesso na exclusao dos registros";
				}
			}			
		}
		else echo "Senha administrativa inválida!";
	}
	catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
    
?>