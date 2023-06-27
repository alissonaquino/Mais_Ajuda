<?php

require_once 'pessoa.php';

$pessoa = new pessoa();

if(isset($_POST['btEnviar'])){
    $pessoa->cadastrarPessoa($_POST);
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

        <span>cpf</span>
        <br>
        <input type="text" name="cpf_pes" placeholder="cpf">
        <br><br>

        <span>nacionalidade</span>
        <br>
        <input type="text" name="nacionalidade_pes" placeholder="nacionalidade">
        <br><br>

        <span>nome</span>
        <br>
        <input type="text" name="nome_pes" placeholder="nome">
        <br><br>

        <span>email</span>
        <br>
        <input type="text" name="email_pes" placeholder="email">
        <br><br>

        <span>senha</span>
        <br>
        <input type="text" name="senha_pes" placeholder="senha">
        <br><br>

        <span>descricao</span>
        <br>
        <input type="text" name="descricao_pes" placeholder="descricao">
        <br><br>

        <span>telefone</span>
        <br>
        <input type="text" name="telefone_pes" placeholder="telefone">
        <br><br>

        <span>gênero</span>
        <br>
        <input type="text" name="sexo_pes" placeholder="gênero">
        <br><br>

        <span>endereco</span>
        <br>
        <input type="text" name="endereco_pes" placeholder="endereco">
        <br><br>

        <span>situação</span>
        <br>
        <select name="situacao_pes">
        <option value="valor1" selected>Escolha uma opção:</option>
        <option value="c" >Candidato</option>
        <option value="a">Quero ajudar</option>
        </select>
        <br><br>

        <input type="submit" name="btEnviar" value="Enviar">

    </form>

</body>
</html>