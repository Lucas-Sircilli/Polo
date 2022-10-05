<?php
include_once("funcoes.php");
include_once("conexao.php");
date_default_timezone_set('america/sao_paulo');

try {
    if (isset($_POST["Id"])) {
        
        $Id = mysqli_real_escape_string($conn, $_POST["Id"]);
        $RG = mysqli_real_escape_string($conn, $_POST["RG"]);
        $CPF = mysqli_real_escape_string($conn, $_POST["CPF"]);
        $Nome = mysqli_real_escape_string($conn, $_POST["Nome"]);
        $TipoPessoa = mysqli_real_escape_string($conn, $_POST["TipoPessoa"]);
        $TipoProfissao = mysqli_real_escape_string($conn, $_POST["TipoProfissao"]);
        $CNPJ = mysqli_real_escape_string($conn, $_POST["CNPJ"]);
        $Permissao = mysqli_real_escape_string($conn, $_POST["Permissao"]);
        $RazaoSocial = mysqli_real_escape_string($conn, $_POST["RazaoSocial"]);
        $CEP = mysqli_real_escape_string($conn, $_POST["CEP"]);
        $Endereco = mysqli_real_escape_string($conn, $_POST["Endereco"]);
        $Numero = mysqli_real_escape_string($conn, $_POST["Numero"]);
        $Bairro = mysqli_real_escape_string($conn, $_POST["Bairro"]);
        $Cidade = mysqli_real_escape_string($conn, $_POST["Cidade"]);
        $Complemento = mysqli_real_escape_string($conn, $_POST["Complemento"]);
        $CEPEmpresa = mysqli_real_escape_string($conn, $_POST["CEPEmpresa"]);
        $EnderecoEmpresa = mysqli_real_escape_string($conn, $_POST["EnderecoEmpresa"]);
        $NumeroEmpresa = mysqli_real_escape_string($conn, $_POST["NumeroEmpresa"]);
        $BairroEmpresa = mysqli_real_escape_string($conn, $_POST["BairroEmpresa"]);
        $CidadeEmpresa = mysqli_real_escape_string($conn, $_POST["CidadeEmpresa"]);
        $ComplementoEmpresa = mysqli_real_escape_string($conn, $_POST["ComplementoEmpresa"]);
        $InscricaoMunicipal = mysqli_real_escape_string($conn, $_POST["InscricaoMunicipal"]);
        
        // $Usuario = mysqli_real_escape_string($conn, $_POST["CNPJ"]);
        $Senha = "1234";
        $dti = mysqli_real_escape_string($conn, $_POST["DataFundacao"]);
        $DataFundacao = formata_data_mysql($dti);
        $dti = mysqli_real_escape_string($conn, $_POST["DataAniversario"]);
        $DataAniversario = formata_data_mysql($dti);
        
        $NomeSocio1 = mysqli_real_escape_string($conn, $_POST["NomeSocio1"]);
        $PercentualSocio1 = mysqli_real_escape_string($conn, $_POST["PercentualSocio1"]);
        $Isadminsocio1 = mysqli_real_escape_string($conn, $_POST["Isadminsocio1"]);
        
        $NomeSocio2 = mysqli_real_escape_string($conn, $_POST["NomeSocio2"]);
        $PercentualSocio2 = mysqli_real_escape_string($conn, $_POST["PercentualSocio2"]);
        $Isadminsocio2 = mysqli_real_escape_string($conn, $_POST["Isadminsocio2"]);
        $NomeSocio3 = mysqli_real_escape_string($conn, $_POST["NomeSocio3"]);
        $PercentualSocio3 = mysqli_real_escape_string($conn, $_POST["PercentualSocio3"]);
        $Isadminsocio3 = mysqli_real_escape_string($conn, $_POST["Isadminsocio3"]);
        $NomeSocio4 = mysqli_real_escape_string($conn, $_POST["NomeSocio4"]);
        $PercentualSocio4 = mysqli_real_escape_string($conn, $_POST["PercentualSocio4"]);
        $Isadminsocio4 = mysqli_real_escape_string($conn, $_POST["Isadminsocio4"]);
        $NomeSocio5 = mysqli_real_escape_string($conn, $_POST["NomeSocio5"]);
        $PercentualSocio5 = mysqli_real_escape_string($conn, $_POST["PercentualSocio5"]);
        $Isadminsocio5 = mysqli_real_escape_string($conn, $_POST["Isadminsocio5"]);
        
        
        if ($Id == 0) {
            $sql  = "SELECT * FROM parceiros WHERE cpf='" . $CPF . "'";
            $stmt = $conn->prepare($sql); //
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "Já existe um parceiro cadastrado com este CPF";
                return;
            }
            
            $stmt = $conn->prepare("INSERT INTO `parceiros` (nome,cpf,rg,cep,endereco,numero,bairro,complemento,cidade,data_aniversario,id_tipo_parceiro,id_tipo_pessoa,razao_social,cnpj,cep_empresa,endereco_empresa,numero_empresa,bairro_empresa,complemento_empresa,cidade_empresa,inscricao_municipal,data_fundacao,nome_socio1,percentual_socio1, is_admin_socio1,nome_socio2,percentual_socio2, is_admin_socio2,nome_socio3,percentual_socio3, is_admin_socio3,nome_socio4,percentual_socio4, is_admin_socio4,nome_socio5,percentual_socio5, is_admin_socio5,data_alteracao,data_cadastro)  
                     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,Now(),Now())");
            
            $stmt->bind_param('sssssssssssssssssssssssssssssssssssss', $Nome, $CPF, $RG, $CEP, $Endereco, $Numero, $Bairro, $Complemento, $Cidade, $DataAniversario, $TipoProfissao, $TipoPessoa, $RazaoSocial, $CNPJ, $CEPEmpresa, $EnderecoEmpresa, $NumeroEmpresa, $BairroEmpresa, $ComplementoEmpresa, $CidadeEmpresa, $InscricaoMunicipal, $DataFundacao, $NomeSocio1, $PercentualSocio1, $Isadminsocio1, $NomeSocio2, $PercentualSocio2, $Isadminsocio2, $NomeSocio3, $PercentualSocio3, $Isadminsocio3, $NomeSocio4, $PercentualSocio4, $Isadminsocio4, $NomeSocio5, $PercentualSocio5, $Isadminsocio5 /*    ,$DataFundacao,
            $DataAlteracao,
            
            */ );
            
            
            
            if (!$stmt->execute()) {
                echo '[' . $stmt->errno . "] " . $stmt->error;
            } else {
                if ($CNPJ != "" || $CNPJ != null) {
                    $stmt = $conn->prepare("INSERT INTO `usuarios` (nome,email,senha,situacoe_id,niveis_acesso_id,created,modified)  
                         VALUES (?,?,?,1,?,Now(),Now())");
                    
                    $stmt->bind_param('sssi', $Nome, $CNPJ, $Senha, $Permissao);
                } else {
                    $stmt = $conn->prepare("INSERT INTO `usuarios` (nome,email,senha,situacoe_id,niveis_acesso_id,created,modified)  
                         VALUES (?,?,?,1,?,Now(),Now())");
                    
                    $stmt->bind_param('sssi', $Nome, $CPF, $Senha, $Permissao);
                }
                
                if (!$stmt->execute()) {
                    echo '[' . $stmt->errno . "] " . $stmt->error;
                } else
                    echo "Registro gravado com sucesso!";
            }
            
        } else {
            
            $sql = "SELECT * FROM parceiros WHERE id_parceiros='" . $Id . "'";
            
            $stmt = $conn->prepare($sql); //
            $stmt->execute();
            $result = $stmt->get_result();
            $row    = $result->fetch_assoc();
            
            if ($row["cpf"] != $CPF) {
                echo "Não é permitido alterar o CPF de um usuário existente";
                return;
            }
            
            if ($Senha == "" || $Senha == null) {
                $stmt = $conn->prepare("UPDATE parceiros SET nome=?,email=?,senha=senha WHERE id_parceiros=?");
                $stmt->bind_param('ssi', $Nome, $Email, $Id);
            } else {
                
                $stmt = $conn->prepare("UPDATE parceiros SET nome=?,cpf=?,rg=?,cep=?,endereco=?,numero=?,bairro=?,complemento=?,cidade=?,data_aniversario=?,id_tipo_parceiro=?,id_tipo_pessoa=?,razao_social=?,cnpj=?,cep_empresa=?,endereco_empresa=?,numero_empresa=?,bairro_empresa=?,complemento_empresa=?,cidade_empresa=?,inscricao_municipal=?,data_fundacao=?,nome_socio1=?,percentual_socio1=?, is_admin_socio1=?,nome_socio2=?,percentual_socio2=?, is_admin_socio2=?,nome_socio3=?,percentual_socio3=?, is_admin_socio3=?,nome_socio4=?,percentual_socio4=?, is_admin_socio4=?,nome_socio5=?,percentual_socio5=?, is_admin_socio5=?,data_alteracao=Now() WHERE id_parceiros=?");
                
                
                $stmt->bind_param('sssssssssssssssssssssssssssssssssssssi', $Nome, $CPF, $RG, $CEP, $Endereco, $Numero, $Bairro, $Complemento, $Cidade, $DataAniversario, $TipoProfissao, $TipoPessoa, $RazaoSocial, $CNPJ, $CEPEmpresa, $EnderecoEmpresa, $NumeroEmpresa, $BairroEmpresa, $ComplementoEmpresa, $CidadeEmpresa, $InscricaoMunicipal, $DataFundacao, $NomeSocio1, $PercentualSocio1, $Isadminsocio1, $NomeSocio2, $PercentualSocio2, $Isadminsocio2, $NomeSocio3, $PercentualSocio3, $Isadminsocio3, $NomeSocio4, $PercentualSocio4, $Isadminsocio4, $NomeSocio5, $PercentualSocio5, $Isadminsocio5, $Id);
            }
            
            if (!$stmt->execute()) {
                echo '[' . $stmt->errno . "] " . $stmt->error;
            } else {
                if ($CNPJ != "" || $CNPJ != null) {
                    $stmt = $conn->prepare("UPDATE usuarios SET nome=?,modified=Now() WHERE email=?");
                    
                    $stmt->bind_param('ss', $Nome, $CNPJ);
                } else {
                    $stmt = $conn->prepare("UPDATE usuarios SET nome=?,modified=Now() WHERE email=?");
                    
                    $stmt->bind_param('ss', $Nome, $CPF);
                    
                }
                if (!$stmt->execute()) {
                    echo '[' . $stmt->errno . "] " . $stmt->error;
                } else
                    echo "Registro gravado com sucesso!";
            }
            
            
            
        }
    }
}
catch (Exception $e) {
    $erro = $e->getMessage();
    echo json_encode($erro);
}