<?php
include_once("funcoes.php");
include_once("conexao.php");
$TituloPage = "Calibração";


$contador = 0;
function AjustaValor($valor, $retorno)
{
	global $contador;
	$contador++;

	$valor = $valor == null ? $retorno : $valor;

	return $valor;
};
try {
	if (isset($_POST["CodigoBalanca"])) {

		if (empty($_POST["CodigoBalanca"]))
			$erro = "Campo 'CodigoBalanca' é obrigatório";
		else if (empty($_POST["QtdSensores"]))
			$erro = "Campo 'Quantidade de Sensores' é obrigatório";
		else if (empty($_POST["MaxDrift"]))
			$erro = "Campo 'Max Drift' é obrigatório";
		else if (empty($_POST["MultPeso"]))
			$erro = "Campo 'Multiplicador de Peso' é obrigatório";
		else if (empty($_POST["MultVelocidade"]))
			$erro = "Campo 'Multiplicador de Velocidade' é obrigatório";
		else if (empty($_POST["DistSensores"]))
			$erro = "Campo 'Distancia dos sensores' é obrigatório";
		else {
			$id = AjustaValor(mysqli_real_escape_string($conn, $_POST["id"]), "1");
			$CodigoBalanca = AjustaValor(mysqli_real_escape_string($conn, $_POST["CodigoBalanca"]), "1");
			$QtdSensores  = AjustaValor(mysqli_real_escape_string($conn, $_POST["QtdSensores"]), "1");
			$MaxDrift    = AjustaValor(mysqli_real_escape_string($conn, $_POST["MaxDrift"]), "1");
			$MultPeso    = AjustaValor(mysqli_real_escape_string($conn, $_POST["MultPeso"]), "1");
			$MultPeso    = AjustaValor(mysqli_real_escape_string($conn, $_POST["MultPeso"]), "1");
			$MultVelocidade    = AjustaValor(mysqli_real_escape_string($conn, $_POST["MultVelocidade"]), "1");
			$DistSensores    = AjustaValor(mysqli_real_escape_string($conn, $_POST["DistSensores"]), "1");
			$TimeoutEncerramento    = AjustaValor(mysqli_real_escape_string($conn, $_POST["TimeoutEncerramento"]), "1");

			//Sensor1
			$S1Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1Habilitado"]), "1");
			$S1ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonE1"]), "1");
			$S1ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbE1"]), "1");
			$S1ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonD1"]), "1");
			$S1ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbD1"]), "1");
			$S1DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonE1"]), "1");
			$S1DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbE1"]), "1");
			$S1DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonD1"]), "1");
			$S1DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbD1"]), "1");
			$S1ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonE2"]), "1");
			$S1ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbE2"]), "1");
			$S1ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonD2"]), "1");
			$S1ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbD2"]), "1");
			$S1DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonE2"]), "1");
			$S1DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbE2"]), "1");
			$S1DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonD2"]), "1");
			$S1DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbD2"]), "1");
			$S1ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonE3"]), "1");
			$S1ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbE3"]), "1");
			$S1ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonD3"]), "1");
			$S1ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbD3"]), "1");
			$S1DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonE3"]), "1");
			$S1DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbE3"]), "1");
			$S1DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonD3"]), "1");
			$S1DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbD3"]), "1");
			$S1ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonE4"]), "1");
			$S1ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbE4"]), "1");
			$S1ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonD4"]), "1");
			$S1ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbD4"]), "1");
			$S1DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonE4"]), "1");
			$S1DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbE4"]), "1");
			$S1DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonD4"]), "1");
			$S1DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbD4"]), "1");
			
			$S1ETonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonC1"]), "1");
			$S1ELsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbC1"]), "1");
			$S1DTonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonC1"]), "1");
			$S1DLsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbC1"]), "1");
			$S1ETonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonC2"]), "1");
			$S1ELsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbC2"]), "1");
			$S1DTonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonC2"]), "1");
			$S1DLsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbC2"]), "1");
			$S1ETonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonC3"]), "1");
			$S1ELsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbC3"]), "1");
			$S1DTonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonC3"]), "1");
			$S1DLsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbC3"]), "1");
			$S1ETonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ETonC4"]), "1");
			$S1ELsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1ELsbC4"]), "1");
			$S1DTonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DTonC4"]), "1");
			$S1DLsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1DLsbC4"]), "1");
			
			$S1TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1TriggerInicial"]), "1");
			$S1TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S1TriggerFinal"]), "1");

			//Sensor2
			$S2Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2Habilitado"]), "1");
			$S2ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonE1"]), "1");
			$S2ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbE1"]), "1");
			$S2ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonD1"]), "1");
			$S2ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbD1"]), "1");
			$S2DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonE1"]), "1");
			$S2DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbE1"]), "1");
			$S2DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonD1"]), "1");
			$S2DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbD1"]), "1");
			$S2ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonE2"]), "1");
			$S2ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbE2"]), "1");
			$S2ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonD2"]), "1");
			$S2ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbD2"]), "1");
			$S2DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonE2"]), "1");
			$S2DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbE2"]), "1");
			$S2DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonD2"]), "1");
			$S2DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbD2"]), "1");
			$S2ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonE3"]), "1");
			$S2ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbE3"]), "1");
			$S2ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonD3"]), "1");
			$S2ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbD3"]), "1");
			$S2DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonE3"]), "1");
			$S2DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbE3"]), "1");
			$S2DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonD3"]), "1");
			$S2DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbD3"]), "1");
			$S2ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonE4"]), "1");
			$S2ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbE4"]), "1");
			$S2ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonD4"]), "1");
			$S2ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbD4"]), "1");
			$S2DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonE4"]), "1");
			$S2DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbE4"]), "1");
			$S2DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonD4"]), "1");
			$S2DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbD4"]), "1");
			
			$S2ETonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonC1"]), "1");
			$S2ELsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbC1"]), "1");
			$S2DTonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonC1"]), "1");
			$S2DLsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbC1"]), "1");
			$S2ETonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonC2"]), "1");
			$S2ELsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbC2"]), "1");
			$S2DTonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonC2"]), "1");
			$S2DLsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbC2"]), "1");
			$S2ETonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonC3"]), "1");
			$S2ELsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbC3"]), "1");
			$S2DTonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonC3"]), "1");
			$S2DLsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbC3"]), "1");
			$S2ETonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ETonC4"]), "1");
			$S2ELsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2ELsbC4"]), "1");
			$S2DTonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DTonC4"]), "1");
			$S2DLsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2DLsbC4"]), "1");
			$S2TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2TriggerInicial"]), "1");
			$S2TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S2TriggerFinal"]), "1");

			//Sensor3
			$S3Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3Habilitado"]), "1");
			$S3ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonE1"]), "1");
			$S3ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbE1"]), "1");
			$S3ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonD1"]), "1");
			$S3ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbD1"]), "1");
			$S3DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonE1"]), "1");
			$S3DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbE1"]), "1");
			$S3DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonD1"]), "1");
			$S3DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbD1"]), "1");
			$S3ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonE2"]), "1");
			$S3ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbE2"]), "1");
			$S3ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonD2"]), "1");
			$S3ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbD2"]), "1");
			$S3DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonE2"]), "1");
			$S3DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbE2"]), "1");
			$S3DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonD2"]), "1");
			$S3DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbD2"]), "1");
			$S3ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonE3"]), "1");
			$S3ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbE3"]), "1");
			$S3ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonD3"]), "1");
			$S3ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbD3"]), "1");
			$S3DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonE3"]), "1");
			$S3DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbE3"]), "1");
			$S3DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonD3"]), "1");
			$S3DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbD3"]), "1");
			$S3ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonE4"]), "1");
			$S3ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbE4"]), "1");
			$S3ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonD4"]), "1");
			$S3ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbD4"]), "1");
			$S3DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonE4"]), "1");
			$S3DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbE4"]), "1");
			$S3DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonD4"]), "1");
			$S3DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbD4"]), "1");
			
			$S3ETonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonC1"]), "1");
			$S3ELsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbC1"]), "1");
			$S3DTonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonC1"]), "1");
			$S3DLsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbC1"]), "1");
			$S3ETonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonC2"]), "1");
			$S3ELsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbC2"]), "1");
			$S3DTonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonC2"]), "1");
			$S3DLsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbC2"]), "1");
			$S3ETonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonC3"]), "1");
			$S3ELsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbC3"]), "1");
			$S3DTonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonC3"]), "1");
			$S3DLsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbC3"]), "1");
			$S3ETonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ETonC4"]), "1");
			$S3ELsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3ELsbC4"]), "1");
			$S3DTonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DTonC4"]), "1");
			$S3DLsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3DLsbC4"]), "1");
			$S3TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3TriggerInicial"]), "1");
			$S3TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S3TriggerFinal"]), "1");

			//Sensor4
			$S4Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4Habilitado"]), "1");
			$S4ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonE1"]), "1");
			$S4ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbE1"]), "1");
			$S4ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonD1"]), "1");
			$S4ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbD1"]), "1");
			$S4DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonE1"]), "1");
			$S4DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbE1"]), "1");
			$S4DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonD1"]), "1");
			$S4DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbD1"]), "1");
			$S4ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonE2"]), "1");
			$S4ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbE2"]), "1");
			$S4ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonD2"]), "1");
			$S4ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbD2"]), "1");
			$S4DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonE2"]), "1");
			$S4DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbE2"]), "1");
			$S4DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonD2"]), "1");
			$S4DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbD2"]), "1");
			$S4ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonE3"]), "1");
			$S4ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbE3"]), "1");
			$S4ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonD3"]), "1");
			$S4ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbD3"]), "1");
			$S4DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonE3"]), "1");
			$S4DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbE3"]), "1");
			$S4DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonD3"]), "1");
			$S4DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbD3"]), "1");
			$S4ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonE4"]), "1");
			$S4ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbE4"]), "1");
			$S4ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonD4"]), "1");
			$S4ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbD4"]), "1");
			$S4DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonE4"]), "1");
			$S4DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbE4"]), "1");
			$S4DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonD4"]), "1");
			$S4DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbD4"]), "1");
			
			$S4ETonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonC1"]), "1");
			$S4ELsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbC1"]), "1");
			$S4DTonC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonC1"]), "1");
			$S4DLsbC1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbC1"]), "1");
			$S4ETonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonC2"]), "1");
			$S4ELsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbC2"]), "1");
			$S4DTonC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonC2"]), "1");
			$S4DLsbC2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbC2"]), "1");
			$S4ETonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonC3"]), "1");
			$S4ELsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbC3"]), "1");
			$S4DTonC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonC3"]), "1");
			$S4DLsbC3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbC3"]), "1");
			$S4ETonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ETonC4"]), "1");
			$S4ELsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4ELsbC4"]), "1");
			$S4DTonC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DTonC4"]), "1");
			$S4DLsbC4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4DLsbC4"]), "1");
			$S4TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4TriggerInicial"]), "1");
			$S4TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S4TriggerFinal"]), "1");

			//Sensor5
			$S5Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5Habilitado"]), "1");
			$S5ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonE1"]), "1");
			$S5ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbE1"]), "1");
			$S5ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonD1"]), "1");
			$S5ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbD1"]), "1");
			$S5DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonE1"]), "1");
			$S5DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbE1"]), "1");
			$S5DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonD1"]), "1");
			$S5DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbD1"]), "1");
			$S5ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonE2"]), "1");
			$S5ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbE2"]), "1");
			$S5ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonD2"]), "1");
			$S5ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbD2"]), "1");
			$S5DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonE2"]), "1");
			$S5DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbE2"]), "1");
			$S5DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonD2"]), "1");
			$S5DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbD2"]), "1");
			$S5ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonE3"]), "1");
			$S5ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbE3"]), "1");
			$S5ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonD3"]), "1");
			$S5ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbD3"]), "1");
			$S5DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonE3"]), "1");
			$S5DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbE3"]), "1");
			$S5DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonD3"]), "1");
			$S5DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbD3"]), "1");
			$S5ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonE4"]), "1");
			$S5ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbE4"]), "1");
			$S5ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ETonD4"]), "1");
			$S5ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5ELsbD4"]), "1");
			$S5DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonE4"]), "1");
			$S5DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbE4"]), "1");
			$S5DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DTonD4"]), "1");
			$S5DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5DLsbD4"]), "1");
			$S5TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5TriggerInicial"]), "1");
			$S5TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S5TriggerFinal"]), "1");

			//Sensor6
			$S6Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6Habilitado"]), "1");
			$S6ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonE1"]), "1");
			$S6ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbE1"]), "1");
			$S6ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonD1"]), "1");
			$S6ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbD1"]), "1");
			$S6DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonE1"]), "1");
			$S6DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbE1"]), "1");
			$S6DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonD1"]), "1");
			$S6DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbD1"]), "1");
			$S6ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonE2"]), "1");
			$S6ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbE2"]), "1");
			$S6ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonD2"]), "1");
			$S6ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbD2"]), "1");
			$S6DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonE2"]), "1");
			$S6DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbE2"]), "1");
			$S6DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonD2"]), "1");
			$S6DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbD2"]), "1");
			$S6ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonE3"]), "1");
			$S6ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbE3"]), "1");
			$S6ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonD3"]), "1");
			$S6ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbD3"]), "1");
			$S6DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonE3"]), "1");
			$S6DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbE3"]), "1");
			$S6DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonD3"]), "1");
			$S6DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbD3"]), "1");
			$S6ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonE4"]), "1");
			$S6ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbE4"]), "1");
			$S6ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ETonD4"]), "1");
			$S6ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6ELsbD4"]), "1");
			$S6DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonE4"]), "1");
			$S6DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbE4"]), "1");
			$S6DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DTonD4"]), "1");
			$S6DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6DLsbD4"]), "1");
			$S6TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6TriggerInicial"]), "1");
			$S6TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S6TriggerFinal"]), "1");

			//Sensor7
			$S7Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7Habilitado"]), "1");
			$S7ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonE1"]), "1");
			$S7ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbE1"]), "1");
			$S7ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonD1"]), "1");
			$S7ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbD1"]), "1");
			$S7DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonE1"]), "1");
			$S7DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbE1"]), "1");
			$S7DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonD1"]), "1");
			$S7DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbD1"]), "1");
			$S7ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonE2"]), "1");
			$S7ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbE2"]), "1");
			$S7ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonD2"]), "1");
			$S7ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbD2"]), "1");
			$S7DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonE2"]), "1");
			$S7DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbE2"]), "1");
			$S7DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonD2"]), "1");
			$S7DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbD2"]), "1");
			$S7ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonE3"]), "1");
			$S7ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbE3"]), "1");
			$S7ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonD3"]), "1");
			$S7ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbD3"]), "1");
			$S7DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonE3"]), "1");
			$S7DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbE3"]), "1");
			$S7DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonD3"]), "1");
			$S7DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbD3"]), "1");
			$S7ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonE4"]), "1");
			$S7ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbE4"]), "1");
			$S7ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ETonD4"]), "1");
			$S7ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7ELsbD4"]), "1");
			$S7DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonE4"]), "1");
			$S7DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbE4"]), "1");
			$S7DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DTonD4"]), "1");
			$S7DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7DLsbD4"]), "1");
			$S7TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7TriggerInicial"]), "1");
			$S7TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S7TriggerFinal"]), "1");

			//Sensor8
			$S8Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8Habilitado"]), "1");
			$S8ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonE1"]), "1");
			$S8ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbE1"]), "1");
			$S8ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonD1"]), "1");
			$S8ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbD1"]), "1");
			$S8DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonE1"]), "1");
			$S8DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbE1"]), "1");
			$S8DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonD1"]), "1");
			$S8DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbD1"]), "1");
			$S8ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonE2"]), "1");
			$S8ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbE2"]), "1");
			$S8ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonD2"]), "1");
			$S8ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbD2"]), "1");
			$S8DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonE2"]), "1");
			$S8DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbE2"]), "1");
			$S8DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonD2"]), "1");
			$S8DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbD2"]), "1");
			$S8ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonE3"]), "1");
			$S8ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbE3"]), "1");
			$S8ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonD3"]), "1");
			$S8ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbD3"]), "1");
			$S8DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonE3"]), "1");
			$S8DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbE3"]), "1");
			$S8DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonD3"]), "1");
			$S8DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbD3"]), "1");
			$S8ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonE4"]), "1");
			$S8ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbE4"]), "1");
			$S8ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ETonD4"]), "1");
			$S8ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8ELsbD4"]), "1");
			$S8DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonE4"]), "1");
			$S8DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbE4"]), "1");
			$S8DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DTonD4"]), "1");
			$S8DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8DLsbD4"]), "1");
			$S8TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8TriggerInicial"]), "1");
			$S8TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S8TriggerFinal"]), "1");

			//Sensor9
			$S9Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9Habilitado"]), "1");
			$S9ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonE1"]), "1");
			$S9ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbE1"]), "1");
			$S9ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonD1"]), "1");
			$S9ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbD1"]), "1");
			$S9DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonE1"]), "1");
			$S9DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbE1"]), "1");
			$S9DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonD1"]), "1");
			$S9DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbD1"]), "1");
			$S9ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonE2"]), "1");
			$S9ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbE2"]), "1");
			$S9ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonD2"]), "1");
			$S9ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbD2"]), "1");
			$S9DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonE2"]), "1");
			$S9DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbE2"]), "1");
			$S9DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonD2"]), "1");
			$S9DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbD2"]), "1");
			$S9ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonE3"]), "1");
			$S9ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbE3"]), "1");
			$S9ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonD3"]), "1");
			$S9ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbD3"]), "1");
			$S9DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonE3"]), "1");
			$S9DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbE3"]), "1");
			$S9DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonD3"]), "1");
			$S9DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbD3"]), "1");
			$S9ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonE4"]), "1");
			$S9ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbE4"]), "1");
			$S9ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ETonD4"]), "1");
			$S9ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9ELsbD4"]), "1");
			$S9DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonE4"]), "1");
			$S9DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbE4"]), "1");
			$S9DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DTonD4"]), "1");
			$S9DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9DLsbD4"]), "1");
			$S9TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9TriggerInicial"]), "1");
			$S9TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S9TriggerFinal"]), "1");

			//Sensor10
			$S10Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10Habilitado"]), "1");
			$S10ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonE1"]), "1");
			$S10ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbE1"]), "1");
			$S10ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonD1"]), "1");
			$S10ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbD1"]), "1");
			$S10DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonE1"]), "1");
			$S10DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbE1"]), "1");
			$S10DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonD1"]), "1");
			$S10DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbD1"]), "1");
			$S10ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonE2"]), "1");
			$S10ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbE2"]), "1");
			$S10ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonD2"]), "1");
			$S10ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbD2"]), "1");
			$S10DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonE2"]), "1");
			$S10DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbE2"]), "1");
			$S10DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonD2"]), "1");
			$S10DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbD2"]), "1");
			$S10ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonE3"]), "1");
			$S10ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbE3"]), "1");
			$S10ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonD3"]), "1");
			$S10ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbD3"]), "1");
			$S10DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonE3"]), "1");
			$S10DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbE3"]), "1");
			$S10DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonD3"]), "1");
			$S10DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbD3"]), "1");
			$S10ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonE4"]), "1");
			$S10ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbE4"]), "1");
			$S10ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ETonD4"]), "1");
			$S10ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10ELsbD4"]), "1");
			$S10DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonE4"]), "1");
			$S10DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbE4"]), "1");
			$S10DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DTonD4"]), "1");
			$S10DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10DLsbD4"]), "1");
			$S10TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10TriggerInicial"]), "1");
			$S10TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S10TriggerFinal"]), "1");

			//Sensor11
			$S11Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11Habilitado"]), "1");
			$S11ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonE1"]), "1");
			$S11ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbE1"]), "1");
			$S11ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonD1"]), "1");
			$S11ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbD1"]), "1");
			$S11DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonE1"]), "1");
			$S11DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbE1"]), "1");
			$S11DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonD1"]), "1");
			$S11DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbD1"]), "1");
			$S11ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonE2"]), "1");
			$S11ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbE2"]), "1");
			$S11ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonD2"]), "1");
			$S11ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbD2"]), "1");
			$S11DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonE2"]), "1");
			$S11DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbE2"]), "1");
			$S11DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonD2"]), "1");
			$S11DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbD2"]), "1");
			$S11ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonE3"]), "1");
			$S11ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbE3"]), "1");
			$S11ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonD3"]), "1");
			$S11ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbD3"]), "1");
			$S11DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonE3"]), "1");
			$S11DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbE3"]), "1");
			$S11DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonD3"]), "1");
			$S11DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbD3"]), "1");
			$S11ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonE4"]), "1");
			$S11ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbE4"]), "1");
			$S11ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ETonD4"]), "1");
			$S11ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11ELsbD4"]), "1");
			$S11DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonE4"]), "1");
			$S11DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbE4"]), "1");
			$S11DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DTonD4"]), "1");
			$S11DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11DLsbD4"]), "1");
			$S11TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11TriggerInicial"]), "1");
			$S11TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S11TriggerFinal"]), "1");

			//Sensor12
			$S12Habilitado = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12Habilitado"]), "1");
			$S12ETonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonE1"]), "1");
			$S12ELsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbE1"]), "1");
			$S12ETonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonD1"]), "1");
			$S12ELsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbD1"]), "1");
			$S12DTonE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonE1"]), "1");
			$S12DLsbE1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbE1"]), "1");
			$S12DTonD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonD1"]), "1");
			$S12DLsbD1 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbD1"]), "1");
			$S12ETonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonE2"]), "1");
			$S12ELsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbE2"]), "1");
			$S12ETonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonD2"]), "1");
			$S12ELsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbD2"]), "1");
			$S12DTonE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonE2"]), "1");
			$S12DLsbE2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbE2"]), "1");
			$S12DTonD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonD2"]), "1");
			$S12DLsbD2 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbD2"]), "1");
			$S12ETonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonE3"]), "1");
			$S12ELsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbE3"]), "1");
			$S12ETonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonD3"]), "1");
			$S12ELsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbD3"]), "1");
			$S12DTonE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonE3"]), "1");
			$S12DLsbE3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbE3"]), "1");
			$S12DTonD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonD3"]), "1");
			$S12DLsbD3 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbD3"]), "1");
			$S12ETonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonE4"]), "1");
			$S12ELsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbE4"]), "1");
			$S12ETonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ETonD4"]), "1");
			$S12ELsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12ELsbD4"]), "1");
			$S12DTonE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonE4"]), "1");
			$S12DLsbE4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbE4"]), "1");
			$S12DTonD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DTonD4"]), "1");
			$S12DLsbD4 = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12DLsbD4"]), "1");
			$S12TriggerInicial = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12TriggerInicial"]), "1");
			$S12TriggerFinal = AjustaValor(mysqli_real_escape_string($conn, $_POST["S12TriggerFinal"]), "1");
			$contador = 0;

			if ($id == -1) {
				include_once("calibracaoInsert.php");
			} else if (is_numeric($id) && $id >= 1) {
				include_once("calibracaoUpdate.php");
			}
		}
	}

	include_once("calibracaoQuery.php");
} catch (Exception $e) {
	echo "dddddd";
	$erro = "ddddd" . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta name="author" content="Douglas Chiodi - GVD Soluções Inteligentes">
	<link rel="icon" href="imagens/favicon.ico">
	<title><?= $TituloPage ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</head>

<body onload="MudaQtdSensores()">

	<?php include 'menu.php'; ?>

	<div class="container ">
		<form id="FormCalibracao" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
			<div class="row">
				<div class="col-sm-2 form-group form-group-sm">
					<label class="control-label">Código Balança</label>
					<input type="text" name="CodigoBalanca" id="CodigoBalanca" class="form-control" value="<?= $CodigoBalanca ?>" required="required" title="">
					<input type="text" name="id" id="id" class="form-control" value="<?= $id ?>" style="display:none">
				</div>
				<div class="col-sm-2 form-group form-group-sm">
					<label class="control-label">Quant. de Sensores </label>
					<select class="form-control" name="QtdSensores" id="QtdSensores" onchange="MudaQtdSensores();">
						<option value="1" <?= ($QtdSensores == '1') ? 'selected' : '' ?>>1</option>
						<option value="2" <?= ($QtdSensores == '2') ? 'selected' : '' ?>>2</option>
						<option value="3" <?= ($QtdSensores == '3') ? 'selected' : '' ?>>3</option>
						<option value="4" <?= ($QtdSensores == '4') ? 'selected' : '' ?>>4</option>
						<option value="5" <?= ($QtdSensores == '5') ? 'selected' : '' ?> style="display:none">5</option>
						<option value="6" <?= ($QtdSensores == '6') ? 'selected' : '' ?> style="display:none">6</option>
						<option value="7" <?= ($QtdSensores == '7') ? 'selected' : '' ?> style="display:none">7</option>
						<option value="8" <?= ($QtdSensores == '8') ? 'selected' : '' ?> style="display:none">8</option>
						<option value="9" <?= ($QtdSensores == '9') ? 'selected' : '' ?> style="display:none">9</option>
						<option value="10" <?= ($QtdSensores == '10') ? 'selected' : '' ?> style="display:none">10</option>
						<option value="11" <?= ($QtdSensores == '11') ? 'selected' : '' ?> style="display:none">11</option>
						<option value="12" <?= ($QtdSensores == '12') ? 'selected' : '' ?> style="display:none">12</option>
					</select>
				</div>
				<div class="col-sm-2 form-group form-group-sm">
					<label class="control-label">Max Drift</label>
					<input type="number" step="0.000000001" name="MaxDrift" id="MaxDrift" class="form-control" value="<?= $MaxDrift ?>" required="required" title="">
				</div>
				<div class="col-sm-2 form-group form-group-sm">
					<label class="control-label">Mult Peso</label>
					<input type="number" step="0.000000001" name="MultPeso" id="MultPeso" class="form-control" value="<?= $MultPeso ?>" required="required" title="">
				</div>
				<div class="col-sm-2 form-group form-group-sm">
					<label class="control-label">Mult Velocidade</label>
					<input type="number" step="0.000000001" name="MultVelocidade" id="MultVelocidade" class="form-control" value="<?= $MultVelocidade ?>" required="required" title="">
				</div>
				<div class="col-sm-2 form-group form-group-sm">
					<label class="control-label">Distância eixos (m)</label>
					<input type="number" step="0.000000001" name="DistSensores" id="DistSensores" class="form-control" value="<?= $DistSensores ?>" required="required" title="">
				</div>

			</div>
			<div class="row">
				<div class="col-sm-2 form-group form-group-sm">
					<label class="control-label">TimeOut Encerramento (ms)</label>
					<input type="number" step="0.000000001" name="TimeoutEncerramento" id="TimeoutEncerramento" class="form-control" value="<?= $TimeoutEncerramento ?>" required="required" title="">
				</div>
				<div class="col-sm-9 form-group form-group-sm">
					<?php
					if (isset($erro))
						echo '<div style="color:firebrick">' . $erro . '</div><br/><br/>';
					else
								if (isset($sucesso))
						echo '<div style="color:#00f">' . $sucesso . '</div><br/><br/>';
					?>
				</div>
				<div class="col-sm-1 form-group form-group-sm text-right">
					<label class="control-label">&nbsp;&nbsp;    </label>
					<button class="form-control botoes btn btn-success" type="submit">Gravar</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 form-group-sm" id="PnPares">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Ativação de Pares</label></div>
									<div class="col-sm-2">										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-3 form-group form-group-sm">
									<label class="control-label">Par 1</label>
									<select class="form-control" name="S1Habilitado" id="S1Habilitado">
										<option value="0" <?= ($S1Habilitado == '0') ? 'selected' : '' ?>>Desabilitado</option>
										<option value="1" <?= ($S1Habilitado == '1') ? 'selected' : '' ?>>Habilitado</option>
									</select>
								</div>
								<div class="col-sm-3 form-group form-group-sm">
									<label class="control-label">Par 2</label>
									<select class="form-control" name="S2Habilitado" id="S2Habilitado">
											<option value="0" <?= ($S2Habilitado == '0') ? 'selected' : '' ?>>Desabilitado</option>
											<option value="1" <?= ($S2Habilitado == '1') ? 'selected' : '' ?>>Habilitado</option>
										</select>
								</div>
								<div class="col-sm-3 form-group form-group-sm">
									<label class="control-label">Par 3</label>
									<select class="form-control" name="S3Habilitado" id="S3Habilitado">
										<option value="0" <?= ($S3Habilitado == '0') ? 'selected' : '' ?>>Desabilitado</option>
										<option value="1" <?= ($S3Habilitado == '1') ? 'selected' : '' ?>>Habilitado</option>
									</select>
								</div>
								<div class="col-sm-3 form-group form-group-sm">
									<label class="control-label">Par 4</label>
									<select class="form-control" name="S4Habilitado" id="S4Habilitado">
										<option value="0" <?= ($S4Habilitado == '0') ? 'selected' : '' ?>>Desabilitado</option>
										<option value="1" <?= ($S4Habilitado == '1') ? 'selected' : '' ?>>Habilitado</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 form-group-sm" id="PnTriggers">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Trigger Sensores</label></div>
									<div class="col-sm-2">										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-4 form-group form-group-sm">
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S1 T.Inicial</label>
											<input type="number" step="0.000000001" name="S1TriggerInicial" id="S1TriggerInicial" class="form-control" value="<?= $S1TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S1 T.Final</label>
											<input type="number" step="0.000000001" name="S1TriggerFinal" id="S1TriggerFinal" class="form-control" value="<?= $S1TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S4 T.Inicial</label>
											<input type="number" step="0.000000001" name="S4TriggerInicial" id="S4TriggerInicial" class="form-control" value="<?= $S4TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S4 T.Final</label>
											<input type="number" step="0.000000001" name="S4TriggerFinal" id="S4TriggerFinal" class="form-control" value="<?= $S4TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S7 T.Inicial</label>
											<input type="number" step="0.000000001" name="S7TriggerInicial" id="S7TriggerInicial" class="form-control" value="<?= $S7TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S7 T.Final</label>
											<input type="number" step="0.000000001" name="S7TriggerFinal" id="S7TriggerFinal" class="form-control" value="<?= $S7TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S10 T.Inicial</label>
											<input type="number" step="0.000000001" name="S10TriggerInicial" id="S10TriggerInicial" class="form-control" value="<?= $S10TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S10 T.Final</label>
											<input type="number" step="0.000000001" name="S10TriggerFinal" id="S10TriggerFinal" class="form-control" value="<?= $S10TriggerFinal ?>" title="">
										</div>
									</div>
								</div>
								<div class="col-sm-4 form-group form-group-sm" style="border-left-width: medium;  border-left-style: outset;">
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S2 T.Inicial</label>
											<input type="number" step="0.000000001" name="S2TriggerInicial" id="S2TriggerInicial" class="form-control" value="<?= $S2TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S2 T.Final</label>
											<input type="number" step="0.000000001" name="S2TriggerFinal" id="S2TriggerFinal" class="form-control" value="<?= $S2TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S5 T.Inicial</label>
											<input type="number" step="0.000000001" name="S5TriggerInicial" id="S5TriggerInicial" class="form-control" value="<?= $S5TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S5 T.Final</label>
											<input type="number" step="0.000000001" name="S5TriggerFinal" id="S5TriggerFinal" class="form-control" value="<?= $S5TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S8 T.Inicial</label>
											<input type="number" step="0.000000001" name="S8TriggerInicial" id="S8TriggerInicial" class="form-control" value="<?= $S8TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S8 T.Final</label>
											<input type="number" step="0.000000001" name="S8TriggerFinal" id="S8TriggerFinal" class="form-control" value="<?= $S8TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S11 T.Inicial</label>
											<input type="number" step="0.000000001" name="S11TriggerInicial" id="S11TriggerInicial" class="form-control" value="<?= $S11TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S11 T.Final</label>
											<input type="number" step="0.000000001" name="S11TriggerFinal" id="S11TriggerFinal" class="form-control" value="<?= $S11TriggerFinal ?>" title="">
										</div>
									</div>
								</div>
								<div class="col-sm-4 form-group form-group-sm" style="border-left-width: medium;  border-left-style: outset;">
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S3 T.Inicial</label>
											<input type="number" step="0.000000001" name="S3TriggerInicial" id="S3TriggerInicial" class="form-control" value="<?= $S3TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S3 T.Final</label>
											<input type="number" step="0.000000001" name="S3TriggerFinal" id="S3TriggerFinal" class="form-control" value="<?= $S3TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S6 T.Inicial</label>
											<input type="number" step="0.000000001" name="S6TriggerInicial" id="S6TriggerInicial" class="form-control" value="<?= $S6TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S6 T.Final</label>
											<input type="number" step="0.000000001" name="S6TriggerFinal" id="S6TriggerFinal" class="form-control" value="<?= $S6TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S9 T.Inicial</label>
											<input type="number" step="0.000000001" name="S9TriggerInicial" id="S9TriggerInicial" class="form-control" value="<?= $S9TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S9 T.Final</label>
											<input type="number" step="0.000000001" name="S9TriggerFinal" id="S9TriggerFinal" class="form-control" value="<?= $S9TriggerFinal ?>" title="">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S12 T.Inicial</label>
											<input type="number" step="0.000000001" name="S12TriggerInicial" id="S12TriggerInicial" class="form-control" value="<?= $S12TriggerInicial ?>" title="">
										</div>
										<div class="col-sm-6 form-group form-group-sm">
											<label class="control-label">S12 T.Final</label>
											<input type="number" step="0.000000001" name="S12TriggerFinal" id="S12TriggerFinal" class="form-control" value="<?= $S12TriggerFinal ?>" title="">
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<!--Sensor 1-->
				<div class="col-sm-12 form-group-sm" id="PnSensor1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-12"><label class="control-label">Calibração Par 1</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="6" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="6" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonE1" id="S1ETonE1" class="form-control maskN" value="<?= $S1ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbE1" id="S1ELsbE1" class="form-control" value="<?= $S1ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonC1" id="S1ETonC1" class="form-control maskN" value="<?= $S1ETonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbC1" id="S1ELsbC1" class="form-control" value="<?= $S1ELsbC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonD1" id="S1ETonD1" class="form-control" value="<?= $S1ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbD1" id="S1ELsbD1" class="form-control" value="<?= $S1ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonE1" id="S1DTonE1" class="form-control" value="<?= $S1DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbE1" id="S1DLsbE1" class="form-control" value="<?= $S1DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonC1" id="S1DTonC1" class="form-control" value="<?= $S1DTonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbC1" id="S1DLsbC1" class="form-control" value="<?= $S1DLsbC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonD1" id="S1DTonD1" class="form-control" value="<?= $S1DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbD1" id="S1DLsbD1" class="form-control" value="<?= $S1DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonE2" id="S1ETonE2" class="form-control" value="<?= $S1ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbE2" id="S1ELsbE2" class="form-control" value="<?= $S1ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonC2" id="S1ETonC2" class="form-control" value="<?= $S1ETonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbC2" id="S1ELsbC2" class="form-control" value="<?= $S1ELsbC2 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S1ETonD2" id="S1ETonD2" class="form-control" value="<?= $S1ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbD2" id="S1ELsbD2" class="form-control" value="<?= $S1ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonE2" id="S1DTonE2" class="form-control" value="<?= $S1DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbE2" id="S1DLsbE2" class="form-control" value="<?= $S1DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonC2" id="S1DTonC2" class="form-control" value="<?= $S1DTonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbC2" id="S1DLsbC2" class="form-control" value="<?= $S1DLsbC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonD2" id="S1DTonD2" class="form-control" value="<?= $S1DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbD2" id="S1DLsbD2" class="form-control" value="<?= $S1DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonE3" id="S1ETonE3" class="form-control" value="<?= $S1ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbE3" id="S1ELsbE3" class="form-control" value="<?= $S1ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonC3" id="S1ETonC3" class="form-control" value="<?= $S1ETonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbC3" id="S1ELsbC3" class="form-control" value="<?= $S1ELsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S1ETonD3" id="S1ETonD3" class="form-control" value="<?= $S1ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbD3" id="S1ELsbD3" class="form-control" value="<?= $S1ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonE3" id="S1DTonE3" class="form-control" value="<?= $S1DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbE3" id="S1DLsbE3" class="form-control" value="<?= $S1DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonC3" id="S1DTonC3" class="form-control" value="<?= $S1DTonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbC3" id="S1DLsbC3" class="form-control" value="<?= $S1DLsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S1DTonD3" id="S1DTonD3" class="form-control" value="<?= $S1DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbD3" id="S1DLsbD3" class="form-control" value="<?= $S1DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonE4" id="S1ETonE4" class="form-control" value="<?= $S1ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbE4" id="S1ELsbE4" class="form-control" value="<?= $S1ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ETonC4" id="S1ETonC4" class="form-control" value="<?= $S1ETonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbC4" id="S1ELsbC4" class="form-control" value="<?= $S1ELsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S1ETonD4" id="S1ETonD4" class="form-control" value="<?= $S1ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1ELsbD4" id="S1ELsbD4" class="form-control" value="<?= $S1ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonE4" id="S1DTonE4" class="form-control" value="<?= $S1DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbE4" id="S1DLsbE4" class="form-control" value="<?= $S1DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DTonC4" id="S1DTonC4" class="form-control" value="<?= $S1DTonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbC4" id="S1DLsbC4" class="form-control" value="<?= $S1DLsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S1DTonD4" id="S1DTonD4" class="form-control" value="<?= $S1DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S1DLsbD4" id="S1DLsbD4" class="form-control" value="<?= $S1DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<!--Sensor 2-->
				<div class="col-sm-12 form-group-sm" id="PnSensor2">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Calibração Par 2</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="6" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="6" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonE1" id="S2ETonE1" class="form-control" value="<?= $S2ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbE1" id="S2ELsbE1" class="form-control" value="<?= $S2ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonC1" id="S2ETonC1" class="form-control" value="<?= $S2ETonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbC1" id="S2ELsbC1" class="form-control" value="<?= $S2ELsbC1 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2ETonD1" id="S2ETonD1" class="form-control" value="<?= $S2ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbD1" id="S2ELsbD1" class="form-control" value="<?= $S2ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonE1" id="S2DTonE1" class="form-control" value="<?= $S2DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbE1" id="S2DLsbE1" class="form-control" value="<?= $S2DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonC1" id="S2DTonC1" class="form-control" value="<?= $S2DTonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbC1" id="S2DLsbC1" class="form-control" value="<?= $S2DLsbC1 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2DTonD1" id="S2DTonD1" class="form-control" value="<?= $S2DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbD1" id="S2DLsbD1" class="form-control" value="<?= $S2DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonE2" id="S2ETonE2" class="form-control" value="<?= $S2ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbE2" id="S2ELsbE2" class="form-control" value="<?= $S2ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonC2" id="S2ETonC2" class="form-control" value="<?= $S2ETonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbC2" id="S2ELsbC2" class="form-control" value="<?= $S2ELsbC2 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2ETonD2" id="S2ETonD2" class="form-control" value="<?= $S2ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbD2" id="S2ELsbD2" class="form-control" value="<?= $S2ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonE2" id="S2DTonE2" class="form-control" value="<?= $S2DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbE2" id="S2DLsbE2" class="form-control" value="<?= $S2DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonC2" id="S2DTonC2" class="form-control" value="<?= $S2DTonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbC2" id="S2DLsbC2" class="form-control" value="<?= $S2DLsbC2 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2DTonD2" id="S2DTonD2" class="form-control" value="<?= $S2DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbD2" id="S2DLsbD2" class="form-control" value="<?= $S2DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonE3" id="S2ETonE3" class="form-control" value="<?= $S2ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbE3" id="S2ELsbE3" class="form-control" value="<?= $S2ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonC3" id="S2ETonC3" class="form-control" value="<?= $S2ETonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbC3" id="S2ELsbC3" class="form-control" value="<?= $S2ELsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2ETonD3" id="S2ETonD3" class="form-control" value="<?= $S2ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbD3" id="S2ELsbD3" class="form-control" value="<?= $S2ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonE3" id="S2DTonE3" class="form-control" value="<?= $S2DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbE3" id="S2DLsbE3" class="form-control" value="<?= $S2DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonC3" id="S2DTonC3" class="form-control" value="<?= $S2DTonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbC3" id="S2DLsbC3" class="form-control" value="<?= $S2DLsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2DTonD3" id="S2DTonD3" class="form-control" value="<?= $S2DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbD3" id="S2DLsbD3" class="form-control" value="<?= $S2DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonE4" id="S2ETonE4" class="form-control" value="<?= $S2ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbE4" id="S2ELsbE4" class="form-control" value="<?= $S2ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ETonC4" id="S2ETonC4" class="form-control" value="<?= $S2ETonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbC4" id="S2ELsbC4" class="form-control" value="<?= $S2ELsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2ETonD4" id="S2ETonD4" class="form-control" value="<?= $S2ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2ELsbD4" id="S2ELsbD4" class="form-control" value="<?= $S2ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonE4" id="S2DTonE4" class="form-control" value="<?= $S2DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbE4" id="S2DLsbE4" class="form-control" value="<?= $S2DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DTonC4" id="S2DTonC4" class="form-control" value="<?= $S2DTonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbC4" id="S2DLsbC4" class="form-control" value="<?= $S2DLsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S2DTonD4" id="S2DTonD4" class="form-control" value="<?= $S2DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S2DLsbD4" id="S2DLsbD4" class="form-control" value="<?= $S2DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<!--Sensor 3-->
				<div class="col-sm-12 form-group-sm" id="PnSensor3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Calibração Par 3</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="6" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="6" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonE1" id="S3ETonE1" class="form-control maskN" value="<?= $S3ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbE1" id="S3ELsbE1" class="form-control" value="<?= $S3ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonC1" id="S3ETonC1" class="form-control maskN" value="<?= $S3ETonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbC1" id="S3ELsbC1" class="form-control" value="<?= $S3ELsbC1 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3ETonD1" id="S3ETonD1" class="form-control" value="<?= $S3ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbD1" id="S3ELsbD1" class="form-control" value="<?= $S3ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonE1" id="S3DTonE1" class="form-control" value="<?= $S3DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbE1" id="S3DLsbE1" class="form-control" value="<?= $S3DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonC1" id="S3DTonC1" class="form-control" value="<?= $S3DTonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbC1" id="S3DLsbC1" class="form-control" value="<?= $S3DLsbC1 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3DTonD1" id="S3DTonD1" class="form-control" value="<?= $S3DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbD1" id="S3DLsbD1" class="form-control" value="<?= $S3DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonE2" id="S3ETonE2" class="form-control" value="<?= $S3ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbE2" id="S3ELsbE2" class="form-control" value="<?= $S3ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonC2" id="S3ETonC2" class="form-control" value="<?= $S3ETonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbC2" id="S3ELsbC2" class="form-control" value="<?= $S3ELsbC2 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3ETonD2" id="S3ETonD2" class="form-control" value="<?= $S3ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbD2" id="S3ELsbD2" class="form-control" value="<?= $S3ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonE2" id="S3DTonE2" class="form-control" value="<?= $S3DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbE2" id="S3DLsbE2" class="form-control" value="<?= $S3DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonC2" id="S3DTonC2" class="form-control" value="<?= $S3DTonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbC2" id="S3DLsbC2" class="form-control" value="<?= $S3DLsbC2 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3DTonD2" id="S3DTonD2" class="form-control" value="<?= $S3DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbD2" id="S3DLsbD2" class="form-control" value="<?= $S3DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonE3" id="S3ETonE3" class="form-control" value="<?= $S3ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbE3" id="S3ELsbE3" class="form-control" value="<?= $S3ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonC3" id="S3ETonC3" class="form-control" value="<?= $S3ETonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbC3" id="S3ELsbC3" class="form-control" value="<?= $S3ELsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3ETonD3" id="S3ETonD3" class="form-control" value="<?= $S3ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbD3" id="S3ELsbD3" class="form-control" value="<?= $S3ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonE3" id="S3DTonE3" class="form-control" value="<?= $S3DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbE3" id="S3DLsbE3" class="form-control" value="<?= $S3DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonC3" id="S3DTonC3" class="form-control" value="<?= $S3DTonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbC3" id="S3DLsbC3" class="form-control" value="<?= $S3DLsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3DTonD3" id="S3DTonD3" class="form-control" value="<?= $S3DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbD3" id="S3DLsbD3" class="form-control" value="<?= $S3DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonE4" id="S3ETonE4" class="form-control" value="<?= $S3ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbE4" id="S3ELsbE4" class="form-control" value="<?= $S3ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ETonC4" id="S3ETonC4" class="form-control" value="<?= $S3ETonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbC4" id="S3ELsbC4" class="form-control" value="<?= $S3ELsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3ETonD4" id="S3ETonD4" class="form-control" value="<?= $S3ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3ELsbD4" id="S3ELsbD4" class="form-control" value="<?= $S3ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonE4" id="S3DTonE4" class="form-control" value="<?= $S3DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbE4" id="S3DLsbE4" class="form-control" value="<?= $S3DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DTonC4" id="S3DTonC4" class="form-control" value="<?= $S3DTonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbC4" id="S3DLsbC4" class="form-control" value="<?= $S3DLsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S3DTonD4" id="S3DTonD4" class="form-control" value="<?= $S3DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S3DLsbD4" id="S3DLsbD4" class="form-control" value="<?= $S3DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<!--Sensor 4-->
				<div class="col-sm-12 form-group-sm" id="PnSensor4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Calibração Par 4</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="6" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="6" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton C</th>
												<th nowrap>Lsbs C</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonE1" id="S4ETonE1" class="form-control maskN" value="<?= $S4ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbE1" id="S4ELsbE1" class="form-control" value="<?= $S4ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonC1" id="S4ETonC1" class="form-control maskN" value="<?= $S4ETonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbC1" id="S4ELsbC1" class="form-control" value="<?= $S4ELsbC1 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4ETonD1" id="S4ETonD1" class="form-control" value="<?= $S4ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbD1" id="S4ELsbD1" class="form-control" value="<?= $S4ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonE1" id="S4DTonE1" class="form-control" value="<?= $S4DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbE1" id="S4DLsbE1" class="form-control" value="<?= $S4DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonC1" id="S4DTonC1" class="form-control" value="<?= $S4DTonC1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbC1" id="S4DLsbC1" class="form-control" value="<?= $S4DLsbC1 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4DTonD1" id="S4DTonD1" class="form-control" value="<?= $S4DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbD1" id="S4DLsbD1" class="form-control" value="<?= $S4DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonE2" id="S4ETonE2" class="form-control" value="<?= $S4ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbE2" id="S4ELsbE2" class="form-control" value="<?= $S4ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonC2" id="S4ETonC2" class="form-control" value="<?= $S4ETonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbC2" id="S4ELsbC2" class="form-control" value="<?= $S4ELsbC2 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4ETonD2" id="S4ETonD2" class="form-control" value="<?= $S4ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbD2" id="S4ELsbD2" class="form-control" value="<?= $S4ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonE2" id="S4DTonE2" class="form-control" value="<?= $S4DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbE2" id="S4DLsbE2" class="form-control" value="<?= $S4DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonC2" id="S4DTonC2" class="form-control" value="<?= $S4DTonC2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbC2" id="S4DLsbC2" class="form-control" value="<?= $S4DLsbC2 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4DTonD2" id="S4DTonD2" class="form-control" value="<?= $S4DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbD2" id="S4DLsbD2" class="form-control" value="<?= $S4DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonE3" id="S4ETonE3" class="form-control" value="<?= $S4ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbE3" id="S4ELsbE3" class="form-control" value="<?= $S4ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonC3" id="S4ETonC3" class="form-control" value="<?= $S4ETonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbC3" id="S4ELsbC3" class="form-control" value="<?= $S4ELsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4ETonD3" id="S4ETonD3" class="form-control" value="<?= $S4ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbD3" id="S4ELsbD3" class="form-control" value="<?= $S4ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonE3" id="S4DTonE3" class="form-control" value="<?= $S4DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbE3" id="S4DLsbE3" class="form-control" value="<?= $S4DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonC3" id="S4DTonC3" class="form-control" value="<?= $S4DTonC3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbC3" id="S4DLsbC3" class="form-control" value="<?= $S4DLsbC3 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4DTonD3" id="S4DTonD3" class="form-control" value="<?= $S4DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbD3" id="S4DLsbD3" class="form-control" value="<?= $S4DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonE4" id="S4ETonE4" class="form-control" value="<?= $S4ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbE4" id="S4ELsbE4" class="form-control" value="<?= $S4ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ETonC4" id="S4ETonC4" class="form-control" value="<?= $S4ETonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbC4" id="S4ELsbC4" class="form-control" value="<?= $S4ELsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4ETonD4" id="S4ETonD4" class="form-control" value="<?= $S4ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4ELsbD4" id="S4ELsbD4" class="form-control" value="<?= $S4ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonE4" id="S4DTonE4" class="form-control" value="<?= $S4DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbE4" id="S4DLsbE4" class="form-control" value="<?= $S4DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DTonC4" id="S4DTonC4" class="form-control" value="<?= $S4DTonC4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbC4" id="S4DLsbC4" class="form-control" value="<?= $S4DLsbC4 ?>"></input></td>
												
												<td nowrap><input type="number" step="0.000000001" name="S4DTonD4" id="S4DTonD4" class="form-control" value="<?= $S4DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S4DLsbD4" id="S4DLsbD4" class="form-control" value="<?= $S4DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 5-->
				<div class="col-sm-12 form-group-sm" id="PnSensor5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 5</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonE1" id="S5ETonE1" class="form-control maskN" value="<?= $S5ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbE1" id="S5ELsbE1" class="form-control" value="<?= $S5ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonD1" id="S5ETonD1" class="form-control" value="<?= $S5ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbD1" id="S5ELsbD1" class="form-control" value="<?= $S5ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonE1" id="S5DTonE1" class="form-control" value="<?= $S5DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbE1" id="S5DLsbE1" class="form-control" value="<?= $S5DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonD1" id="S5DTonD1" class="form-control" value="<?= $S5DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbD1" id="S5DLsbD1" class="form-control" value="<?= $S5DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonE2" id="S5ETonE2" class="form-control" value="<?= $S5ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbE2" id="S5ELsbE2" class="form-control" value="<?= $S5ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonD2" id="S5ETonD2" class="form-control" value="<?= $S5ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbD2" id="S5ELsbD2" class="form-control" value="<?= $S5ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonE2" id="S5DTonE2" class="form-control" value="<?= $S5DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbE2" id="S5DLsbE2" class="form-control" value="<?= $S5DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonD2" id="S5DTonD2" class="form-control" value="<?= $S5DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbD2" id="S5DLsbD2" class="form-control" value="<?= $S5DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonE3" id="S5ETonE3" class="form-control" value="<?= $S5ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbE3" id="S5ELsbE3" class="form-control" value="<?= $S5ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonD3" id="S5ETonD3" class="form-control" value="<?= $S5ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbD3" id="S5ELsbD3" class="form-control" value="<?= $S5ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonE3" id="S5DTonE3" class="form-control" value="<?= $S5DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbE3" id="S5DLsbE3" class="form-control" value="<?= $S5DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonD3" id="S5DTonD3" class="form-control" value="<?= $S5DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbD3" id="S5DLsbD3" class="form-control" value="<?= $S5DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonE4" id="S5ETonE4" class="form-control" value="<?= $S5ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbE4" id="S5ELsbE4" class="form-control" value="<?= $S5ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ETonD4" id="S5ETonD4" class="form-control" value="<?= $S5ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5ELsbD4" id="S5ELsbD4" class="form-control" value="<?= $S5ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonE4" id="S5DTonE4" class="form-control" value="<?= $S5DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbE4" id="S5DLsbE4" class="form-control" value="<?= $S5DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DTonD4" id="S5DTonD4" class="form-control" value="<?= $S5DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S5DLsbD4" id="S5DLsbD4" class="form-control" value="<?= $S5DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
							
						</div>

					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 6-->
				<div class="col-sm-12 form-group-sm" id="PnSensor6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 6</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonE1" id="S6ETonE1" class="form-control maskN" value="<?= $S6ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbE1" id="S6ELsbE1" class="form-control" value="<?= $S6ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonD1" id="S6ETonD1" class="form-control" value="<?= $S6ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbD1" id="S6ELsbD1" class="form-control" value="<?= $S6ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonE1" id="S6DTonE1" class="form-control" value="<?= $S6DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbE1" id="S6DLsbE1" class="form-control" value="<?= $S6DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonD1" id="S6DTonD1" class="form-control" value="<?= $S6DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbD1" id="S6DLsbD1" class="form-control" value="<?= $S6DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonE2" id="S6ETonE2" class="form-control" value="<?= $S6ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbE2" id="S6ELsbE2" class="form-control" value="<?= $S6ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonD2" id="S6ETonD2" class="form-control" value="<?= $S6ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbD2" id="S6ELsbD2" class="form-control" value="<?= $S6ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonE2" id="S6DTonE2" class="form-control" value="<?= $S6DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbE2" id="S6DLsbE2" class="form-control" value="<?= $S6DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonD2" id="S6DTonD2" class="form-control" value="<?= $S6DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbD2" id="S6DLsbD2" class="form-control" value="<?= $S6DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonE3" id="S6ETonE3" class="form-control" value="<?= $S6ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbE3" id="S6ELsbE3" class="form-control" value="<?= $S6ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonD3" id="S6ETonD3" class="form-control" value="<?= $S6ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbD3" id="S6ELsbD3" class="form-control" value="<?= $S6ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonE3" id="S6DTonE3" class="form-control" value="<?= $S6DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbE3" id="S6DLsbE3" class="form-control" value="<?= $S6DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonD3" id="S6DTonD3" class="form-control" value="<?= $S6DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbD3" id="S6DLsbD3" class="form-control" value="<?= $S6DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonE4" id="S6ETonE4" class="form-control" value="<?= $S6ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbE4" id="S6ELsbE4" class="form-control" value="<?= $S6ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ETonD4" id="S6ETonD4" class="form-control" value="<?= $S6ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6ELsbD4" id="S6ELsbD4" class="form-control" value="<?= $S6ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonE4" id="S6DTonE4" class="form-control" value="<?= $S6DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbE4" id="S6DLsbE4" class="form-control" value="<?= $S6DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DTonD4" id="S6DTonD4" class="form-control" value="<?= $S6DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S6DLsbD4" id="S6DLsbD4" class="form-control" value="<?= $S6DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 7-->
				<div class="col-sm-12 form-group-sm" id="PnSensor7">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 7</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonE1" id="S7ETonE1" class="form-control maskN" value="<?= $S7ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbE1" id="S7ELsbE1" class="form-control" value="<?= $S7ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonD1" id="S7ETonD1" class="form-control" value="<?= $S7ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbD1" id="S7ELsbD1" class="form-control" value="<?= $S7ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonE1" id="S7DTonE1" class="form-control" value="<?= $S7DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbE1" id="S7DLsbE1" class="form-control" value="<?= $S7DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonD1" id="S7DTonD1" class="form-control" value="<?= $S7DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbD1" id="S7DLsbD1" class="form-control" value="<?= $S7DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonE2" id="S7ETonE2" class="form-control" value="<?= $S7ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbE2" id="S7ELsbE2" class="form-control" value="<?= $S7ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonD2" id="S7ETonD2" class="form-control" value="<?= $S7ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbD2" id="S7ELsbD2" class="form-control" value="<?= $S7ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonE2" id="S7DTonE2" class="form-control" value="<?= $S7DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbE2" id="S7DLsbE2" class="form-control" value="<?= $S7DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonD2" id="S7DTonD2" class="form-control" value="<?= $S7DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbD2" id="S7DLsbD2" class="form-control" value="<?= $S7DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonE3" id="S7ETonE3" class="form-control" value="<?= $S7ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbE3" id="S7ELsbE3" class="form-control" value="<?= $S7ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonD3" id="S7ETonD3" class="form-control" value="<?= $S7ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbD3" id="S7ELsbD3" class="form-control" value="<?= $S7ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonE3" id="S7DTonE3" class="form-control" value="<?= $S7DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbE3" id="S7DLsbE3" class="form-control" value="<?= $S7DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonD3" id="S7DTonD3" class="form-control" value="<?= $S7DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbD3" id="S7DLsbD3" class="form-control" value="<?= $S7DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonE4" id="S7ETonE4" class="form-control" value="<?= $S7ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbE4" id="S7ELsbE4" class="form-control" value="<?= $S7ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ETonD4" id="S7ETonD4" class="form-control" value="<?= $S7ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7ELsbD4" id="S7ELsbD4" class="form-control" value="<?= $S7ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonE4" id="S7DTonE4" class="form-control" value="<?= $S7DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbE4" id="S7DLsbE4" class="form-control" value="<?= $S7DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DTonD4" id="S7DTonD4" class="form-control" value="<?= $S7DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S7DLsbD4" id="S7DLsbD4" class="form-control" value="<?= $S7DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 8-->
				<div class="col-sm-12 form-group-sm" id="PnSensor8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 8</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonE1" id="S8ETonE1" class="form-control maskN" value="<?= $S8ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbE1" id="S8ELsbE1" class="form-control" value="<?= $S8ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonD1" id="S8ETonD1" class="form-control" value="<?= $S8ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbD1" id="S8ELsbD1" class="form-control" value="<?= $S8ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonE1" id="S8DTonE1" class="form-control" value="<?= $S8DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbE1" id="S8DLsbE1" class="form-control" value="<?= $S8DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonD1" id="S8DTonD1" class="form-control" value="<?= $S8DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbD1" id="S8DLsbD1" class="form-control" value="<?= $S8DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonE2" id="S8ETonE2" class="form-control" value="<?= $S8ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbE2" id="S8ELsbE2" class="form-control" value="<?= $S8ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonD2" id="S8ETonD2" class="form-control" value="<?= $S8ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbD2" id="S8ELsbD2" class="form-control" value="<?= $S8ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonE2" id="S8DTonE2" class="form-control" value="<?= $S8DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbE2" id="S8DLsbE2" class="form-control" value="<?= $S8DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonD2" id="S8DTonD2" class="form-control" value="<?= $S8DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbD2" id="S8DLsbD2" class="form-control" value="<?= $S8DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonE3" id="S8ETonE3" class="form-control" value="<?= $S8ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbE3" id="S8ELsbE3" class="form-control" value="<?= $S8ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonD3" id="S8ETonD3" class="form-control" value="<?= $S8ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbD3" id="S8ELsbD3" class="form-control" value="<?= $S8ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonE3" id="S8DTonE3" class="form-control" value="<?= $S8DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbE3" id="S8DLsbE3" class="form-control" value="<?= $S8DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonD3" id="S8DTonD3" class="form-control" value="<?= $S8DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbD3" id="S8DLsbD3" class="form-control" value="<?= $S8DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonE4" id="S8ETonE4" class="form-control" value="<?= $S8ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbE4" id="S8ELsbE4" class="form-control" value="<?= $S8ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ETonD4" id="S8ETonD4" class="form-control" value="<?= $S8ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8ELsbD4" id="S8ELsbD4" class="form-control" value="<?= $S8ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonE4" id="S8DTonE4" class="form-control" value="<?= $S8DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbE4" id="S8DLsbE4" class="form-control" value="<?= $S8DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DTonD4" id="S8DTonD4" class="form-control" value="<?= $S8DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S8DLsbD4" id="S8DLsbD4" class="form-control" value="<?= $S8DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 9-->
				<div class="col-sm-12 form-group-sm" id="PnSensor9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 9</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonE1" id="S9ETonE1" class="form-control maskN" value="<?= $S9ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbE1" id="S9ELsbE1" class="form-control" value="<?= $S9ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonD1" id="S9ETonD1" class="form-control" value="<?= $S9ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbD1" id="S9ELsbD1" class="form-control" value="<?= $S9ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonE1" id="S9DTonE1" class="form-control" value="<?= $S9DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbE1" id="S9DLsbE1" class="form-control" value="<?= $S9DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonD1" id="S9DTonD1" class="form-control" value="<?= $S9DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbD1" id="S9DLsbD1" class="form-control" value="<?= $S9DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonE2" id="S9ETonE2" class="form-control" value="<?= $S9ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbE2" id="S9ELsbE2" class="form-control" value="<?= $S9ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonD2" id="S9ETonD2" class="form-control" value="<?= $S9ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbD2" id="S9ELsbD2" class="form-control" value="<?= $S9ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonE2" id="S9DTonE2" class="form-control" value="<?= $S9DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbE2" id="S9DLsbE2" class="form-control" value="<?= $S9DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonD2" id="S9DTonD2" class="form-control" value="<?= $S9DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbD2" id="S9DLsbD2" class="form-control" value="<?= $S9DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonE3" id="S9ETonE3" class="form-control" value="<?= $S9ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbE3" id="S9ELsbE3" class="form-control" value="<?= $S9ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonD3" id="S9ETonD3" class="form-control" value="<?= $S9ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbD3" id="S9ELsbD3" class="form-control" value="<?= $S9ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonE3" id="S9DTonE3" class="form-control" value="<?= $S9DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbE3" id="S9DLsbE3" class="form-control" value="<?= $S9DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonD3" id="S9DTonD3" class="form-control" value="<?= $S9DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbD3" id="S9DLsbD3" class="form-control" value="<?= $S9DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonE4" id="S9ETonE4" class="form-control" value="<?= $S9ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbE4" id="S9ELsbE4" class="form-control" value="<?= $S9ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ETonD4" id="S9ETonD4" class="form-control" value="<?= $S9ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9ELsbD4" id="S9ELsbD4" class="form-control" value="<?= $S9ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonE4" id="S9DTonE4" class="form-control" value="<?= $S9DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbE4" id="S9DLsbE4" class="form-control" value="<?= $S9DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DTonD4" id="S9DTonD4" class="form-control" value="<?= $S9DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S9DLsbD4" id="S9DLsbD4" class="form-control" value="<?= $S9DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 10-->
				<div class="col-sm-12 form-group-sm" id="PnSensor10">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 10</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonE1" id="S10ETonE1" class="form-control maskN" value="<?= $S10ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbE1" id="S10ELsbE1" class="form-control" value="<?= $S10ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonD1" id="S10ETonD1" class="form-control" value="<?= $S10ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbD1" id="S10ELsbD1" class="form-control" value="<?= $S10ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonE1" id="S10DTonE1" class="form-control" value="<?= $S10DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbE1" id="S10DLsbE1" class="form-control" value="<?= $S10DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonD1" id="S10DTonD1" class="form-control" value="<?= $S10DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbD1" id="S10DLsbD1" class="form-control" value="<?= $S10DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonE2" id="S10ETonE2" class="form-control" value="<?= $S10ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbE2" id="S10ELsbE2" class="form-control" value="<?= $S10ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonD2" id="S10ETonD2" class="form-control" value="<?= $S10ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbD2" id="S10ELsbD2" class="form-control" value="<?= $S10ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonE2" id="S10DTonE2" class="form-control" value="<?= $S10DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbE2" id="S10DLsbE2" class="form-control" value="<?= $S10DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonD2" id="S10DTonD2" class="form-control" value="<?= $S10DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbD2" id="S10DLsbD2" class="form-control" value="<?= $S10DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonE3" id="S10ETonE3" class="form-control" value="<?= $S10ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbE3" id="S10ELsbE3" class="form-control" value="<?= $S10ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonD3" id="S10ETonD3" class="form-control" value="<?= $S10ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbD3" id="S10ELsbD3" class="form-control" value="<?= $S10ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonE3" id="S10DTonE3" class="form-control" value="<?= $S10DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbE3" id="S10DLsbE3" class="form-control" value="<?= $S10DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonD3" id="S10DTonD3" class="form-control" value="<?= $S10DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbD3" id="S10DLsbD3" class="form-control" value="<?= $S10DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonE4" id="S10ETonE4" class="form-control" value="<?= $S10ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbE4" id="S10ELsbE4" class="form-control" value="<?= $S10ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ETonD4" id="S10ETonD4" class="form-control" value="<?= $S10ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10ELsbD4" id="S10ELsbD4" class="form-control" value="<?= $S10ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonE4" id="S10DTonE4" class="form-control" value="<?= $S10DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbE4" id="S10DLsbE4" class="form-control" value="<?= $S10DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DTonD4" id="S10DTonD4" class="form-control" value="<?= $S10DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S10DLsbD4" id="S10DLsbD4" class="form-control" value="<?= $S10DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 11-->
				<div class="col-sm-12 form-group-sm" id="PnSensor11">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 11</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonE1" id="S11ETonE1" class="form-control maskN" value="<?= $S11ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbE1" id="S11ELsbE1" class="form-control" value="<?= $S11ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonD1" id="S11ETonD1" class="form-control" value="<?= $S11ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbD1" id="S11ELsbD1" class="form-control" value="<?= $S11ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonE1" id="S11DTonE1" class="form-control" value="<?= $S11DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbE1" id="S11DLsbE1" class="form-control" value="<?= $S11DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonD1" id="S11DTonD1" class="form-control" value="<?= $S11DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbD1" id="S11DLsbD1" class="form-control" value="<?= $S11DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonE2" id="S11ETonE2" class="form-control" value="<?= $S11ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbE2" id="S11ELsbE2" class="form-control" value="<?= $S11ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonD2" id="S11ETonD2" class="form-control" value="<?= $S11ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbD2" id="S11ELsbD2" class="form-control" value="<?= $S11ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonE2" id="S11DTonE2" class="form-control" value="<?= $S11DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbE2" id="S11DLsbE2" class="form-control" value="<?= $S11DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonD2" id="S11DTonD2" class="form-control" value="<?= $S11DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbD2" id="S11DLsbD2" class="form-control" value="<?= $S11DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonE3" id="S11ETonE3" class="form-control" value="<?= $S11ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbE3" id="S11ELsbE3" class="form-control" value="<?= $S11ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonD3" id="S11ETonD3" class="form-control" value="<?= $S11ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbD3" id="S11ELsbD3" class="form-control" value="<?= $S11ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonE3" id="S11DTonE3" class="form-control" value="<?= $S11DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbE3" id="S11DLsbE3" class="form-control" value="<?= $S11DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonD3" id="S11DTonD3" class="form-control" value="<?= $S11DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbD3" id="S11DLsbD3" class="form-control" value="<?= $S11DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonE4" id="S11ETonE4" class="form-control" value="<?= $S11ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbE4" id="S11ELsbE4" class="form-control" value="<?= $S11ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ETonD4" id="S11ETonD4" class="form-control" value="<?= $S11ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11ELsbD4" id="S11ELsbD4" class="form-control" value="<?= $S11ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonE4" id="S11DTonE4" class="form-control" value="<?= $S11DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbE4" id="S11DLsbE4" class="form-control" value="<?= $S11DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DTonD4" id="S11DTonD4" class="form-control" value="<?= $S11DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S11DLsbD4" id="S11DLsbD4" class="form-control" value="<?= $S11DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display:none">
				<!--Sensor 12-->
				<div class="col-sm-12 form-group-sm" id="PnSensor12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-sm-10"><label class="control-label">Sensor 12</label></div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<table class="table table-striped table-condensed">
										<thead>
											<tr>
												<th class="text-center" colspan="4" nowrap>Esquerda</th>
												<th nowrap style="background-color:#333"> </th>
												<th class="text-center" colspan="4" nowrap>Direita</th>
											</tr>
											<tr>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
												<th nowrap style="background-color:#333"> </th>
												<th nowrap>Ton E</th>
												<th nowrap>Lsbs E</th>
												<th nowrap>Ton D</th>
												<th nowrap>Lsbs D</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonE1" id="S12ETonE1" class="form-control maskN" value="<?= $S12ETonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbE1" id="S12ELsbE1" class="form-control" value="<?= $S12ELsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonD1" id="S12ETonD1" class="form-control" value="<?= $S12ETonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbD1" id="S12ELsbD1" class="form-control" value="<?= $S12ELsbD1 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonE1" id="S12DTonE1" class="form-control" value="<?= $S12DTonE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbE1" id="S12DLsbE1" class="form-control" value="<?= $S12DLsbE1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonD1" id="S12DTonD1" class="form-control" value="<?= $S12DTonD1 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbD1" id="S12DLsbD1" class="form-control" value="<?= $S12DLsbD1 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonE2" id="S12ETonE2" class="form-control" value="<?= $S12ETonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbE2" id="S12ELsbE2" class="form-control" value="<?= $S12ELsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonD2" id="S12ETonD2" class="form-control" value="<?= $S12ETonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbD2" id="S12ELsbD2" class="form-control" value="<?= $S12ELsbD2 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonE2" id="S12DTonE2" class="form-control" value="<?= $S12DTonE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbE2" id="S12DLsbE2" class="form-control" value="<?= $S12DLsbE2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonD2" id="S12DTonD2" class="form-control" value="<?= $S12DTonD2 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbD2" id="S12DLsbD2" class="form-control" value="<?= $S12DLsbD2 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonE3" id="S12ETonE3" class="form-control" value="<?= $S12ETonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbE3" id="S12ELsbE3" class="form-control" value="<?= $S12ELsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonD3" id="S12ETonD3" class="form-control" value="<?= $S12ETonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbD3" id="S12ELsbD3" class="form-control" value="<?= $S12ELsbD3 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonE3" id="S12DTonE3" class="form-control" value="<?= $S12DTonE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbE3" id="S12DLsbE3" class="form-control" value="<?= $S12DLsbE3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonD3" id="S12DTonD3" class="form-control" value="<?= $S12DTonD3 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbD3" id="S12DLsbD3" class="form-control" value="<?= $S12DLsbD3 ?>"></input></td>
											</tr>
											<tr>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonE4" id="S12ETonE4" class="form-control" value="<?= $S12ETonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbE4" id="S12ELsbE4" class="form-control" value="<?= $S12ELsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ETonD4" id="S12ETonD4" class="form-control" value="<?= $S12ETonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12ELsbD4" id="S12ELsbD4" class="form-control" value="<?= $S12ELsbD4 ?>"></input></td>
												<th nowrap style="background-color:#333"> </th>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonE4" id="S12DTonE4" class="form-control" value="<?= $S12DTonE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbE4" id="S12DLsbE4" class="form-control" value="<?= $S12DLsbE4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DTonD4" id="S12DTonD4" class="form-control" value="<?= $S12DTonD4 ?>"></input></td>
												<td nowrap><input type="number" step="0.000000001" name="S12DLsbD4" id="S12DLsbD4" class="form-control" value="<?= $S12DLsbD4 ?>"></input></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</form>
	</div>
	<div class="modal fade" role="dialog" id="ModalAviso">
		<div class="modal-dialog">
			<div class="modal-content ui-draggable">
				<div class="modal-header ui-draggable-handle" style="background-color:#333; color:#b3b3b3">
					<h5 class="modal-title" style="font-weight:bold">Teste de Funcionamento do FTPs</h5>
				</div>
				<div class="modal-body" id="MsgTeste"></div>
				<div class="modal-footer" style="background-color:#333; color:#b3b3b3">
					<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>