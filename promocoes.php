<?php
   include_once("funcoes.php");
   include_once("conexao.php");
   
   $TituloPage = "Promoções";
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
       
       $sql = "SELECT id_parceiros,SUM(pontuacoes) as sum_pontuacao FROM pontuacoes GROUP BY id_parceiros ORDER BY sum_pontuacao DESC";
       if ($nome != "" && $nome != null && $Ordem == 0)
           
           $sql = "SELECT id_parceiros,SUM(pontuacoes) as sum_pontuacao FROM pontuacoes WHERE nome like '%".$nome."%' GROUP BY id_parceiros ORDER BY sum_pontuacao DESC";
       
      else if ($nome != "" && $nome != null && $Ordem == 1)
           
           $sql = "SELECT id_parceiros,SUM(pontuacoes) as sum_pontuacao FROM pontuacoes WHERE nome like '%".$nome."%' GROUP BY id_parceiros ORDER BY sum_pontuacao ASC";
   
      else if ($Ordem == 1)
            $sql = "SELECT nome,id_parceiros,SUM(pontuacoes) as sum_pontuacao FROM pontuacoes GROUP BY id_parceiros ORDER BY sum_pontuacao ASC";
   
      else if ($Ordem == 0)
            $sql = "SELECT nome,id_parceiros,SUM(pontuacoes) as sum_pontuacao FROM pontuacoes GROUP BY id_parceiros ORDER BY sum_pontuacao DESC";
       
       
       
   
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
      <link rel="icon" href="./imagens/logo-polo-ico-azulclaro.png">
      <title><?= $TituloPage ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link href="css/gvd.css" rel="stylesheet">
      <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap-datetimepicker.js"></script>
      <script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/carregaloader.js"></script>
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
          CarregaLoader();
          $("#FormLog").submit();
      };
      
      function Editar(id) {
          $("#eError").text("");
          $("#eSucesso").text("");
          $.ajax({
              type: "POST",
              url: 'usuarioQuery.php',
              data: {
                  IdUsuario: id,
              },
              success: function(html) {
                  var ob = JSON.parse(html)
                  console.log(ob)
                  $("#eId").val(ob.id);
                  $("#eNome").val(ob.nome);
                  $("#eEmail").val(ob.email);
      $("#ePermissao").val(ob.niveis_acesso_id);
                  $("#eSenha").val("");
                  $("#ModalEdit").modal("show");
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError);
              }
      
          });
          return;
      };
      
      function Excluir(id){
          $("#ModalExcluir").modal("show");
          $("#IdExclude").val(id);
      }
      
      function AdicionarUsuario() {
          $("#eId").val(0);
          $("#eNome").val("");
          $("#eEmail").val("");
          $("#eSenha").val("");
          $("#eError").text("");
          $("#eSucesso").text("");
          $("#ModalEdit").modal("show");
      }
      
      function GravarUsuario() {
          if ($("#eNome").val() == null || $("#eNome").val() == "")
              $("#eError").text("É necessário preencher o campo nome");
          else if ($("#eEmail").val() == null || $("#eEmail").val() == "")
              $("#eError").text("É necessário preencher o campo email");
          else if ($("#eId").val() == 0 && ($("#eSenha").val() == null || $("#eSenha").val() == ""))
              $("#eError").text("É necessário preencher o campo senha");
      
          var dataU = {};
          dataU.Id = $("#eId").val();
          dataU.Nome = $("#eNome").val();
          dataU.Email = $("#eEmail").val();
          dataU.Senha = $("#eSenha").val();
      dataU.Permissao = $("#ePermissao").val();
      
          /*if(!ValidateEmail(dataU.Email)){
              $("#eError").text("Email inválido");
              return;
          }*/
      
          $.ajax({
              type: "POST",
              url: 'usuarioInsert.php',
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
          return;
      }
      
      function ExcluirUsuario(){
         
          var dataU = {};
          dataU.Id = $("#IdExclude").val();
         
          $.ajax({
              type: "POST",
              url: 'usuarioDelete.php',
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
                              <label class="control-label">Nome ou Usuário</label>
                              <input class="form-control" name="Nome" id="Nome"></input>
                           </div>
                           <div class="col-sm-2 form-group form-group-sm">
                              <label class="control-label">Ordem</label>
                              <select class="form-control" name="Ordem" id="Ordem">
                                 <option value="0" <?= ($Ordem == '0') ? 'selected' : '' ?>>Crescente</option>
                                 <option value="1" <?= ($Ordem == '1') ? 'selected' : '' ?>>Decrescente</option>
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
            <div class="col-sm-12 form-group-sm">
               <table class="table table-condensed table-striped ">
                  <thead>
                     <tr>
                        <th>Colocação</th>
                        <th>Nome</th>
                        <th>Pontuação Total</th>
                        <th>Obra mais Pontuada</th>
                        <th>Data de Cadastro</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        if ($result->num_rows > 0) {
                              $ranking = 1;
                            for ($i = 0; $i < $result->num_rows; $i++) {
                               
                                $row = $result->fetch_assoc();
                                           if($row["sum_pontuacao"]==""){
                                               $row["sum_pontuacao"] = 0;
                                           }
                                           
                                           $sqlparceiro = "SELECT * FROM parceiros Where id_parceiros=".$row["id_parceiros"];
                                           $stmtparceiro = $conn->prepare($sqlparceiro); //
                                           $stmtparceiro->execute();
                                           $resultparceiro = $stmtparceiro->get_result();
                                           $rowparceiro = $resultparceiro->fetch_assoc();
                                    
                                            $sqlmaiorpts = "SELECT id_obras FROM pontuacoes WHERE id_parceiros=".$row["id_parceiros"]." AND pontuacoes=
                                    (SELECT MAX(pontuacoes) FROM pontuacoes)";
                                           $stmtmaiorpts = $conn->prepare($sqlmaiorpts); //
                                           $stmtmaiorpts->execute();
                                           $resultmaiorpts = $stmtmaiorpts->get_result();
                                           $rowmaiorpts = $resultmaiorpts->fetch_assoc();
                                           if($rowmaiorpts["id_obras"]==""){
                                               $rowobra["nome"]= "Não Possui Obras Cadastradas";
                                           }
                                          else{
                                           $sqlobra = "SELECT * FROM obras WHERE id_obras=".$rowmaiorpts["id_obras"];          
                                           $stmtobra = $conn->prepare($sqlobra); //
                                           $stmtobra->execute();
                                           $resultobra = $stmtobra->get_result();
                                           $rowobra = $resultobra->fetch_assoc(); 
                                          }
                                           
                        
                                            // <td nowrap>" . $rowobra["nome"]. "</td>
                                         
                                          
                                           echo"<tr>
                                                <td nowrap>" . $ranking . "</td>
                                                <td nowrap>" . $rowparceiro["nome"] . "</td>
                                                <td nowrap>" . $row["sum_pontuacao"]. "</td>
                                                <td nowrap>" . $rowobra["nome"]. "</td>
                                                <td nowrap>" . $rowparceiro["data_cadastro"]. "</td></tr>";
                                        $ranking++;
                                
                            }
                        }
                        ?>
                  </tbody>
               </table>
               <div class="row">&nbsp;</div>
               <div class="row">&nbsp;</div>
            </div>
         </div>
      </div>
      <div id="ModalEdit" class="modal fade" role="dialog">
         <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header" style="background-color: #00091a; color:white; border-radius:5px 5px 0px 0px;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edição de Usuário</h4>
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
                     <div class="form-group form-group-sm col-sm-6">
                        <label class="control-label">Usuário</label>
                        <input type="email" required class="form-control" id="eEmail" name="eEmail" />
                     </div>
                     <div class="form-group form-group-sm col-sm-6">
                        <label class="control-label">Senha</label>
                        <input class="form-control" type="password" id="eSenha" name="eSenha" />
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-12">
                        <label class="control-label">Grupo de Permissão</label>
                        <select class="form-control" id="ePermissao" name="ePermissao">
                           <option value="1">Administrador</option>
                           <option value="3">Operador</option>
                        </select>
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
                  <button type="button" class="btn btn-success" onclick="GravarUsuario()">Gravar</button>
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
                        <h4>Deseja realmente excluir este usuário?</h4>
                     </div>
                  </div>
               </div>
               <div class="modal-footer" style="background-color: #00091a; border-radius:0px 0px 5px 5px;">
                  <button type="button" class="btn btn-success" onclick="ExcluirUsuario()">Excluir</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               </div>
            </div>
         </div>
      </div>
      <footer class="container-fluid text-center" style="background-color:#091742;position: fixed;bottom: 0px!important;width: 100vw;">
         <div class="row">
            <div class="col-sm-6 text-left"><img src="./imagens/Logo-Polo-Login.png" style="height:3vh;margin:10px"/></div>
            <div class="col-sm-6 text-right"><a href="https://www.gvdsolucoes.com.br"><img src="./imagens/logo-branca.png" style="height:3vh;margin:10px"/></a></div>
         </div>
         </div>
      </footer>
   </body>
</html>