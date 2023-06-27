<?php

require_once 'Conexao.php';

class contato{

    private $nome;
    private $email;
    private $mensagem;

    public function enviarMensagem($dado){

        $db = new database();

        $this->nome = $dado['nome_con'];
        $this->email = $dado['email_con'];
        $this->mensagem = $dado['mensagem_con'];

        $var = $db->insertDB("INSERT INTO `contato` (nome_con,email_con,mensagem_con) 
            VALUES ('$this->nome','$this->email','$this->mensagem');");

    }

    public function listarMensagem(){
        
        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM contato ");

        return $vetor;

    }

}