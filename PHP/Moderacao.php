<?php

require_once 'Conexao.php';

class moderacao{

    public function listarVagaDenunciada(){

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM moderacao WHERE desabilitar_mod = '0' ");

        return $vetor;

    } 

    public function listarCandidatura($id){

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM candidatura WHERE id_can = '$id'");

        return $vetor;

    }

    public function permitir(){
        
        $id = $_GET['id'];

        $db = new database();

        $vetor = $db->updateDB("UPDATE moderacao SET desabilitar_mod = '1' WHERE id_mod = '$id'");

        header('Location: ../gerenciamento.php');

    }

    public function banirCandidatura(){
       
        $id = $_GET['id'];

        $db = new database();

        $db->updateDB("UPDATE moderacao SET desabilitar_mod = '1' WHERE id_mod = '$id'");
        
        $vetor = $db->selectDB("SELECT * FROM moderacao WHERE id_mod = '$id' ");

        foreach($vetor as $row){
            $idCan = $row->id_can;
        }

        $vetor = $db->selectDB("SELECT * FROM candidatura WHERE id_can = '$idCan' ");

        foreach($vetor as $row){
            $idPes = $row->id_pes;
        }

        $db->updateDB("UPDATE candidatura SET status_can = '4' WHERE id_pes = '$idPes'");

        $db->updateDB("UPDATE pessoa SET situacao_pes = '' WHERE id_pes = '$idPes'");
        

        header('Location: ../gerenciamento.php');

    }

    public function banirVaga(){
       
        $id = $_GET['id'];

        $db = new database();

        $db->updateDB("UPDATE moderacao SET desabilitar_mod = '1' WHERE id_mod = '$id'");
        
        $vetor = $db->selectDB("SELECT * FROM moderacao WHERE id_mod = '$id' ");

        foreach($vetor as $row){
            $idVaga = $row->id_vaga;
        }

        $vetor = $db->selectDB("SELECT * FROM vaga WHERE id_vaga = '$idVaga' ");

        foreach($vetor as $row){
            $idPes = $row->id_pes;
        }

        $db->updateDB("UPDATE vaga SET desabilitar_vaga = '1' WHERE id_pes = '$idPes'");

        $db->updateDB("UPDATE pessoa SET situacao_pes = '' WHERE id_pes = '$idPes'");
        

        header('Location: ../gerenciamento.php');

    }

    public function reportarCandidatura(){
        
        $idCan = $_GET['id'];

        $db = new database();
        
        $var = $db->insertDB("INSERT INTO `moderacao` (id_can) 
            VALUES ('$idCan');");

        header('Location: ../areadoAjudante.php');

    }

    public function reportarVaga(){
        
        $idVaga = $_GET['id'];

        $db = new database();
        
        $var = $db->insertDB("INSERT INTO `moderacao` (id_vaga) 
            VALUES ('$idVaga');");

        header('Location: ../index.php');

    }


}

?>