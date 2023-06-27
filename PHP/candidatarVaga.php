<?php

require_once 'Vaga.php';

$vaga = new vaga();

if(isset($_POST['btEnviar'])){
    $vaga->cadastrarVaga($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Vaga</h1>
    
    <form action="" method="post">

        <span>descricao</span>
        <br>
        <input type="text" name="descricao_vaga" placeholder="descricao">
        <br><br>

        <span>salario</span>
        <br>
        <input type="number" name="salario_vaga" placeholder="Salario">
        <br><br>

        <span>função</span>
        <br>
        <input type="text" name="funcao_vaga" placeholder="Funcao">
        <br><br>

        <span>tipo de emprego</span>
        <br>
        <input type="text" name="tipo_vaga" placeholder="Tipo de emprego">
        <br><br>
        
        <span>requisitos</span>
        <br>
        <input type="text" name="requisitos_vaga" placeholder="Requisitos">
        <br><br>

        <input type="submit" name="btEnviar" value="Enviar">

    </form>

</body>
</html>