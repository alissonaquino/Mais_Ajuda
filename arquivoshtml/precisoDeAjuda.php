<?php

session_start();

require_once '../PHP/pessoa.php';

$pessoa = new pessoa();

if(isset($_POST['btEnviar'])){
    $pessoa->cadastrarAjudado($_POST);
}
?>

<div class="modal-quero-ajuda">
    <h2>
        Central de ajuda
    </h2>
    <p>Bem vindo a nossa central de ajuda, aqui você pode fazer uma solicitação.</p>
    <form action="arquivoshtml/precisodeajuda.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome_pes" placeholder="Nome..." class="input">

        <label>Telefone:</label>
        <input type="text" name="telefone_pes" placeholder="Telefone..." class="input">

        <label>Conte para nós sua situação:</label>
        <textarea name="descricao_pes" placeholder="Contexto..." class="input"></textarea>

        <input type="submit" name="btEnviar" value="Solicitar">
    </form>
</div>