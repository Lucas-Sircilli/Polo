<?php
include_once("funcoes.php");
include_once("conexao.php");

$TituloPage = "Pesagens";
date_default_timezone_set('PR');

try {
	if (isset($_POST["DataInicial"])) {
		if (empty($_POST["DataInicial"]))
			$erro = "É necessário definir a Data Inicial";

		else {
			$DataInicial = mysqli_real_escape_string($conn, $_POST["DataInicial"]);
			$DataFinal = mysqli_real_escape_string($conn, $_POST["DataFinal"]);
			
			$Ordem  = mysqli_real_escape_string($conn, $_POST["Ordem"]);

			$dti = formata_data_mysql($DataInicial);
			$dtf = formata_data_mysql($DataFinal);
			//echo "<script>alert('".$$dt."')</script>";
		}
	} else {
		$DataInicial = date('d/m/Y 00:00');
		$DataFinal = date('d/m/Y 23:59');
		
		$Ordem  = 0;

		$dti = formata_data_mysql($DataInicial);
		$dtf = formata_data_mysql($DataFinal);
	}

	$sql = "SELECT * FROM Composicoes WHERE DataInicio>='" . $dti . "' && DataInicio<='" . $dtf . "' ";
	
	
	if($Ordem==1)
		$sql = $sql." ORDER By DataInicio DESC ";

	$stmt = $conn->prepare($sql); //
	$stmt->execute();
	$result = $stmt->get_result();
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

	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script src="js/jquery.min.js"></script>


	<script src="js/bootstrap-datetimepicker.js"></script>
	<script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>

	<script src="js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function() {
		//	$( "#datetimepicker" ).datepicker();
		$('.form_datetime').datetimepicker({
			format: 'dd/mm/yyyy hh:ii',
			language: 'pt-BR',
			weekStart: 1,
			todayBtn: 1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
			showMeridian: 1
		});

		// Number
	});

	function SubmeterForm() {
		$("#FormLog").submit();
    };
    
    function Reenviar(id) {
        $.ajax({
			type: "POST",
			url: 'ReprocessaComposicao.php',
			data: {
				IdComposicao: id,				
			},
			success: function(html) {
				SubmeterForm();
			},
			error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
			}

		});
		return;
	};
	
	function ExcluirPesagens() {
		
        $.ajax({
			type: "POST",
			url: 'ExcluirPesagens.php',
			data: {
				Senha: $("#SenhaExclusao").val(),				
			},
			success: function(html) {
				alert(html);
				$("#FormLog").submit();
			},
			error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
			}

		});
		return;
	};
	
	function DownloadArquivo(FileName) {
		
        $.ajax({
        url: "arquivos/"+FileName,
        method: 'GET',
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.href = url;
            a.download = FileName;
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
        }
    });
		return;
	};
	
	function PesquisaAut(){
		var aut = $("#pesquisaAutomatica")[0].checked;
		console.log(aut);
		if(aut==true){
			console.log('Pesquisando');
			$("#FormLog").submit();
		}
		setTimeout(function(){PesquisaAut();}, 10000);
	};
	setTimeout(function(){PesquisaAut();}, 10000);
</script>

<body>

	<?php include 'menu.php'; ?>

	<div class="container ">
		<form id="FormLog" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
			<div class="row">
				<div class="col-sm-12 form-group-sm">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								Dados de Pesquisa
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-3 form-group form-group-sm">
									<label class="control-label">Data Inicial</label>
									<div class="input-group date form_datetime col-md-12">
										<input class="form-control" size="16" name="DataInicial" id="DataInicial" type="text" value="<?= $DataInicial ?>" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
									</div>
								</div>

								<div class="col-sm-3 form-group form-group-sm">
									<label class="control-label">Data Final</label>
									<div class="input-group date form_datetime col-md-12">
										<input class="form-control" size="16" name="DataFinal" id="DataFinal" type="text" value="<?= $DataFinal ?>" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
									</div>
                                </div>
                                
                                <div class="col-sm-2 form-group form-group-sm">
									<label class="control-label">Ordem</label>
									<select class="form-control" name="Ordem" id="Ordem">
										<option value="0" <?= ($Ordem == '0') ? 'selected' : '' ?>>Crecente</option>
										<option value="1" <?= ($Ordem == '1') ? 'selected' : '' ?>>Decrecente</option>
									</select>
								</div>

								<div class="col-sm-2 form-group form-group-sm">
									<label class="control-label">&nbsp;</label>
									<div class="checkbox">
										<label><input type="checkbox" id="pesquisaAutomatica" name="pesquisaAutomatica" checked>automático</label>
									</div>
								</div>
								
								<div class="col-sm-2 form-group form-group-sm">
									<label class="control-label">&nbsp;&nbsp; </label>
									<a class="form-control botoes btn btn-primary" onclick="SubmeterForm();">Pesquisar</a>
									
								</div>
							</div>

							<div class="row">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 form-group-sm">
					<table class="table table-condensed table-striped table-bordered">
						<thead>
							<tr>
                                <th>Id</th>
                                <th>Data Inicio</th>
                                <th>Data Fim</th>
								<th>Qtd Eixos</th>
                                <th>Qtd Sensores</th>
                                <th>Lsb total</th>
                                <th>Ton total</th>
                                <th>Status</th>
                                <th>Data Envio</th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($result->num_rows > 0) {
								for ($i = 0; $i < $result->num_rows; $i++) {
									$row = $result->fetch_assoc();
                                    echo "<tr>
                                    <td nowrap>" . $row["Id"] . "</td>
                                    <td nowrap>" . formata_data_exibicao($row["DataInicio"] ). "</td>
                                    <td nowrap>" . formata_data_exibicao($row["DataFim"]) . "</td>
                                    <td nowrap>" . $row["QuantidadeEixos"] . "</td>
                                    <td nowrap>" . $row["QuantidadeSensores"] . "</td>
                                    <td nowrap>" . number_format($row["LsbTotal"], 2, '.', ''). "</td>
                                    <td nowrap>" . number_format($row["TonTotal"], 2, '.', '') . "</td>
                                    <td nowrap>" .convStatus($row["Status"]). "</td>
                                    <td nowrap>" . formata_data_exibicao($row["DataEnvio"]) . "</td>
                                    <td class='text-right' nowrap> 
                                        ".($_SESSION['usuarioNiveisAcessoId']<3?"<a class='btn btn-primary' title='Reprocessar e Reenviar' onclick='Reenviar(".$row["Id"].")'><span class='glyphicon glyphicon glyphicon-flash'></span></a> ":"").
										"<a class='btn btn-primary' title='Download Arquivo' onclick='DownloadArquivo(\"".$row["Arquivo"]."\")' ".(($row["Arquivo"]!=null)?'enabled':'disabled')."><span class='glyphicon glyphicon glyphicon-download'></span></a>
                                        <a class='btn btn-primary' title='Visualizar Dados' href='./descpesagem.php?IdComposicao=".$row["Id"]."'><span class='glyphicon glyphicon glyphicon-eye-open'></span></a>	
                                    </td>
                                    </tr>";
								}
							}
							?>
						</tbody>
					</table>

				</div>

			</div>
			<?php
				if($_SESSION['usuarioNiveisAcessoId']<3)
				{
					echo "<div class='row'>
							<div class='col-sm-2 form-group'>
								<label class='control-label'>Senha</label>
								<input class='form-control' type='password' id='SenhaExclusao'/>					
							</div>
							<div class='col-sm-2 form-group'>	
								<label class='control-label'>&nbsp; </label>				
								<a class='btn btn-warning' title='excluir pesagem' onclick='ExcluirPesagens()'>Excluir Pesagens</a>
							</div>
						</div>";
				}
				?>
		</form>
	</div>
</body>

</html>