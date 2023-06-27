<?php

require_once 'Conexao.php';

class vaga{
    
    private $idpes;
    private $salario;
    private $funcao;
    private $tipo;
    private $requisitos;

    public function cadastrarVaga($dado){

        $this->idpes = $_SESSION['idpes'];
        $this->salario = $dado['salario_vaga'];
        $this->funcao = $dado['funcao_vaga'];
        $this->tipo = $dado['tipo_vaga'];
        $this->requisitos = $dado['requisitos_vaga'];
        $this->descricao = $dado['descricao_vaga'];


        $db = new database();

        $db->insertDB("INSERT INTO `vaga` (id_pes,salario_vaga,funcao_vaga,tipo_vaga,requisitos_vaga,descricao_vaga) 
        VALUES ('$this->idpes','$this->salario','$this->funcao','$this->tipo','$this->requisitos','$this->descricao');");

        header('Location: areadoajudante.php');
        
    }

    public function listarVaga($pessoa): array {

        $db = new database();

        if( (isset($pessoa)) && ($pessoa != "") ){
            $vetor = $db->selectDB("SELECT * FROM vaga WHERE id_pes = $pessoa ");
        }else{
            $vetor = $db->selectDB("SELECT * FROM vaga");
        }

        return $vetor;
        
    }

    public function candidatar($dado){
        $idvaga = $_POST['id_vaga'];
        $email = $_POST['email-candidatura'];

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE email_pes = '$email'");

        if(empty($vetor)){
            
        }else{
            foreach ($vetor as $row) {
                $id = $row->id_pes;
            }

            if(isset($_FILES['curriculo-candidatura'])){
                $extensao = strtolower(substr($_FILES['curriculo-candidatura']['name'], -4));
                if($extensao != ""){
                $novo_nome = md5(time()) . $extensao;
                }
                $diretorio = "../curriculos/" ;
                $file = $_FILES['curriculo-candidatura'];
                move_uploaded_file($_FILES['curriculo-candidatura']['tmp_name'], $diretorio.$novo_nome);
            
                
                $db->insertDB("INSERT INTO `candidatura` (id_vaga,id_pes,email_can,curriculo_can,status_can) 
                VALUES ('$idvaga','$id','$email','$novo_nome','1')");
                
            }
        }
        header('Location: ../index.php');
    }

    public function listarCandidaturaCandidato(){

        $db = new database();
        $id = $_SESSION['idpes'];

        $vetor = $db->selectDB("SELECT * FROM candidatura WHERE id_pes = '$id' ");

        return $vetor;

    }

    public function listarCandidaturaCandidato2($id){

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE id_pes = '$id' ");

        return $vetor;

    }

    public function listarVagaCandidatura($id){

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM vaga WHERE id_vaga = '$id'");

        return $vetor;

    }

    public function listarAjudanteVaga($id){
        
        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE id_pes = '$id'");

        return $vetor;

    }

    public function listarCandidaturaVaga($id){

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM candidatura WHERE id_vaga = '$id' && status_can = '1'");

        return $vetor;

    }

    public function aprovarCandidatura(){

        $id = $_GET['id'];

        $db = new database();

        $db->updateDB("UPDATE candidatura SET status_can = '2' WHERE id_can = '$id' ");

        header('Location: ../areadoAjudante.php');

    }

    public function recusarCandidatura(){

        $id = $_GET['id'];

        $db = new database();

        $db->updateDB("UPDATE candidatura SET status_can = '0' WHERE id_can = '$id' ");

        header('Location: ../areadoAjudante.php');

    }


}

?>