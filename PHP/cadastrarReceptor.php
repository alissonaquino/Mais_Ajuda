<?php

require_once 'Receptor.php';

$receptor = new receptor();

if(isset($_POST['btEnviar'])){
    $receptor->cadastrarReceptor($_POST);
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

        <span>area</span>
        <br>
        <input type="text" name="area_rec" placeholder="area">
        <br><br>

        <input type="submit" name="btEnviar" value="Enviar">

    </form>

</body>
</html>