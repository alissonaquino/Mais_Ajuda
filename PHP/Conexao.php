<?php

class database{

    // Variaveis

    private static $dbtype   = "mysql";
    private static $host     = "localhost";
    private static $port     = "3306";
    private static $user     = "root";
    private static $password = "";
    private static $db       = "dadossociais";

    // Metodos que retornam as variaveis

    private function getDBType()  {return self::$dbtype;}
    private function getHost()    {return self::$host;}
    private function getPort()    {return self::$port;}
    private function getUser()    {return self::$user;}
    private function getPassword(){return self::$password;}
    private function getDB()      {return self::$db;}

    private function disconnect(){
        $this->conexao = null;
    }

    public function __destruct() {
            $this->disconnect();
            foreach ($this as $key => $value) {
            unset($this->$key);
            }
        }
        

    // Conexão com o banco de dados

public function connect(){
    try
    {
        $this->conexao = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());
    }
    catch (PDOException $i)
    {
        //se houver exceção, exibe
        die("Erro: <code>" . $i->getMessage() . "</code>");
    }
     
    return ($this->conexao);
}

    // Função de select para usar digite 

public function selectDB($sql,$params=null,$class=null){
    $query=$this->connect()->prepare($sql);
    $query->execute($params);
     
    if(isset($class)){
        //$rs = $query->fetchAll(PDO::FETCH_CLASS,$class) or die(print_r($query->errorInfo(), true));
        $rs = $query->fetchAll(PDO::FETCH_CLASS,$class);
    }else{
        //$rs = $query->fetchAll(PDO::FETCH_OBJ) or die(print_r($query->errorInfo(), true));
        $rs = $query->fetchAll(PDO::FETCH_OBJ);
    }
    self::__destruct();
    return $rs; // Retorna o os resultados
}

// Função de insert para usar digite 

public function insertDB($sql,$params=null){
    $conexao=$this->connect();
    $query=$conexao->prepare($sql);
    $query->execute($params);
    //$rs = $conexao->lastInsertId() or die(print_r($query->errorInfo(), true));
    $rs = $conexao->lastInsertId();
    self::__destruct();
    return $rs; // retorna o ultimo id inserido 
}

public function updateDB($sql,$params=null){
    $query=$this->connect()->prepare($sql);
    $query->execute($params);
    //$rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
    self::__destruct();
    //return $rs;
}

}


?>