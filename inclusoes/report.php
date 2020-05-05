<?php

    require 'conn.php';
    $sql = "SELECT * FROM colaboradores";

    $result = $conn->query($sql);

    $delimiter = ",";
    $filename = "report_" . date("d/m/Y"). ".csv";
    $f = fopen("php://memory", "w");

    $fields = array('matricula', 'nome', 'cpf', 'programacao', 'inicio_periodo', 'fim_periodo', 'direito_ferias', 'inicio_ferias', 'fim_ferias', 'ferias', 'pagamento', 'retorno_ferias');
    fputcsv($f, $fields, $delimiter);

    while ($row = $result->fetch_assoc())
    {

        $lineData = array($row['matricula'], $row['nome'], $row['cpf'], $row['programacao'], $row['inicio_periodo'], $row['fim_periodo'], $row['direito_ferias'], $row['inicio_ferias'], $row['fim_ferias'], $row['ferias'], $row['pagamento'], $row['retorno_ferias']);
        fputcsv($f, $lineData, $delimiter);

    }

    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    fpassthru($f);

    exit();

?>