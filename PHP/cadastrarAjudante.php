<?php

require_once 'ajudante.php';

$ajudante = new ajudante();

if(isset($_POST['btEnviar'])){
    $ajudante->cadastrarAjudante($_POST);
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

    <h1>Ajudante</h1>
    
    <form action="" method="post">

        <span>cnpj</span>
        <br>
        <input type="text" name="cnpj_aju" placeholder="cnpj">
        <br><br>

        <span>quantidade</span>
        <br>
        <input type="text" name="quantidade_aju" placeholder="quantidade">
        <br><br>

        <input type="submit" name="btEnviar" value="Enviar">

    </form>

</body>
</html>