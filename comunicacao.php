<?php
include_once("funcoes.php");
include_once("conexao.php");



$submask = exec("ifconfig eth0 | grep 'inet '", $out);
$submask = str_ireplace("inet ", "", $submask);
$submask = str_ireplace("  netmask", "", $submask);
$submask = str_ireplace("  broadcast", "", $submask);
$submask = trim($submask);
$submask = explode(" ", $submask);
$EnderecoIP = $submask[0];
$Mascara = $submask[1];
$gatewayType = shell_exec("route -n | head -n 3 | tail -n 1");
$gatewayTypeRaw = explode("   ", $gatewayType);
$Gateway = $gatewayTypeRaw[3];

$dnsType = file('/etc/resolv.conf');
$dnsType = str_ireplace("nameserver ", "", $dnsType);
$Dns1 = $dnsType[1];
$Hostname = GETHOSTNAME();


$TituloPage = "Comunicação";


try {
	if (isset($_POST["servidor_ftps"]) && isset($_POST["usuario_ftps"]) && isset($_POST["senha_ftps"]) && isset($_POST["pasta_ftps"])) {
		if (empty($_POST["servidor_ftps"]))
			$erro = "Campo 'Endereço do Servidor' é obrigatório";
		else if (empty($_POST["usuario_ftps"]))
			$erro = "Campo 'Usuário' é obrigatório";
		else if (empty($_POST["senha_ftps"]))
			$erro = "Campo 'Senha' é obrigatório";
		else if (empty($_POST["pasta_ftps"]))
			$erro = "Campo 'Pasta de Arquivos' é obrigatório";
		else {
			$id = mysqli_real_escape_string($conn, $_POST["id"]);
			$servidor_ftps = mysqli_real_escape_string($conn, $_POST["servidor_ftps"]);
			$usuario_ftps  = mysqli_real_escape_string($conn, $_POST["usuario_ftps"]);
			$senha_ftps    = mysqli_real_escape_string($conn, $_POST["senha_ftps"]);
			$pasta_ftps    = mysqli_real_escape_string($conn, $_POST["pasta_ftps"]);

			$BalPorta    = mysqli_real_escape_string($conn, $_POST["BalPorta"]);
			$BalBaudrate    = mysqli_real_escape_string($conn, $_POST["BalBaudrate"]);
			$BalParidade    = mysqli_real_escape_string($conn, $_POST["BalParidade"]);
			$BalStopbits    = mysqli_real_escape_string($conn, $_POST["BalStopbits"]);
			$BalDatabits    = mysqli_real_escape_string($conn, $_POST["BalDatabits"]);
			

			if ($id == -1) {
				$stmt = $conn->prepare("INSERT INTO `configuracoes` (`servidor_ftps`,`usuario_ftps`,`senha_ftps`,`pasta_ftps`
				,`BalPorta`,`BalBaudrate`,`BalParidade`,`BalStopbits`,`BalDatabits`) VALUES (?,?,?,?,?,?,?,?,?)");
				$stmt->bind_param(
					'sssssssss',
					$servidor_ftps,
					$usuario_ftps,
					$senha_ftps,
					$pasta_ftps,
					$BalPorta,
					$BalBaudrate,
					$BalParidade,
					$BalStopbits,
					$BalDatabits
				);

				if (!$stmt->execute()) {
					$erro = $stmt->error;
				} else {
					$sucesso = "Registro gravado com sucesso!";
				}
			} else if (is_numeric($id) && $id >= 1) {
				$stmt = $conn->prepare("UPDATE `configuracoes` SET `servidor_ftps`=?, `usuario_ftps`=?, `senha_ftps`=?, `pasta_ftps`=? 
				,`BalPorta`=?,`BalBaudrate`=?,`BalParidade`=?,`BalStopbits`=?,`BalDatabits`=? WHERE id = ? ");
				$stmt->bind_param(
					'sssssssssi',
					$servidor_ftps,
					$usuario_ftps,
					$senha_ftps,
					$pasta_ftps,
					$BalPorta,
					$BalBaudrate,
					$BalParidade,
					$BalStopbits,
					$BalDatabits,
					$id
				);

				if (!$stmt->execute()) {
					$erro = $stmt->error;
				} else {
					$sucesso = "Registro gravado com sucesso!";
				}
			}
		}
	}

	$stmt = $conn->prepare("SELECT * FROM configuracoes"); //
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$aux_query = $result->fetch_assoc();

		$id = $aux_query["id"];
		$servidor_ftps = $aux_query["servidor_ftps"];
		$usuario_ftps  = $aux_query["usuario_ftps"];
		$usuario_ftps  = str_replace("\\\\", "\\", $usuario_ftps);
		$senha_ftps    = $aux_query["senha_ftps"];
		$pasta_ftps    = $aux_query["pasta_ftps"];

		$BalPorta    = $aux_query["BalPorta"];
		$BalBaudrate = $aux_query["BalBaudrate"];
		$BalParidade = $aux_query["BalParidade"];
		$BalStopbits = $aux_query["BalStopbits"];
		$BalDatabits = $aux_query["BalDatabits"];
		$BalDatabits = $aux_query["BalDatabits"];
		$servidor_ntp = $aux_query["servidor_ntp"];
		
		$stmt->close();
	} else {
		if (isset($_POST["servidor_ftps"])) {
			$id = -1;
			$servidor_ftps = mysqli_real_escape_string($conn, $_POST["servidor_ftps"]);
			$usuario_ftps  = mysqli_real_escape_string($conn, $_POST["usuario_ftps"]);
			
			$senha_ftps    = mysqli_real_escape_string($conn, $_POST["senha_ftps"]);
			$pasta_ftps    = mysqli_real_escape_string($conn, $_POST["pasta_ftps"]);

			$BalPorta    = mysqli_real_escape_string($conn, $_POST["BalPorta"]);
			$BalBaudrate    = mysqli_real_escape_string($conn, $_POST["BalBaudrate"]);
			$BalParidade    = mysqli_real_escape_string($conn, $_POST["BalParidade"]);
			$BalStopbits    = mysqli_real_escape_string($conn, $_POST["BalStopbits"]);
			$BalDatabits    = mysqli_real_escape_string($conn, $_POST["BalDatabits"]);
			$servidor_ntp = mysqli_real_escape_string($conn, $_POST["servidor_ntp"]);
		} else {
			$id = -1;
			$servidor_ftps = "";
			$usuario_ftps  = "";
			$senha_ftps    = "";
			$pasta_ftps    = "";

			$BalPorta    = "COM1";
			$BalBaudrate = "9600";
			$BalParidade = "None";
			$BalStopbits = "None";
			$BalDatabits = "8";
			
			$servidor_ntp    = "";
		}
	}
} catch (Exception $e) {
	$erro = $e->getMessage();
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
<script type="text/javascript">
	function TestarFTPs() {
		$(".botoes").prop('disabled', true);
		$.ajax({
			type: "POST",
			url: 'TesterFTPs.php',
			data: {
				servidor_ftps: $("#servidor_ftps").val(),
				usuario_ftps: $("#usuario_ftps").val(),
				senha_ftps: $("#senha_ftps").val(),
				pasta_ftps: $("#pasta_ftps").val()
			},
			success: function(html) {

				$("#MsgTeste").html(html);
				$("#ModalAviso").modal("show");
				$(".botoes").prop('disabled', false);
			},
			error: function(xhr, ajaxOptions, thrownError) {


				$("#MsgTeste").html(thrownError);
				$("#ModalAviso").modal("show");
				$(".botoes").prop('disabled', false);
				//alert(thrownError);
			}

		});
		return;
	};
	
	function TestarNTP() {
		$(".botoes").prop('disabled', true);
		$.ajax({
			type: "POST",
			url: 'ExecuteNTP.php',
			data: {
				servidor_ntp: $("#servidor_ntp").val()
				
			},
			success: function(html) {

				$("#MsgTeste").html(html);
				$("#ModalAviso").modal("show");
				$(".botoes").prop('disabled', false);
			},
			error: function(xhr, ajaxOptions, thrownError) {


				$("#MsgTeste").html(thrownError);
				$("#ModalAviso").modal("show");
				$(".botoes").prop('disabled', false);
				//alert(thrownError);
			}

		});
		return;
	};

	function SubmeterForm() {
		$("#FormFtp").submit();
	};
	
	function CapturaHoraAtual(){
		
		$.ajax({
			type: "POST",
			url: 'GetHoraAtual.php',
			data: {
				servidor_ntp: 2
				
			},
			success: function(html) {

				$("#data_local").val(html);
				
			},
			error: function(xhr, ajaxOptions, thrownError) {


				$("#data_local").val(thrownError);
				
				//alert(thrownError);
			}
		});
		setTimeout(function(){CapturaHoraAtual();}, 1000);
	}
	
	setTimeout(function(){CapturaHoraAtual();}, 100);
</script>

<body>

	<?php include 'menu.php'; ?>

	<div class="container ">
		<form id="FormFtp" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
			<div class="row">
				<div class="col-sm-6 form-group-sm">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								Dados de FTPs
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<label class="control-label">Endereço do Servidor</label>
									<input name="servidor_ftps" id="servidor_ftps" class="form-control" value="<?= $servidor_ftps ?>"></input>
									<input name="id" class="form-control" value="<?= $id ?>" style="display:none;"></input>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Usuário</label>
									<input name="usuario_ftps" id="usuario_ftps" class="form-control" value="<?= $usuario_ftps ?>"></input>
								</div>
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Senha</label>
									<input name="senha_ftps" type="password" id="senha_ftps" class="form-control" value="<?= $senha_ftps ?>"></input>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10 form-group form-group-sm">
									<label class="control-label">Pasta de Arquivos</label>
									<input name="pasta_ftps" id="pasta_ftps" class="form-control" value="<?= $pasta_ftps ?>"></input>
								</div>
								<div class="col-sm-2 form-group form-group-sm">
									<label class="control-label">&nbsp;&nbsp; </label>
									<button class="botoes btn btn-sm btn-primary" onclick="TestarFTPs();">Testar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 form-group-sm">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								Comunicação com a Balança
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Porta</label>
									<select class="form-control" name="BalPorta" id="BalPorta">
										<option value="COM1" <?= ($BalPorta == 'COM1') ? 'selected' : '' ?>>COM1</option>
										<option value="COM2" <?= ($BalPorta == 'COM2') ? 'selected' : '' ?>>COM2</option>
										<option value="COM3" <?= ($BalPorta == 'COM3') ? 'selected' : '' ?>>COM3</option>
										<option value="COM4" <?= ($BalPorta == 'COM4') ? 'selected' : '' ?>>COM4</option>
										<option value="COM5" <?= ($BalPorta == 'COM5') ? 'selected' : '' ?>>COM5</option>
										<option value="COM6" <?= ($BalPorta == 'COM6') ? 'selected' : '' ?>>COM6</option>
										<option value="COM7" <?= ($BalPorta == 'COM7') ? 'selected' : '' ?>>COM7</option>
										<option value="COM8" <?= ($BalPorta == 'COM8') ? 'selected' : '' ?>>COM8</option>
										<option value="COM9" <?= ($BalPorta == 'COM9') ? 'selected' : '' ?>>COM9</option>
										<option value="COM10" <?= ($BalPorta == 'COM10') ? 'selected' : '' ?>>COM10</option>
										<option value="COM11" <?= ($BalPorta == 'COM11') ? 'selected' : '' ?>>COM11</option>
										<option value="COM12" <?= ($BalPorta == 'COM12') ? 'selected' : '' ?>>COM12</option>
										<option value="COM13" <?= ($BalPorta == 'COM13') ? 'selected' : '' ?>>COM13</option>
										<option value="COM14" <?= ($BalPorta == 'COM14') ? 'selected' : '' ?>>COM14</option>
										<option value="COM15" <?= ($BalPorta == 'COM15') ? 'selected' : '' ?>>COM15</option>
										<option value="COM16" <?= ($BalPorta == 'COM16') ? 'selected' : '' ?>>COM16</option>
										<option value="COM17" <?= ($BalPorta == 'COM17') ? 'selected' : '' ?>>COM17</option>
										<option value="COM18" <?= ($BalPorta == 'COM18') ? 'selected' : '' ?>>COM18</option>
										<option value="COM19" <?= ($BalPorta == 'COM19') ? 'selected' : '' ?>>COM19</option>
										<option value="COM20" <?= ($BalPorta == 'COM20') ? 'selected' : '' ?>>COM20</option>
									</select>
								</div>
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Baudrate</label>
									<select class="form-control" name="BalBaudrate" id="BalBaudrate">
										<option value="300" <?= ($BalBaudrate == '300') ? 'selected' : '' ?>>300</option>
										<option value="600" <?= ($BalBaudrate == '600') ? 'selected' : '' ?>>600</option>
										<option value="1200" <?= ($BalBaudrate == '1200') ? 'selected' : '' ?>>1200</option>
										<option value="2400" <?= ($BalBaudrate == '2400') ? 'selected' : '' ?>>2400</option>
										<option value="4800" <?= ($BalBaudrate == '4800') ? 'selected' : '' ?>>4800</option>
										<option value="9600" <?= ($BalBaudrate == '9600') ? 'selected' : '' ?>>9600</option>
										<option value="19200" <?= ($BalBaudrate == '19200') ? 'selected' : '' ?>>19200</option>
										<option value="38400" <?= ($BalBaudrate == '38400') ? 'selected' : '' ?>>38400</option>
										<option value="56000" <?= ($BalBaudrate == '56000') ? 'selected' : '' ?>>56000</option>
										<option value="57600" <?= ($BalBaudrate == '57600') ? 'selected' : '' ?>>57600</option>
										<option value="115200" <?= ($BalBaudrate == '115200') ? 'selected' : '' ?>>115200</option>
										<option value="128000" <?= ($BalBaudrate == '128000') ? 'selected' : '' ?>>128000</option>
										<option value="230400" <?= ($BalBaudrate == '230400') ? 'selected' : '' ?>>230400</option>
										<option value="256000" <?= ($BalBaudrate == '256000') ? 'selected' : '' ?>>256000</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Paridade</label>
									<select class="form-control" name="BalParidade" id="BalParidade">
										<option value="None" <?= ($BalParidade == 'None') ? 'selected' : '' ?>>None</option>
										<option value="Odd" <?= ($BalParidade == 'Odd') ? 'selected' : '' ?>>Odd</option>
										<option value="Even" <?= ($BalParidade == 'Even') ? 'selected' : '' ?>>Even</option>
										<option value="Mark" <?= ($BalParidade == 'Mark') ? 'selected' : '' ?>>Mark</option>
										<option value="Space" <?= ($BalParidade == 'Space') ? 'selected' : '' ?>>Space</option>

									</select>
								</div>
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Stop Bits</label>
									<select class="form-control" name="BalStopbits" id="BalStopbits">
										<option value="None" <?= ($BalStopbits == 'None') ? 'selected' : '' ?>>None</option>
										<option value="One" <?= ($BalStopbits == 'One') ? 'selected' : '' ?>>One</option>
										<option value="Two" <?= ($BalStopbits == 'Two') ? 'selected' : '' ?>>Two</option>
										<option value="OnePointFive" <?= ($BalStopbits == 'OnePointFive') ? 'selected' : '' ?>>OnePointFive</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Data Bits</label>
									<select class="form-control" name="BalDatabits" id="BalDatabits">
										<option value="5" <?= ($BalDatabits == '5') ? 'selected' : '' ?>>5</option>
										<option value="6" <?= ($BalDatabits == '6') ? 'selected' : '' ?>>6</option>
										<option value="7" <?= ($BalDatabits == '7') ? 'selected' : '' ?>>7</option>
										<option value="8" <?= ($BalDatabits == '8') ? 'selected' : '' ?>>8</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 form-group-sm">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								Configuração de Rede
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Endereço IP</label>
									<input name="EnderecoIP" id="EnderecoIP" class="form-control" value="<?= $EnderecoIP ?>" disabled></input>
								</div>
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Mascara</label>
									<input name="Mascara" id="Mascara" class="form-control" value="<?= $Mascara ?>" disabled></input>
								</div>
							</div>
							<div class="row">
							<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">Gateway</label>
									<input name="Gateway" id="Gateway" class="form-control" value="<?= $Gateway ?>" disabled></input>
								</div>
								<div class="col-sm-6 form-group form-group-sm">
									<label class="control-label">DNS</label>
									<input name="Dns1" type="text" id="Dns1" class="form-control" value="<?= $Dns1 ?>" disabled></input>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<label class="control-label">Hostname</label>
									<input name="Hostname" id="Hostname" class="form-control" value="<?= $Hostname ?> " disabled></input>
								</div>
								<!--<div class="col-sm-2 form-group form-group-sm">
									<label class="control-label">&nbsp;&nbsp; </label>
									<button class="botoes btn btn-sm btn-primary" onclick="TestarFTPs();">Testar</button>
								</div>-->
							</div>
							<div class="row">
								<div class="col-sm-10 form-group form-group-sm">
									<label class="control-label">Endereço NTP</label>
									<input name="servidor_ntp" id="servidor_ntp" class="form-control" value="<?= $servidor_ntp ?>"></input>
								</div>
								<div class="col-sm-2 form-group form-group-sm">
									<label class="control-label">&nbsp;&nbsp; </label>
									<button class="botoes btn btn-sm btn-primary" onclick="TestarNTP();">Salvar</button>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group form-group-sm">
									<label class="control-label">Data Local</label>
									<input name="data_local" id="data_local" class="form-control" value="<?= $data_local ?>" disabled></input>
								</div>																		
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 form-group-sm">
					<div class="row">
						<div class="col-sm-6 form-group form-group-sm">
							<?php
							if (isset($erro))
								echo '<div style="color:firebrick">' . $erro . '</div><br/><br/>';
							else
								if (isset($sucesso))
								echo '<div style="color:#00f">' . $sucesso . '</div><br/><br/>';
							?>
						</div>
						<div class="col-sm-6 form-group form-group-sm text-right">
							<button class="botoes btn btn-success" onclick="SubmeterForm();">Gravar</button>
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
					<h5 class="modal-title" style="font-weight:bold">Retorno</h5>
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