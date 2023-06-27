<?php

    require_once 'Vaga.php';

    $vaga = new vaga();

    $dadosA = $vaga->listarVaga();

    foreach ($dadosA as $row) {
    
      echo
            $row->descricao_vaga  
            . $row->data_vaga  
            . $row->salario_vaga
            . $row->funcao_vaga 
            . $row->tipo_vaga 
            . $row->requisitos_vaga; 
         
    }
    
?>