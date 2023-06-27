<?php

session_start();

require_once 'Conexao.php';

class receptor{
    
    private $idpes;
    private $area;
    private $foto;
    private $objetivo;
    private $curriculo;

    public function cadastrarReceptor($dado){

        $this->idpes = $_SESSION['idpes'];
        $this->area = $dado['area_rec'];
        //$this->foto = $dado['foto_rec'];
       // $this->objetivo = $dado['objetivo_rec'];
       // $this->curriculo = $dado['curriculo_rec'];

        $db = new database();

        $db->insertDB("INSERT INTO `receptor` (id_pes,area_rec) 
        VALUES ('$this->idpes','$this->area');");

        header('Location: index.php');
        
    }

}

?>