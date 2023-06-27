<?php

session_start();

require_once 'Conexao.php';

class ajudante{
    
    private $idpes;
    private $cnpj;
    private $quantidade;

    public function cadastrarAjudante($dado){

        $this->idpes = $_SESSION['idpes'];
        $this->cnpj = $dado['cnpj_aju'];
        $this->quantidade = $dado['quantidade_aju'];

        $db = new database();

        $db->insertDB("INSERT INTO `ajudante` (id_pes,cnpj_aju,quantidade_aju) 
        VALUES ('$this->idpes','$this->cnpj','$this->quantidade');");

        header('Location: index.php');
        
    }

}

?>