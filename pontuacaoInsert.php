<?php
include_once("funcoes.php");
include_once("conexao.php");
date_default_timezone_set('america/sao_paulo');

try {
    if (isset($_POST["Id"])) {
        
        $Id = mysqli_real_escape_string($conn, $_POST["Id"]);
        $Nome = mysqli_real_escape_string($conn, $_POST["NomeParceiro"]);
        $Parceiro = mysqli_real_escape_string($conn, $_POST["Parceiro"]);
        $Empresa = mysqli_real_escape_string($conn, $_POST["Empresa"]);
        $Vendedor = mysqli_real_escape_string($conn, $_POST["Vendedor"]);
        $Obra = mysqli_real_escape_string($conn, $_POST["Obra"]);
        $Valor = mysqli_real_escape_string($conn, $_POST["Valor"]);
        // $Fase = mysqli_real_escape_string($conn, $_POST["Fase"]);
        $Polo = mysqli_real_escape_string($conn, $_POST["Polo"]);
        
        
        
        if ($Id == 0) {
            
            $stmt = $conn->prepare("INSERT INTO `pontuacoes` (id_parceiros,id_empresas,id_vendedores,id_obras,nome,valorcompra,pontuacoes,created,modified)  
                     VALUES (?,?,?,?,?,?,?,Now(),Now())");
            
            $stmt->bind_param('iiiisss', $Parceiro, $Empresa, $Vendedor, $Obra, $Nome, $Valor, $Polo);
            
            
            
            if (!$stmt->execute()) {
                echo '[' . $stmt->errno . "] " . $stmt->error;
            } else
                echo "Registro gravado com sucesso!";
            
            
        } else {
            
            $sql = "SELECT * FROM pontuacoes WHERE id_pontuacoes='" . $Id . "'";
            
            $stmt = $conn->prepare($sql); //
            $stmt->execute();
            $result = $stmt->get_result();
            $row    = $result->fetch_assoc();
            
            $stmt = $conn->prepare("UPDATE pontuacoes SET id_parceiros=?,id_empresas=?,id_vendedores=?,id_obras=?,nome=?,valorcompra=?,pontuacoes=?,modified=Now() WHERE id_pontuacoes=?");
            
            $stmt->bind_param('iiiisssi', $Parceiro, $Empresa, $Vendedor, $Obra, $Nome, $Valor, $Polo, $Id);
            
            
            if (!$stmt->execute()) {
                echo '[' . $stmt->errno . "] " . $stmt->error;
            } else
                echo "Registro gravado com sucesso!";
            
            
            
            
        }
    }
}
catch (Exception $e) {
    $erro = $e->getMessage();
    echo json_encode($erro);
}