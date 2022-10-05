<?php
	session_start();
	$TituloPage = "FTPs";
	include_once("conexao.php");
		
	try
	{
		if(isset($_POST["servidor_ftps"]) && isset($_POST["usuario_ftps"]) && isset($_POST["senha_ftps"]) && isset($_POST["pasta_ftps"]))
		{
			if(empty($_POST["servidor_ftps"]))
				$erro = "Campo 'Endereço do Servidor' é obrigatório";
			else if(empty($_POST["usuario_ftps"]))
				$erro = "Campo 'Usuário' é obrigatório";
			else if(empty($_POST["senha_ftps"]))
				$erro = "Campo 'Senha' é obrigatório";
			else if(empty($_POST["pasta_ftps"]))
				$erro = "Campo 'Pasta de Arquivos' é obrigatório";
			else{
				$id = mysqli_real_escape_string($conn, $_POST["id"]);	
				$servidor_ftps = mysqli_real_escape_string($conn, $_POST["servidor_ftps"]);
				$usuario_ftps  = mysqli_real_escape_string($conn, $_POST["usuario_ftps"]);
				$senha_ftps    = mysqli_real_escape_string($conn, $_POST["senha_ftps"]);
				$pasta_ftps    = mysqli_real_escape_string($conn, $_POST["pasta_ftps"]);
				
				if($id == -1)
				{
					$stmt = $conn->prepare("INSERT INTO `configuracoes` (`servidor_ftps`,`usuario_ftps`,`senha_ftps`,`pasta_ftps`) VALUES (?,?,?,?)");
					$stmt->bind_param('ssss', $servidor_ftps, $usuario_ftps, $senha_ftps, $pasta_ftps);	
				
					if(!$stmt->execute())
					{
						$erro = $stmt->error;
					}
					else
					{
						$sucesso = "Registro gravado com sucesso!";
					}
				}
				else if(is_numeric($id) && $id >= 1)
				{
					$stmt = $conn->prepare("UPDATE `configuracoes` SET `servidor_ftps`=?, `usuario_ftps`=?, `senha_ftps`=?, `pasta_ftps`=? WHERE id = ? ");
					$stmt->bind_param('ssssi', $servidor_ftps, $usuario_ftps, $senha_ftps, $pasta_ftps, $id);
				
					if(!$stmt->execute())
					{
						$erro = $stmt->error;
					}
					else
					{
						$sucesso = "Registro gravado com sucesso!";
					}
				}
			}			
		}
	
		$stmt = $conn->prepare("SELECT * FROM configuracoes"); //
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows>0)
		{
			$aux_query = $result->fetch_assoc();
			
			$id = $aux_query["id"];
			$servidor_ftps = $aux_query["servidor_ftps"];
			$usuario_ftps  = $aux_query["usuario_ftps"];
			$senha_ftps    = $aux_query["senha_ftps"];
			$pasta_ftps    = $aux_query["pasta_ftps"];
			 
			$stmt->close();
		}
		else
		{
			$id = -1;	
			$servidor_ftps = mysqli_real_escape_string($conn, $_POST["servidor_ftps"]);
			$usuario_ftps  = mysqli_real_escape_string($conn, $_POST["usuario_ftps"]);
			$senha_ftps    = mysqli_real_escape_string($conn, $_POST["senha_ftps"]);
			$pasta_ftps    = mysqli_real_escape_string($conn, $_POST["pasta_ftps"]);
		}
	}
	catch(Exception $e)
	{
		$erro = $e->getMessage();
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="author" content="Douglas Chiodi - GVD Soluções Inteligentes">
	<link rel="icon" href="imagens/favicon.ico">
	<title>Configuração FTPS - STA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
	function TestarFTPs(){		
		$(".botoes").prop('disabled', true);
		$.ajax({
           type: "POST",
           url: 'TesterFTPs.php',
           data:{servidor_ftps:$("#servidor_ftps").val(), usuario_ftps: $("#usuario_ftps").val(), senha_ftps: $("#senha_ftps").val()                         },
           success:function(html) {
             
			 $("#MsgTeste").html(html);
			 $("#ModalAviso").modal("show");
			 $(".botoes").prop('disabled', false);
           },
		   error: function (xhr, ajaxOptions, thrownError) {
       
		
		$("#MsgTeste").html(thrownError);
			 $("#ModalAviso").modal("show");
			 $(".botoes").prop('disabled', false);
        //alert(thrownError);
      }

      });
	  return;
	};
	
	function SubmeterForm(){		
		$("#FormFtp").submit();		
	};
</script>
<body>

<?php include 'menu.php'; ?>

<div class="container ">
  <div class="row">
	<div class="col-sm-6 form-group-sm">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
				Dados de Acesso
				</div>
			</div>
			<div class="panel-body">
				<form id="FormFtp" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
					<div class="row">
						<div class="col-sm-12 form-group form-group-sm">
							<label class="control-label">Endereço do Servidor</label>
							<input name="servidor_ftps" id="servidor_ftps" class="form-control" value="<?=$servidor_ftps?>"></input>
							<input name="id" class="form-control" value="<?=$id?>" style="display:none;"></input>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 form-group form-group-sm">
							<label class="control-label">Usuário</label>
							<input name="usuario_ftps" id="usuario_ftps"  class="form-control" value="<?=$usuario_ftps?>"></input>
						</div>
						<div class="col-sm-6 form-group form-group-sm">
							<label class="control-label">Senha</label>
							<input name="senha_ftps" type="password" id="senha_ftps" class="form-control" value="<?=$senha_ftps?>"></input>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group form-group-sm">
							<label class="control-label">Pasta de Arquivos</label>
							<input name="pasta_ftps" id="pasta_ftps" class="form-control" value="<?=$pasta_ftps?>"></input>
						</div>
					</div>
					
				</form>
				<div class="row">
						<div class="col-sm-6 form-group form-group-sm">
							<?php
								if(isset($erro))
									echo '<div style="color:firebrick">'.$erro.'</div><br/><br/>';
								else
								if(isset($sucesso))
									echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';					
							?>
						</div>		
						<div class="col-sm-6 form-group form-group-sm text-right">
							
							<button  class="botoes btn btn-primary" onclick="TestarFTPs();">Testar</button>
							<button class="botoes btn btn-success" onclick="SubmeterForm();">Gravar</button>
						</div>
					</div>
			</div>
		</div>			
	</div>	
  </div>
</div>
<div class="modal fade" role="dialog" id="ModalAviso">
	<div class="modal-dialog">
		<div class="modal-content ui-draggable">
			<div class="modal-header ui-draggable-handle" style="background-color:#333; color:#b3b3b3">
				<h5 class="modal-title" style="font-weight:bold">Teste de Funcionamento do FTPs</h5>
			</div>
			<div class="modal-body" id="MsgTeste"></div>
			<div class="modal-footer"  style="background-color:#333; color:#b3b3b3">
				<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>
