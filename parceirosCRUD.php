<?php
   include_once("funcoes.php");
   include_once("conexao.php");
   
   $TituloPage = "Cadastro de Parceiros";
   date_default_timezone_set('america/sao_paulo');
   
   try {
       if (isset($_GET["id"])){
       $id = $_GET["id"];
       }
       
   /// Consulta empresas  ////
      $sql = "SELECT * FROM parceiros";
       if ($id != "" && $id != null){
           
           $sql = $sql . " WHERE id_parceiros='" . $id . "'";
           }
       
   
       
   
       $stmt = $conn->prepare($sql); //
       $stmt->execute();
       $result = $stmt->get_result();
       
                           if ($result->num_rows > 0) {
                               for ($i = 0; $i < $result->num_rows; $i++) {
                                   $row = $result->fetch_assoc();
                                  
                   }
                               
                           }
                   
        if($id == 0){
           
           $row["id_parceiros"] = 0;
           
       }
       
      
       $sql = "SELECT * FROM parceiros WHERE id_parceiros='" . $id . "'";
      
   
       
   
       $stmt = $conn->prepare($sql); //
       $stmt->execute();
       $result = $stmt->get_result();
       
                            /*if ($result->num_rows > 0) {
                               for ($i = 0; $i < $result->num_rows; $i++) {
                                   $row1 = $result->fetch_assoc();
                                  
                   }
                               
                           }*/
                   
       /* if($id == 0){
           
           $row1["id_vendedores"] = 0;
           
       }*/
       
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          
          MostrarPessoa();
          
          // Number
      });
      
      function SubmeterForm() {
          CarregaLoader();
          $("#FormLog").submit();
      };
      
      function Excluir(id){
          $("#ModalExcluir").modal("show");
          $("#IdExclude").val(id);
      }
      
      
      function Cancelar(){
          location.href= "http://polo.gvdsolucoes.com.br/parceiros.php";
          // history.back();
      }
      function MostrarPessoa(){
         if($("#eTipopessoa").children("option:selected")[0].innerText == "Pessoa Jurídica"){
         document.getElementById("epessoaJuridica").style.display = "block";
          document.getElementById("epessoaFisica").style.display = "none";
         }
         else{
          document.getElementById("epessoaFisica").style.display = "block";
          document.getElementById("epessoaJuridica").style.display = "none";
         }
          
        
      }
      
          
      function GravarParceiro() {
          
          $("#eError").text("");
          $("#eSucesso").text("");
          var dataU = {};
          
          if ($("#eNome").val() == null || $("#eNome").val() == "")
              $("#eError").text("É necessário preencher o campo de Nome");
              
          if ($("#eCpf").val() == null || $("#eCpf").val() == "")
              $("#eError").text("É necessário preencher o campo de CPF");
              
          if ($("#eRg").val() == null || $("#eRg").val() == "")
              $("#eError").text("É necessário preencher o campo de RG");
              
          if(document.getElementById("epessoaJuridica").style.display == 'block'){
              if ($("#eCnpj").val() == null || $("#eCnpj").val() == "")
              $("#eError").text("É necessário preencher o campo de CNPJ");
              
              if ($("#eRazaoSocial").val() == null || $("#eRazaoSocial").val() == "")
              $("#eError").text("É necessário preencher o campo de Razão Social em Pessoa Jurídica");
              
              if ($("#eCEPEmpresa").val() == null || $("#eCEPEmpresa").val() == "")
              $("#eError").text("É necessário preencher o campo de CEP");
              
              if ($("#eCidadeEmpresa").val() == null || $("#eCidadeEmpresa").val() == "")
              $("#eError").text("É necessário preencher o campo de Cidade em Pessoa Jurídica");
              
          if ($("#eEnderecoEmpresa").val() == null || $("#eEnderecoEmpresa").val() == "")
              $("#eError").text("É necessário preencher o campo de Endereço em Pessoa Jurídica");
              
          if ($("#eNumeroEmpresa").val() == null || $("#eNumeroEmpresa").val() == "")
              $("#eError").text("É necessário preencher o campo de Número em Pessoa Jurídica");
              
          if ($("#eBairroEmpresa").val() == null || $("#eBairroEmpresa").val() == "")
              $("#eError").text("É necessário preencher o campo de Bairro em Pessoa Jurídica");
              
          if ($("#eInscricaoMunicipal").val() == null || $("#eInscricaoMunicipal").val() == "")
              $("#eError").text("É necessário preencher o campo de Inscrição Municipal em Pessoa Jurídica");
              
          dataU.CNPJ = $("#eCnpj").val();
          dataU.ComplementoEmpresa = $("#eComplementoEmpresa").val();
          dataU.RazaoSocial = $("#eRazaoSocial").val();
          dataU.CEPEmpresa = $("#eCEPEmpresa").val();
          dataU.EnderecoEmpresa = $("#eEnderecoEmpresa").val();
          dataU.CidadeEmpresa = $("#eCidadeEmpresa").val();
          dataU.NumeroEmpresa = $("#eNumeroEmpresa").val();
          dataU.BairroEmpresa = $("#eBairroEmpresa").val();
          dataU.InscricaoMunicipal = $("#eInscricaoMunicipal").val();
          if ($("#eDataFundacao").val() != null || $("#eDataFundacao").val() != "")
              dataU.DataFundacao = $("#eDataFundacao").val();
              
          }
          if(document.getElementById("epessoaFisica").style.display == 'block'){
             
          if ($("#eCidade").val() == null || $("#eCidade").val() == "")
              $("#eError").text("É necessário preencher o campo de Cidade");
              
          if ($("#eCEP").val() == null || $("#eCEP").val() == "")
              $("#eError").text("É necessário preencher o campo de CEP");
              
          if ($("#eEndereco").val() == null || $("#eEndereco").val() == "")
              $("#eError").text("É necessário preencher o campo de Logradouro");
              
          if ($("#eNumero").val() == null || $("#eNumero").val() == "")
              $("#eError").text("É necessário preencher o campo de Número");
              
          if ($("#eBairro").val() == null || $("#eBairro").val() == "")
              $("#eError").text("É necessário preencher o campo de Bairro");
          
          dataU.CEP = $("#eCEP").val();
          dataU.Endereco = $("#eEndereco").val();
          dataU.Numero = $("#eNumero").val();
          dataU.Bairro = $("#eBairro").val();
          dataU.Cidade = $("#eCidade").val();
          dataU.Complemento = $("#eComplemento").val();
              }
              
          
          if ($("#eTipopessoa").val() == null || $("#eTipopessoa").val() == "")
              $("#eError").text("É necessário preencher o campo de Tipo de Pessoa");
              
          if ($("#eTipoProfissao").val() == null || $("#eTipoProfissao").val() == "")
              $("#eError").text("É necessário preencher o campo de Tipo de profissão");
          
          if ($("#eDataAniversario").val() != null || $("#eDataAniversario").val() != "")
              dataU.DataAniversario = $("#eDataAniversario").val();
         
          
          
          dataU.Usuario = $("#eCnpj").val();
      dataU.Permissao = 3;
          dataU.Id = $("#eId").val();
          dataU.RG = $("#eRg").val();
          dataU.CPF = $("#eCpf").val();
          dataU.Nome = $("#eNome").val();
          dataU.TipoPessoa  = $("#eTipopessoa").children("option:selected")[0].innerText;
          dataU.TipoProfissao  = $("#eTipoProfissao").children("option:selected")[0].innerText;
          
          dataU.NomeSocio1 = $("#eNomeSocio1").val();
          dataU.PercentualSocio1 = $("#ePercentualSocio1").val();
          dataU.Isadminsocio1 = $("#eIsadminsocio1").children("option:selected")[0].innerText;
          //dataU.Isadminsocio1 = $("#eIsadminsocio1").val();
          
          dataU.NomeSocio2 = $("#eNomeSocio2").val();
          dataU.PercentualSocio2 = $("#ePercentualSocio2").val();
          //dataU.Isadminsocio2 = $("#eIsadminsocio2").val();
          dataU.Isadminsocio2 = $("#eIsadminsocio2").children("option:selected")[0].innerText;
          
          dataU.NomeSocio3 = $("#eNomeSocio3").val();
          dataU.PercentualSocio3 = $("#ePercentualSocio3").val();
          //dataU.Isadminsocio3 = $("#eIsadminsocio3").val();
          dataU.Isadminsocio3 = $("#eIsadminsocio3").children("option:selected")[0].innerText;
          
          dataU.NomeSocio4 = $("#eNomeSocio4").val();
          dataU.PercentualSocio4 = $("#ePercentualSocio4").val();
          //dataU.Isadminsocio4 = $("#eIsadminsocio4").val();
          dataU.Isadminsocio4 = $("#eIsadminsocio4").children("option:selected")[0].innerText;
          
          dataU.NomeSocio5 = $("#eNomeSocio5").val();
          dataU.PercentualSocio5 = $("#ePercentualSocio5").val();
          //dataU.Isadminsocio5 = $("#eIsadminsocio5").val();
          dataU.Isadminsocio5 = $("#eIsadminsocio5").children("option:selected")[0].innerText;
          
          
          
          
         
          /*if(!ValidateEmail(dataU.Email)){
              $("#eError").text("Email inválido");
              return;
          }*/
          if($("#eError")[0].innerText == null || $("#eError")[0].innerText == ""){
          $.ajax({
              type: "POST",
              url: 'parceirosInsert.php',
              data: dataU,
              success: function(html) {
                  if (html.indexOf("sucesso") != -1) {
                      $("#eSucesso").text(html);
                      CarregaLoader();
                      location.href= "http://polo.gvdsolucoes.com.br/parceiros.php";
                      //history.back();
                      //$("#FormLog").submit();
                      
                      /*window.opener.location.reload();    
                      window.close();*/
                      //window.location.href = "http://polo.gvdsolucoes.com.br/empresas.php";
                  } else {
                       CarregaLoader();
                      $("#eError").text(html);
                      TiraLoader();
                  }
      
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  CarregaLoader();
                  $("#eError").text(thrownError);
                  TiraLoader();
              }
      
          });}
         TiraLoader();
          return;
      }
      
      
      function ExcluirUsuario(){
         
          var dataU = {};
          dataU.Id = $("#IdExclude").val();
         
          $.ajax({
              type: "POST",
              url: 'empresasDelete.php',
              data: dataU,
              success: function(html) {
                  if (html.indexOf("sucesso") != -1) {                  
                      $("#ModalExcluir").modal("hide");
                      var href =  window.location.href;
                      $("#FormLog").submit();
                      
                      window.location.href = href;
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
      function handleMask(event, mask) {
      with (event) {
          stopPropagation()
          preventDefault()
          if (!charCode) return
          var c = String.fromCharCode(charCode)
          if (c.match(/\D/)) return
          with (target) {
              var val = value.substring(0, selectionStart) + c + value.substr(selectionEnd)
              var pos = selectionStart + 1
          }
      }
      var nan = count(val, /\D/, pos) // nan va calcolato prima di eliminare i separatori
      val = val.replace(/\D/g,'')
      
      var mask = mask.match(/^(\D*)(.+9)(\D*)$/)
      if (!mask) return // meglio exception?
      if (val.length > count(mask[2], /9/)) return
      
      for (var txt='', im=0, iv=0; im<mask[2].length && iv<val.length; im+=1) {
          var c = mask[2].charAt(im)
          txt += c.match(/\D/) ? c : val.charAt(iv++)
      }
      
      with (event.target) {
          value = mask[1] + txt + mask[3]
          selectionStart = selectionEnd = pos + (pos==1 ? mask[1].length : count(value, /\D/, pos) - nan)
      }
      
      function count(str, c, e) {
          e = e || str.length
          for (var n=0, i=0; i<e; i+=1) if (str.charAt(i).match(c)) n+=1
          return n
      }
      }
      $("input[name='number']").focusout(function(){
      var number = this.value.replace(/(\d{2})(\d{3})(\d{2})/,"$1-$2-$3");
      this.value = number;
      })
      $("input[name='masknumber']").on("keyup change", function(){
          $("input[name='number']").val(destroyMask(this.value));
      this.value = createMask($("input[name='number']").val());
      })
      
      function createMask(string){
      return string.replace(/(\d{2})(\d{3})(\d{2})/,"$1-$2-$3");
      }
      
      function destroyMask(string){
      return string.replace(/\D/g,'').substring(0,8);}
   </script>
   <body>
      <?php include 'menu.php'; ?>
      <div class="container" style="padding-bottom:20px ">
         <div class="row">
            <div class="form-group-sm col-sm-12">
               <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav" style="padding-bottom:10px">
                     <li>
                        <a onclick='CarregaLoader();GravarParceiro()' class="btn btn-link"><i class="fa fa-floppy-o" ></i>&nbsp;Gravar</a>
                     </li>
                     <li><a onclick='CarregaLoader();Cancelar()'class="btn btn-link"  ><i class="fa fa-times-circle-o" ></i>&nbsp;Voltar</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <form id="FormLog" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="row">
               <div class="col-sm-12 form-group-sm">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">
                           Dados do Parceiro
                        </div>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">Id</label>
                              <input class="form-control" id="eId" name="eId" value="<?php echo $row["id_parceiros"];?>" disabled />
                           </div>
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">RG</label>
                              <input class="form-control" id="eRg" onkeypress="handleMask(event, '99.999.999-9')" name="eRg"
                                 value="<?php echo $row["rg"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">CPF</label>
                              <input class="form-control" id="eCpf" onkeypress="handleMask(event, '999.999.999-99')" name="eCpf" value="<?php echo $row["cpf"]; ?>" <?= ($row["cpf"] != null) ? 'disabled' : '' ?>/>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Nome</label>
                              <input class="form-control" id="eNome" name="eNome"
                                 value="<?php echo $row["nome"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">Tipo de Pessoa</label>
                              <select class="form-control" name="eTipopessoa"  id="eTipopessoa" onChange="MostrarPessoa()">
                                 <option value="0" <?= ($row["id_tipo_pessoa"]=='Pessoa Física') ? 'selected' : '' ?>>Pessoa Física</option>
                                 <option value="1"<?=($row["id_tipo_pessoa"]=='Pessoa Jurídica') ? 'selected' : '' ?>>Pessoa Jurídica</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-4 form-group form-group-sm">
                              <label class="control-label">Data de Aniversário</label>
                              <div class="input-group date form_datetime col-md-12" style="z-index:0;">
                                 <input class="form-control" size="16" name="eDataAniversario" id="eDataAniversario" type="text" value="<?php echo formata_data_exibicao($row["data_aniversario"]);?>"readonly />
                                 <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                 <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                              </div>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Profissão</label>
                              <select class="form-control" name="eTipoProfissao"  id="eTipoProfissao" >
                                 <option value="0" <?= ($row["id_tipo_parceiro"]=='Engenheiro') ? 'selected' : '' ?>>Engenheiro</option>
                                 <option value="1"<?=($row["id_tipo_parceiro"]=='Arquiteto') ? 'selected' : '' ?>>Arquiteto</option>
                                 <option value="2" <?= ($row["id_tipo_parceiro"]=='Design') ? 'selected' : '' ?>>Design</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row" name="epessoaFisica" style="display:none" id="epessoaFisica">
               <div class="col-sm-12 form-group-sm">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">
                           Endereço de Pessoa Física
                        </div>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">CEP</label>
                              <input class="form-control" id="eCEP" onkeypress="handleMask(event, '99999-999')" name="eCEP"value="<?php echo $row["cep"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Logradouro</label>
                              <input class="form-control" id="eEndereco" name="eEndereco" value="<?php echo $row["endereco"];?>" />
                           </div>
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">Número</label>
                              <input class="form-control" id="eNumero" name="eNumero" value="<?php echo $row["numero"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Bairro</label>
                              <input class="form-control" id="eBairro" name="eBairro"value="<?php echo $row["bairro"];?>"/> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Complemento</label>
                              <input class="form-control" id="eComplemento" name="eComplemento" value="<?php echo $row["complemento"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Cidade</label>
                              <input class="form-control" id="eCidade" name="eCidade" value="<?php echo $row["cidade"];?>"/>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--	<div class="row"  name="epessoaJuridica" style="visibility:hidden" id="epessoaJuridica"> -->
            <div class="row"  name="epessoaJuridica" style="display:none" id="epessoaJuridica">
               <div class="col-sm-12 form-group-sm">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">
                           Dados e Endereço de Pessoa Jurídica
                        </div>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">CNPJ</label>
                              <input class="form-control" id="eCnpj" onkeypress="handleMask(event, '99-999-999/9999-99')" name="eCnpj"value="<?php echo $row["cnpj"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Razao Social</label>
                              <input class="form-control" id="eRazaoSocial" name="eRazaoSocial"value="<?php echo $row["razao_social"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">CEP</label>
                              <input class="form-control" id="eCEPEmpresa" onkeypress="handleMask(event, '99999-999')"name="eCEPEmpresa"value="<?php echo $row["cep_empresa"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Logradouro</label>
                              <input class="form-control" id="eEnderecoEmpresa" name="eEnderecoEmpresa" value="<?php echo $row["endereco_empresa"];?>" />
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Complemento</label>
                              <input class="form-control" id="eComplementoEmpresa" name="eComplementoEmpresa" value="<?php echo $row["complemento_empresa"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Cidade</label>
                              <input class="form-control" id="eCidadeEmpresa" name="eCidadeEmpresa" value="<?php echo $row["cidade_empresa"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">Número</label>
                              <input class="form-control" id="eNumeroEmpresa" name="eNumeroEmpresa" value="<?php echo $row["numero_empresa"];?>"/>
                           </div>
                           <div class="form-group form-group-sm col-sm-2">
                              <label class="control-label">Bairro</label>
                              <input class="form-control" id="eBairroEmpresa" name="eBairroEmpresa"value="<?php echo $row["bairro_empresa"];?>"/> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Inscrição Municipal</label>
                              <input class="form-control" id="eInscricaoMunicipal" name="eInscricaoMunicipal"value="<?php echo $row["inscricao_municipal"];?>"/> 
                           </div>
                           <div class="form-group form-group-sm col-sm-4" >
                              <label class="control-label">Data de Fundação</label>
                              <div class="input-group date form_datetime col-md-12" style="z-index:0;">
                                 <input class="form-control" size="16" name="eDataFundacao" id="eDataFundacao" type="text" value="<?php echo formata_data_exibicao($row["data_fundacao"]);?>"readonly />
                                 <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                 <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12 form-group-sm">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">
                           Sócios
                        </div>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Nome do Sócio 1</label>
                              <input class="form-control" id="eNomeSocio1" name="eNomeSocio1" value="<?php echo $row["nome_socio1"];?>" />
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Percentual do Sócio 1</label>
                              <input class="form-control" id="ePercentualSocio1" name="ePercentualSocio1" value="<?php echo $row["percentual_socio1"];?>" />
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 1 é Administrador?</label>
                              <select class="form-control" name="eIsadminsocio1"  id="eIsadminsocio1" >
                                 <option value="0" <?= ($row["is_admin_socio1"]=='Sim') ? 'selected' : '' ?>>Sim</option>
                                 <option value="1"<?=($row["is_admin_socio1"]=='Não') ? 'selected' : '' ?>>Não</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Nome do Sócio 2</label>
                              <input class="form-control" id="eNomeSocio2" name="eNomeSocio2" value="<?php echo $row["nome_socio2"];?>" />
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Percentual do Sócio 2</label>
                              <input class="form-control" id="ePercentualSocio2" name="ePercentualSocio2" value="<?php echo $row["percentual_socio2"];?>" />
                           </div>
                           <!--<div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 2 é Administrador?</label>
                              <input class="form-control" id="eIsadminsocio2" name="eIsadminsocio2" value="<?//php echo $row["is_admin_socio2"];?>" />
                              </div> -->
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 2 é Administrador?</label>
                              <select class="form-control" name="eIsadminsocio2" id="eIsadminsocio2" >
                                 <option value="0" <?= ($row["is_admin_socio2"]=='Sim') ? 'selected' : '' ?>>Sim</option>
                                 <option value="1"<?=($row["is_admin_socio2"]=='Não') ? 'selected' : '' ?>>Não</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Nome do Sócio 3</label>
                              <input class="form-control" id="eNomeSocio3" name="eNomeSocio3" value="<?php echo $row["nome_socio3"];?>" />
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Percentual do Sócio 3</label>
                              <input class="form-control" id="ePercentualSocio3" name="ePercentualSocio3" value="<?php echo $row["percentual_socio3"];?>" />
                           </div>
                           <!-- <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 3 é Administrador?</label>
                              <input class="form-control" id="eIsadminsocio3" name="eIsadminsocio3" value="<?//php echo $row["is_admin_socio3"];?>" />
                              </div> -->
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 3 é Administrador?</label>
                              <select class="form-control" name="eIsadminsocio3" id="eIsadminsocio3" >
                                 <option value="0" <?= ($row["is_admin_socio3"]=='Sim') ? 'selected' : '' ?>>Sim</option>
                                 <option value="1"<?=($row["is_admin_socio3"]=='Não') ? 'selected' : '' ?>>Não</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Nome do Sócio 4</label>
                              <input class="form-control" id="eNomeSocio4" name="eNomeSocio4" value="<?php echo $row["nome_socio4"];?>" />
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Percentual do Sócio 4</label>
                              <input class="form-control" id="ePercentualSocio4" name="ePercentualSocio4"value="<?php echo $row["percentual_socio4"];?>" />
                           </div>
                           <!-- <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 4 é Administrador?</label>
                              <input class="form-control" id="eIsadminsocio4" name="eIsadminsocio4" value="<?//php echo $row["is_admin_socio4"];?>" />
                              </div> -->
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 4 é Administrador?</label>
                              <select class="form-control" name="eIsadminsocio4" id="eIsadminsocio4" >
                                 <option value="0" <?= ($row["is_admin_socio4"]=='Sim') ? 'selected' : '' ?>>Sim</option>
                                 <option value="1"<?=($row["is_admin_socio4"]=='Não') ? 'selected' : '' ?>>Não</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Nome do Sócio 5</label>
                              <input class="form-control" id="eNomeSocio5" name="eNomeSocio5" value="<?php echo $row["nome_socio5"];?>" />
                           </div>
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Percentual do Sócio 5</label>
                              <input class="form-control" id="ePercentualSocio5" name="ePercentualSocio5" value="<?php echo $row["percentual_socio5"];?>" />
                           </div>
                           <!-- <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 5 é Administrador?</label>
                              <input class="form-control" id="eIsadminsocio5" name="eIsadminsocio5" value="<?//php echo $row["is_admin_socio5"];?>" /> 
                              </div> -->
                           <div class="form-group form-group-sm col-sm-4">
                              <label class="control-label">Sócio 5 é Administrador?</label>
                              <select class="form-control" name="eIsadminsocio5" id="eIsadminsocio5" >
                                 <option value="0" <?= ($row["is_admin_socio5"]=='Sim') ? 'selected' : '' ?>>Sim</option>
                                 <option value="1"<?=($row["is_admin_socio5"]=='Não') ? 'selected' : '' ?>>Não</option>
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
                  </div>
               </div>
            </div>
            <div class="row">&nbsp;</div>
         </form>
      </div>
      <div id="ModalEdit" class="modal fade" role="dialog">
         <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header" style="background-color: #00091a; color:white; border-radius:5px 5px 0px 0px;">
                  <button type="button" class="close" onclick="TiraLoader()" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edição de Vendedor</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-4">
                        <label class="control-label">Id Vendedor</label>
                        <input class="form-control" id="eIdVendedor" name="eIdVendedor" value="<?php echo $row1["id_vendedores"];?>" disabled/>
                     </div>
                     <div class="form-group form-group-sm col-sm-4">
                        <label class="control-label">Nome</label>
                        <input class="form-control" id="eNomeVendedor" name="eNomeVendedor" value="<?php echo $row1["nome"];?>" />
                     </div>
                     <div class="form-group form-group-sm col-sm-2">
                        <label class="control-label">CPF</label>
                        <input class="form-control" id="eCpfVendedor" name="eCpfVendedor" value="<?php echo $row1["cpf"];?>" />
                     </div>
                     <div class="form-group form-group-sm col-sm-2">
                        <label class="control-label">RG</label>
                        <input class="form-control" id="eRgVendedor" name="eRgVendedor" value="<?php echo $row1["rg"];?>" />
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-2">
                        <label class="control-label">CEP</label>
                        <input class="form-control" id="eCepVendedor" name="eCepVendedor" value="<?php echo $row1["cep"];?>" />
                     </div>
                     <div class="form-group form-group-sm col-sm-4">
                        <label class="control-label">Logradouro</label>
                        <input class="form-control" id="eEnderecoVendedor" name="eEnderecoVendedor" value="<?php echo $row1["endereco"];?>" />
                     </div>
                     <div class="form-group form-group-sm col-sm-2">
                        <label class="control-label">Número</label>
                        <input class="form-control" id="eNumeroVendedor" name="eNumeroVendedor" value="<?php echo $row1["numero"];?>" />
                     </div>
                     <div class="form-group form-group-sm col-sm-4">
                        <label class="control-label">Bairro</label>
                        <input class="form-control" id="eBairroVendedor" name="eBairroVendedor" value="<?php echo $row1["bairro"];?>" />
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-4">
                        <label class="control-label">Complemento</label>
                        <input class="form-control" id="eComplementoVendedor" name="eComplementoVendedor" value="<?php echo $row1["complemento"];?>" />
                     </div>
                     <div class="form-group form-group-sm col-sm-4">
                        <label class="control-label">Cidade</label>
                        <input class="form-control" id="eCidadeVendedor" name="eCidadeVendedor" value="<?php echo $row1["cidade"];?>" />
                     </div>
                     <div class="col-sm-4 form-group form-group-sm">
                        <label class="control-label">Aniversário</label>
                        <div class="input-group date form_datetime col-md-12" style="z-index:0;">
                           <input class="form-control" size="16" name="eDataAniversario" id="eDataAniversario" type="text" value="<?php echo formata_data_exibicao($row1["data_aniversario"]);?>"readonly>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></input>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4 form-group form-group-sm">
                        <label class="control-label">Data de Admissão</label>
                        <div class="input-group date form_datetime col-md-12" style="z-index:0;">
                           <input class="form-control" size="16" name="eDataAdmissao" id="eDataAdmissao" type="text" value="<?php echo formata_data_exibicao($row1["data_admissao"]);?>"readonly>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                     </div>
                     <div class="col-sm-4 form-group form-group-sm">
                        <label class="control-label">Data Demissão</label>
                        <div class="input-group date form_datetime col-md-12" style="z-index:0;">
                           <input class="form-control" size="16" name="eDataDemissao" id="eDataDemissao" type="text" value="<?php echo formata_data_exibicao($row1["data_demissao"]);?>"readonly>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                     </div>
                     <div class="col-sm-4 form-group form-group-sm">
                        <label class="control-label">Vendedor Está ativo?</label>
                        <select class="form-control" name="eIsvendedorAtivo" id="eIsvendedorAtivo" >
                           <option value="0" <?= ($row1["is_vendedor_ativo"]=='Sim') ? 'selected' : '' ?>>Sim</option>
                           <option value="1"<?=($row1["is_vendedor_ativo"]=='Não') ? 'selected' : '' ?>>Não</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-12">
                        <span id="eError1" name="eError1" style="color:firebrick"></span>
                        <span id="eSucesso1" name="eSucesso1" style="color:green"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer" style="background-color: #00091a; border-radius:0px 0px 5px 5px;">
               <button type="button" class="btn btn-success" onclick="GravarVendedor()">Gravar</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
         </div>
      </div>
      </div>
      </div>
      <div id="ModalExcluir" class="modal fade" role="dialog">
         <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header" style="background-color: #00091a; color:white; border-radius:5px 5px 0px 0px;">
                  <button type="button" class="close" onclick="TiraLoader()"data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Atenção</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="form-group form-group-sm col-sm-12">
                        <input name="IdExclude" id="IdExclude" style="display:none"/>
                        <h4>Deseja realmente excluir?</h4>
                     </div>
                  </div>
               </div>
               <div class="modal-footer" style="background-color: #00091a; border-radius:0px 0px 5px 5px;">
                  <button type="button" class="btn btn-success btn" onclick="ExcluirVendedor()">Excluir</button>
                  <button type="button" class="btn btn-danger" onclick="TiraLoader()" data-dismiss="modal">Cancelar</button>
               </div>
            </div>
         </div>
      </div>
      <footer class="container-fluid text-center" style="background-color:#091742 z-index:1; position: fixed;bottom: 0px!important;width: 100vw;">
         <div class="row">
            <div class="col-sm-6 text-left"><img src="./imagens/Logo-Polo-Login.png" style="height:3vh;margin:10px"/></div>
            <div class="col-sm-6 text-right"><a href="https://www.gvdsolucoes.com.br"><img src="./imagens/logo-branca.png" style="height:3vh;margin:10px"/></a></div>
         </div>
         </div>
      </footer>
   </body>
   <!-- </html> -->