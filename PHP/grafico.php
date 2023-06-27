<?php

require_once 'Conexao.php';

$dados = new database();

$dados->connect();

class Grafico{
    public $data;
    public $indice;
    public $resultado;

    function grafico(){
        $this->setGrafico();
    }

    function setGrafico(){
        $this->data = "2022";
        $this->indice = "pobreza";
        $this->resultado = "3,4";
    }

    function buscaDado(){
        
    }

}

?>