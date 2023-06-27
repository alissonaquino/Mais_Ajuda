<?php

require_once 'Conexao.php';

class pessoa{
    
    private $cpf;
    private $nacionalidade;
    private $nome;
    private $email;
    private $senha;
    private $descricao;
    private $telefone;
    private $sexo;
    private $endereco;
    private $situacao;

    public function cadastrarPessoa($dado){

        $this->cpf = $dado['cpf_pes'];
        $this->nacionalidade = $dado['nacionalidade_pes'];
        $this->nome = $dado['nome_pes'];
        $this->email = $dado['email_pes'];
        $this->senha = $dado['senha_pes'];
        $this->senha2 = $dado['senha2_pes'];
        $this->descricao = $dado['descricao_pes'];
        $this->telefone = $dado['telefone_pes'];
        $this->genero = $dado['genero_pes'];
        $this->endereco = $dado['endereco_pes'];
        $this->situacao = $dado['situacao_pes'];

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE email_pes = '$this->email'");

        if(empty($vetor)){
            if($this->senha == $this->senha2){
            $var = $db->insertDB("INSERT INTO `pessoa` (cpf_pes,nacionalidade_pes,nome_pes,email_pes,senha_pes,descricao_pes,telefone_pes,genero_pes,endereco_pes,situacao_pes) 
            VALUES ('$this->cpf','$this->nacionalidade','$this->nome','$this->email','$this->senha','$this->descricao','$this->telefone','$this->genero','$this->endereco','$this->situacao');");
            
            $_SESSION['idpes'] = $var;
            $_SESSION['situacao'] = $this->situacao;

            if($this->situacao == "A"){
                header('Location: areadoajudante.php');
            }else{
                header('Location: areadocandidato.php');
            }

            }else{
                $_SESSION['erroLogin'] = "Senhas não correspondem";
            }
        }else{
            $_SESSION['erroLogin'] = "Email já utilizado";
        }

        

        // if($this->situacao == 'a'){
        //     header('Location: cadastrarAjudante.php');
        // }elseif($this->situacao == 'c'){
        //     header('Location: cadastrarReceptor.php');
        // }

        

    }

    public function login($dado){

        $email = $dado['email_pes'];
        $senha = $dado['senha_pes'];
        
        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE email_pes = '$email' && senha_pes = '$senha'");

        if(empty($vetor)){
            $_SESSION['erroLogin'] = "Não foi encontrado nenhum usuário";
        }elseif(isset($vetor)){

            foreach ($vetor as $row) {
                $id = $row->id_pes;
                $situacao = $row->situacao_pes;
            }

            $_SESSION['email'] = $email;
            $_SESSION['idpes'] = $id;
            $_SESSION['situacao'] = $situacao;

            if($situacao == "A"){
                header('Location: areadoajudante.php');
            }elseif($situacao == "C"){
                header('Location: areadocandidato.php');
            }elseif($situacao == "ADM"){
                header('Location: gerenciamento.php');
            }elseif($situacao == ""){
                $_SESSION['erroLogin'] = "Login Não permitido"; 
            }


            //echo $_SESSION['idpes'];
            //echo "Logado com sucesso";

        }else{
            $_SESSION['erroLogin'] = "Erro desconhecido"; 
        }

    }

    public function editar($dado){

        $id = $_SESSION['idpes'];
        $nome = $dado['nome_pes'];
        $email = $dado['email_pes'];
        $senha = $dado['senha_pes'];
        $descricao = $dado['descricao_pes'];
        $telefone = $dado['telefone_pes'];
        $sexo = $dado['sexo_pes'];
        $endereco = $dado['endereco_pes'];
        $situacao = $dado['situacao_pes'];

        $db = new database();

        $db->updateDB("UPDATE pessoa SET nome_pes = '$nome', email_pes = '$email', senha_pes = '$senha', descricao_pes = '$descricao', telefone_pes = '$telefone',
        sexo_pes = '$sexo', endereco_pes = '$endereco', situacao_pes = '$situacao' WHERE id_pes = '$id' ");

        //header("Location: index.php");

    }

    public function excluirAjudado(){

        $id = $_GET['id'];

        $db = new database();

        $db->updateDB("UPDATE pessoa SET situacao_pes = '' WHERE id_pes = '$id' ");

        header("Location: ../gerenciamento.php");

    }

    public function listarPessoa(){

        $id = $_SESSION['idpes'];

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE id_pes = '$id'");

        return $vetor;
    }

    public function cadastrarAjudado($dados){

        $db = new database();

        $nome = $dados['nome_pes'];
        $telefone = $dados['telefone_pes'];
        $descricao = $dados['descricao_pes'];

        $var = $db->insertDB("INSERT INTO `pessoa` (nome_pes,descricao_pes,telefone_pes,situacao_pes) 
            VALUES ('$nome','$descricao','$telefone','ajudado');");

        header("Location: ../index.php");
    }

    public function listarAjudado(){

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE situacao_pes = 'ajudado'");

        return $vetor;
    }

    public function listarAjudantes(){

        $db = new database();

        $vetor = $db->selectDB("SELECT * FROM pessoa WHERE situacao_pes = 'A'");

        return $vetor;
    }

    public function contarAjudantes(){

        $db = new database();

        $vetor = $db->selectDB("SELECT COUNT(`situacao_pes`) AS qtd_ajudantes FROM `pessoa` WHERE `situacao_pes` = 'A'");

        return $vetor;

    }

    public function contarAjudados(){

        $db = new database();

        $vetor = $db->selectDB("SELECT COUNT(`situacao_pes`) AS qtd_ajudados FROM `pessoa` WHERE `situacao_pes` = 'Ajudado'");

        return $vetor;

    }


}

?>