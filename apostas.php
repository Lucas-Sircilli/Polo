<?php
   include_once("funcoes.php");
   include_once("conexao.php");
   
   $TituloPage = "Apostas";
   date_default_timezone_set('america/sao_paulo');
   
   try {
       if (isset($_POST["Nome"])) {
   
           $Ordem  = mysqli_real_escape_string($conn, $_POST["Ordem"]);
           $nome = mysqli_real_escape_string($conn, $_POST["Nome"]);
   
           //echo "<script>alert('".$$dt."')</script>";
   
       } else {
           $DataInicial = date('d/m/Y 00:00');
           $DataFinal = date('d/m/Y 23:59');
   
           $Ordem  = 0;
           $nome = "";
           $dti = formata_data_mysql($DataInicial);
           $dtf = formata_data_mysql($DataFinal);
       }
   
       $sql = "SELECT * FROM salas";
       if ($nome != "" && $nome != null)
           $sql = $sql . " WHERE nome like '%" . $nome . "%'";
   
       if ($Ordem == 1)
           $sql = $sql . " ORDER By nome DESC ";
   	else $sql = $sql . " ORDER By nome ASC ";
   
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
      <link rel="icon" href="imagens/herotips_v1.png">
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
      
      function Editar(id) {
          $("#eError").text("");
          $("#eSucesso").text("");
          $.ajax({
              type: "POST",
              url: 'salaQuery.php',
              data: {
                  IdSala: id,
              },
              success: function(html) {
                  var ob = JSON.parse(html)
                  console.log(ob)
                  $("#eId").val(ob.id);
                  $("#eNome").val(ob.nome);
                  $("#eUrl").val(ob.url_camera);
      $("#eUsuario").val(ob.usuario);
      $("#uVideo").attr("src", ob.url_camera);
                  $("#ModalEdit").modal("show");
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError);
              }
      
          });
          return;
      };
      
      function urlAlterada(){
      $("#uVideo").attr("src", $("#eUrl").val());
      };
      
      function Excluir(id){
          $("#ModalExcluir").modal("show");
          $("#IdExclude").val(id);
      };
      
      function AdicionarSala() {
          $("#eId").val(0);
          $("#eNome").val("");
          $("#eUrl").val("");   
      $("#eUsuario").val("");		
          $("#eError").text("");
          $("#eSucesso").text("");
          $("#ModalEdit").modal("show");
      };
      
      function GravarSala() {
          if ($("#eNome").val() == null || $("#eNome").val() == "")
              $("#eError").text("É necessário preencher o campo nome");
          else if ($("#eUrl").val() == null || $("#eUrl").val() == "")
              $("#eError").text("É necessário preencher o campo url da camera");
      else if ($("#eUsuario").val() == null || $("#eUsuario").val() == "")
              $("#eError").text("É necessário preencher o campo usuário");
      else{      
      
      var dataU = {};
      dataU.Id = $("#eId").val();
      dataU.Nome = $("#eNome").val();
      dataU.UrlCamera = $("#eUrl").val();
      dataU.Usuario = $("#eUsuario").val();
       
      /*if(!ValidateEmail(dataU.Email)){
      $("#eError").text("Email inválido");
      return;
      }*/
      
      $.ajax({
      type: "POST",
      url: 'salaInsert.php',
      data: dataU,
      success: function(html) {
      	if (html.indexOf("sucesso") != -1) {
      		$("#eSucesso").text(html);
      		$("#ModalEdit").modal("hide");
      		$("#FormLog").submit();
      	} else {
      		$("#eError").text(html);
      	}
      
      },
      error: function(xhr, ajaxOptions, thrownError) {
      	$("#eError").text(thrownError);
      }
      
      });
      }
          return;
      }
      
      function ExcluirSala(){
         
          var dataU = {};
          dataU.Id = $("#IdExclude").val();
         
          $.ajax({
              type: "POST",
              url: 'salaDelete.php',
              data: dataU,
              success: function(html) {
                  if (html.indexOf("sucesso") != -1) {                  
                      $("#ModalExcluir").modal("hide");
                      $("#FormLog").submit();
                  } else {
                      $("#eError").text(html);
                  }
      
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  $("#eError").text(thrownError);
              }
      
          });
          return;
      }
      
      function ValidateEmail(mail) {
          if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
              return (true)
          }
         
          return (false)
      }
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
                           <div class="col-sm-4 form-group form-group-sm">
                              <label class="control-label">Nome</label>
                              <input class="form-control" name="Nome" id="Nome"></input>
                           </div>
                           <div class="col-sm-2 form-group form-group-sm">
                              <label class="control-label">Ordem</label>
                              <select class="form-control" name="Ordem" id="Ordem">
                                 <option value="0" <?= ($Ordem == '0') ? 'selected' : '' ?>>Crecente</option>
                                 <option value="1" <?= ($Ordem == '1') ? 'selected' : '' ?>>Decrecente</option>
                              </select>
                           </div>
                           <div class="col-sm-4 form-group form-group-sm"></div>
                           <div class="col-sm-2 form-group form-group-sm text-right">
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
         </form>
         <div class="row">
            <div class="form-group form-group-sm col-sm-12">
               <a class="btn btn-primary" onclick="AdicionarSala()" title="Adicionar Usuário">Adicionar Sala</span></a>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12 form-group-sm">
               <table class="table table-condensed table-striped ">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Data Cadastro</th>
                        <th>Data Atualização</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        if ($result->num_rows > 0) {
                            for ($i = 0; $i < $result->num_rows; $i++) {
                                $row = $result->fetch_assoc();
                                echo "<tr>
                                    <td nowrap>" . $row["id"] . "</td>
                                    <td nowrap>" . ($row["nome"]) . "</td>  
                        <td nowrap>" . ($row["usuario"]) . "</td>
                                    <td nowrap>" . formata_data_exibicao($row["created"]) . "</td>
                                    <td nowrap>" . formata_data_exibicao($row["modified"]) . "</td>
                                    <td class='text-right' nowrap>
                                        <a class='btn btn-primary' title='Editar Usuário' onclick='Editar(" . $row["id"] . ")'><span class='glyphicon glyphicon glyphicon-edit'></span></a>
                                        <a class='btn btn-danger' title='Excluir Usuário' onclick='Excluir(" . $row["id"] . ")'><span class='glyphicon glyphicon glyphicon-trash'></span></a>
                                    </td>
                                    </tr>";
                            }
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div id="ModalEdit" class="modal fade" role="dialog">
         <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header" style="background-color: #00091a; color:white; border-radius:5px 5px 0px 0px;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edição de Sala</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-3">
                        <label class="control-label">Id</label>
                        <input class="form-control" id="eId" name="eId" disabled />
                     </div>
                     <div class="form-group form-group-sm col-sm-9">
                        <label class="control-label">Nome</label>
                        <input class="form-control" id="eNome" name="eNome" />
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-12">
                        <label class="control-label">URL da Câmera</label>
                        <input type="text" class="form-control" id="eUrl" name="eUrl" onchange="urlAlterada();" />
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-6">
                        <label class="control-label">Usuário</label>
                        <input type="text" class="form-control" id="eUsuario" name="eUsuario">
                     </div>
                     <div class="form-group form-group-sm col-sm-6">
                        <label class="control-label">Vídeo</label>
                        <!--<img style='-webkit-user-select: none;margin: auto;width: 100%;' id="uVideo" name="uVideo" src="" />-->
                        <iframe style='-webkit-user-select: none;margin: auto;width:100%;' id="uVideo" name="uVideo" src='' frameborder='0' allowfullscreen></iframe>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-12">
                        <span id="eError" name="eError" style="color:firebrick"></span>
                        <span id="eSucesso" name="eSucesso" style="color:green"></span>
                     </div>
                  </div>
               </div>
               <div class="modal-footer" style="background-color: #00091a; border-radius:0px 0px 5px 5px;">
                  <button type="button" class="btn btn-success" onclick="GravarSala()">Gravar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               </div>
            </div>
         </div>
      </div>
      <div id="ModalExcluir" class="modal fade" role="dialog">
         <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header" style="background-color: #00091a; color:white; border-radius:5px 5px 0px 0px;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Atenção</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-12">
                        <input name="IdExclude" id="IdExclude" style="display:none"/>
                        <h4>Deseja realmente excluir esta sala?</h4>
                     </div>
                  </div>
               </div>
               <div class="modal-footer" style="background-color: #00091a; border-radius:0px 0px 5px 5px;">
                  <button type="button" class="btn btn-success" onclick="ExcluirSala()">Excluir</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               </div>
            </div>
         </div>
      </div>
      <footer class="container-fluid text-center" style="background-color:#091742;position: fixed;bottom: 0px!important;width: 100vw;">
         <div class="row">
            <div class="col-sm-6 text-left"><img src="./imagens/iconeBranco2.png" style="height:3vh;margin:10px"/></div>
            <div class="col-sm-6 text-right"><a href="https://www.gvdsolucoes.com.br"><img src="./imagens/logo-branca.png" style="height:3vh;margin:10px"/></a></div>
         </div>
      </footer>
   </body>
</html>