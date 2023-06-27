<?php

require_once 'Pessoa.php';

$pessoa = new pessoa();

if(isset($_POST['btEnviar'])){
    $pessoa->editar($_POST);
}

require_once 'Pessoa.php';

    $pessoa = new pessoa();

    $dadosA = $pessoa->listarPessoa();

    foreach ($dadosA as $row) {
    
        echo "

        
      <h1> Editar perfil </h1>
      <form action='' method='post'>
  
          <span>nome</span>
          <br>
          <input type='text' name='nome_pes' placeholder='nome' value='$row->nome_pes'>
          <br><br>
  
          <span>Email</span>
          <br>
          <input type='text' name='email_pes' placeholder='Email' value='$row->email_pes'>
          <br><br>
  
          <span>Senha</span>
          <br>
          <input type='text' name='senha_pes' placeholder='Senha' value='$row->senha_pes'>
          <br><br>
  
          <span>Descriçao</span>
          <br>
          <input type='text' name='descricao_pes' placeholder='Descrição' value='$row->descricao_pes'>
          <br><br>
  
          <span>Telefone</span>
          <br>
          <input type='text' name='telefone_pes' placeholder='Telefone' value='$row->telefone_pes'>
          <br><br>
  
          <span>Sexo</span>
          <br>
          <input type='text' name='sexo_pes' placeholder='Sexo' value='$row->sexo_pes'>
          <br><br>
  
          <span>endereço</span>
          <br>
          <input type='text' name='endereco_pes' placeholder='Endereço' value='$row->endereco_pes'>
          <br><br>
  
          <span>situação</span>
          <br>
          <select name='situacao_pes'>
          <option value='valor1' >Escolha uma opção:</option>
          <option value='c' selected>Candidato</option>
          <option value='a'>Quero ajudar</option>
          </select>
          <br><br>
          <input type='submit' name='btEnviar' value='Enviar'>
  
      </form>
         ";
      
    }


?>

