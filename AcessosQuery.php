<?php
include_once("funcoes.php");
include_once("conexao.php");

date_default_timezone_set('america/sao_paulo');

try {
    if (isset($_POST["DataInicial"])) {
        
        
        $Ordem       = mysqli_real_escape_string($conn, $_POST["Ordem"]);
        $nome        = mysqli_real_escape_string($conn, $_POST["Nome"]);
        $DataInicial = mysqli_real_escape_string($conn, $_POST["DataInicial"]);
        $DataFinal   = mysqli_real_escape_string($conn, $_POST["DataFinal"]);
        
        $dti = formata_data_mysql($DataInicial);
        $dtf = formata_data_mysql($DataFinal);
        
        $sql = "SELECT * FROM acessos WHERE ";
        if ($nome != "" && $nome != null)
            $sql = $sql . " (IpAcesso like '%" . $nome . "%' OR SalaAcesso like '%" . $nome . "%' OR EventoAcesso like '%" . $nome . "%') AND ";
        
        $sql = $sql . " DataInicio>='" . $dti . "' && DataInicio<='" . $dtf . "'";
        
        if ($Ordem == 1)
            $sql = $sql . " ORDER By DataInicio DESC ";
        
        $stmt = $conn->prepare($sql); //
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $delimiter = ";";
            $filename  = "members-data_" . date('Y-m-d') . ".csv";
            
            // Create a file pointer 
            $f = fopen('php://memory', 'w');
            
            // Set column headers 
            $fields = array(
                'Ip',
                'Sala',
                'Evento',
                'Data Inicio',
                'Data Fim'
            );
            fputcsv($f, $fields, $delimiter);
            
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                
                $lineData = array(
                    $row['IpAcesso'],
                    $row['SalaAcesso'],
                    $row['EventoAcesso'],
                    $row['DataInicio'],
                    $row['DataFim']
                );
                fputcsv($f, $lineData, $delimiter);
            }
            
            // Move back to beginning of file 
            fseek($f, 0);
            
            // Set headers to download file rather than displayed 
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            
            //output all remaining data on a file pointer 
            fpassthru($f);
        }
    } else
        echo "falhou";
}
catch (Exception $e) {
    $erro = $e->getMessage();
    echo json_encode($erro);
}

?>