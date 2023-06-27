<?php

require_once 'pessoa.php';

$pessoa = new pessoa();

if(isset($_POST['btEnviar'])){
    $pessoa->login($_POST);
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
    
    <form action="" method="post">

        <span>Email</span>
        <br>
        <input type="text" name="email_pes" placeholder="Email">
        <br><br>

        <span>Senha</span>
        <br>
        <input type="text" name="senha_pes" placeholder="Senha">
        <br><br>

        <input type="submit" name="btEnviar" value="Enviar">

    </form>

</body>
</html>