<?php  

// grafico.php não é um arquivo necessário pode ser apagado ao final ao final do projeto, apenas para relembrar alguns conceitos

// Importa o arquivo conexão 
require_once 'Conexao.php';
require_once 'Pessoa.php';

//require_once 'Grafico.php';

//$Grafico = new Grafico();

// Instância o objeto do banco de dados 
$dados = new database();
$pessoa = new pessoa();

//$Grafico->setGrafico();

//$Grafico->buscaDado();

// Exemplo de select. vetor é uma variavel que receberá o resultado da query
$vetor = $dados->selectDB("SELECT * FROM `pessoa` ");


//Impressão da query

foreach ($vetor as $key => $row){
    echo $row->nome_pes . "<br>\n";
//  echo $row->ano_pob . "<br>\n";
//echo $row->resultado_pob . "<br>\n";
}

//$ola = $dados->insertDB("INSERT INTO `unemployment_analysis` (cod_des) VALUES ('TESTE');");


?>