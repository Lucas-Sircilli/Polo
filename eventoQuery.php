<?php
include_once("funcoes.php");
include_once("conexao.php");

date_default_timezone_set('america/sao_paulo');

try {
	if (isset($_POST["IdEvento"])) {
		

			$IdEvento= mysqli_real_escape_string($conn, $_POST["IdEvento"]);
			$sql = "SELECT * FROM eventos WHERE id='".$IdEvento."'";
			$stmt = $conn->prepare($sql); //
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$time = strtotime($row['data_inicio']);
			$row['data_inicio'] = date('d/m/Y H:i',$time);
			
			$time = strtotime($row['data_fim']);
			$row['data_fim'] = date('d/m/Y H:i',$time);
			
			$objeto = json_encode($row);	
				
			echo $objeto;
	} 
	else echo "falhou";
} catch (Exception $e) {
	$erro = $e->getMessage();
	echo json_encode($erro);
}

?>