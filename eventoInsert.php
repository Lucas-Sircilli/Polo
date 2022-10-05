<?php
include_once("funcoes.php");
include_once("conexao.php");
date_default_timezone_set('america/sao_paulo');

try {
	if (isset($_POST["Id"])) {

		$Id = mysqli_real_escape_string($conn, $_POST["Id"]);
		$Nome = mysqli_real_escape_string($conn, $_POST["Nome"]);
		$IdSala = mysqli_real_escape_string($conn, $_POST["IdSala"]);
		$DataInicio = mysqli_real_escape_string($conn, $_POST["DataInicio"]);
		$DataFim = mysqli_real_escape_string($conn, $_POST["DataFim"]);
		$Senha = mysqli_real_escape_string($conn, $_POST["Senha"]);
		$Usuario = mysqli_real_escape_string($conn, $_POST["Usuario"]);
		
		$di =strtotime(formata_data_mysql($DataInicio));
		$df =strtotime(formata_data_mysql($DataFim));
		if($di>=$df)
		{
			echo "A data inicial do evento precisa ser menor que a data final do evento";
			return;
		}
		
		$dic = formata_data_mysql($DataInicio);
		$dfc =  formata_data_mysql($DataFim);
		
		$sql = "SELECT * FROM eventos WHERE id_sala=".$IdSala." AND Id!=".$Id." AND ((data_inicio<='".$dic."' AND '".$dic."'<=data_fim) oR (data_inicio<='".$dfc."' AND '".$dfc."'<=data_fim) OR (data_inicio>='".$dic."' AND '".$dic."'>=data_fim)OR (data_inicio>='".$dfc."' AND '".$dfc."'>=data_fim)) ";
			
		$stmt = $conn->prepare($sql); //
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			echo "Já  existe um evento cadastrado neste periodo nesta mesma sala";
			return;
		}
		
		$sql = "SELECT * FROM eventos WHERE usuario='".$Usuario."' AND Id!=".$Id." AND senha='".$Senha."' ";
		
		$stmt = $conn->prepare($sql); //
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			echo "Já  existe um evento utilizando este usuario e senha em outro periodo. Troque a senha";
			return;
		}
		
		if ($Id == 0) {
			
			$stmt = $conn->prepare("INSERT INTO `eventos` (nome,id_sala,data_inicio, data_fim,senha,usuario,created,modified)   
					 VALUES (?,?,?,?,?,?, Now(), Now())");

			$stmt->bind_param(
				'sissss',
				$Nome,
				$IdSala,
				formata_data_mysql($DataInicio),
				formata_data_mysql($DataFim),
				$Senha,
				$Usuario
			);

			if (!$stmt->execute()) {
				echo '[' . $stmt->errno . "] " . $stmt->error;
			} else {
				echo "Registro gravado com sucesso!";
			}
		} else {
			
			$sql = "SELECT * FROM eventos WHERE id='".$Id."'";
			
			$stmt = $conn->prepare($sql); //
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $conn->prepare("UPDATE `eventos` SET nome=?,id_sala=?,data_inicio=?,data_fim=?,senha=?,usuario=? WHERE id=?");
			$stmt->bind_param(
				'sissssi',
				$Nome,
				$IdSala,
				formata_data_mysql($DataInicio),
				formata_data_mysql($DataFim),
				$Senha,
				$Usuario,
				$Id				
			);				
			
			
			if (!$stmt->execute()) {
				echo '[' . $stmt->errno . "] " . $stmt->error;
			} else {
				echo "Registro gravado com sucesso!";
			}
		}
	}
} catch (Exception $e) {
	$erro = $e->getMessage();
	echo json_encode($erro);
}
