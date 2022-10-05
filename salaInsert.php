<?php
include_once("funcoes.php");
include_once("conexao.php");
date_default_timezone_set('america/sao_paulo');

try {
	if (isset($_POST["Id"])) {

		$Id = mysqli_real_escape_string($conn, $_POST["Id"]);
		$Nome = mysqli_real_escape_string($conn, $_POST["Nome"]);
		$Usuario = mysqli_real_escape_string($conn, $_POST["Usuario"]);
		$UrlCamera = mysqli_real_escape_string($conn, $_POST["UrlCamera"]);
	

		if ($Id == 0) {
			$sql = "SELECT * FROM salas WHERE usuario='".$Usuario."'";
			
			$stmt = $conn->prepare($sql); //
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows > 0) {
				echo "Já existe uma sala cadastrada com este usuario";
				return;
			}
			$stmt = $conn->prepare("INSERT INTO `salas` (nome,url_camera,usuario,created,modified)   
					 VALUES (?,?,?,Now(), Now())");

			$stmt->bind_param(
				'sss',
				$Nome,
				$UrlCamera,
				$Usuario
			);

			if (!$stmt->execute()) {
				echo '[' . $stmt->errno . "] " . $stmt->error;
			} else {
				echo "Registro gravado com sucesso!";
			}
		} else {
			
			$sql = "SELECT * FROM salas WHERE id='".$Id."'";
			
			$stmt = $conn->prepare($sql); //
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $conn->prepare("UPDATE `salas` SET nome=?,url_camera=?,usuario=? WHERE id=?");
			$stmt->bind_param(
				'sssi',
				$Nome,
				$UrlCamera,
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
