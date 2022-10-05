<?php
include_once("funcoes.php");
include_once("conexao.php");

$TituloPage = "Execução da Pesagem";
date_default_timezone_set('america/sao_paulo');

try {
	if (isset($_GET["IdComposicao"])) {
        if (empty($_GET["IdComposicao"]))
        {
            $URL = "sair.php";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            exit();
        }
		$IdComposicao = mysqli_real_escape_string($conn, $_GET["IdComposicao"]);
			
		
	} else {
		$URL = "sair.php";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            exit();
	}

	$sql = "SELECT * FROM Pesagens WHERE IdComposicao='".$IdComposicao."' ";
	
	
	if($Ordem==1)
		$sql = $sql." ORDER By DataPesagem DESC ";

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
</script>

<body>

	<?php include 'menu.php'; ?>

	<div class="container ">
		<form id="FormLog" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
			
			<div class="row">
				<div class="col-sm-12 form-group-sm">
					<table class="table table-condensed table-striped table-bordered">
						<thead>
							<tr>
                                <th>Id</th>
                                <th>Data Balança</th>
                                <th>Data Gravação</th>
								<th>Sensor</th>
                                <th>Seq Sensor</th>
                                <th>Lsb Esquerdo</th>
                                <th>Ton Esquerdo</th>
                                <th>Lsb Direito</th>
                                <th>Ton Direito</th>
                               
                                <th>Vel Calculada</th>  
                                                         
							</tr>
						</thead>
						<tbody>
							<?php
							if ($result->num_rows > 0) {
								for ($i = 0; $i < $result->num_rows; $i++) {
									$row = $result->fetch_assoc();
                                    echo "<tr>
                                    <td nowrap>" . $row["Id"] . "</td>
                                    <td nowrap>" . formata_data_exibicao($row["DataBalanca"] ). "</td>
                                    <td nowrap>" . formata_data_exibicao($row["DataPesagem"]) . "</td>
                                    <td nowrap>" . $row["IdSensor"] . "</td>
                                    <td nowrap>" . $row["SequenciaSensor"] . "</td>
                                    <td nowrap>" . number_format($row["LsbEsquerdo"], 2, '.', ''). "</td>
                                    <td nowrap>" . number_format($row["TonEsquerdo"], 2, '.', '') . "</td>
                                    <td nowrap>" . number_format($row["LsbDireito"], 2, '.', ''). "</td>
                                    <td nowrap>" . number_format($row["TonDireito"], 2, '.', '') . "</td>
                                    <td nowrap>" . number_format($row["VelocidadeCalculada"], 2, '.', '') . "</td>
                                   
                                    </tr>";
								}
							}
							?>
						</tbody>
					</table>

				</div>

			</div>

		</form>
	</div>
</body>

</html>