<?php
session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÁREA DO CANDIDATO</title>
    <link rel="stylesheet" href="areadoCandidato/content/areadoCandidato.css">
</head>

<body>

    <header>
        <nav>
        <a href="index.php">Inicio</a>
            <a href="Contato.php">Contate-nos</a>
            <?php
            if( (isset($_SESSION['idpes'])) && ($_SESSION['idpes'] != "") ){
                if($_SESSION['situacao'] == "A"){
                    echo "<a href='areadoajudante.php'>Minha Área</a>";
                }elseif($_SESSION['situacao'] == "C"){
                    echo "<a href='areadocandidato.php'>Minha Área</a>";
                }elseif($_SESSION['situacao'] == "ADM"){
                    echo "<a href='gerenciamento.php'>Minha Área</a>";
                }
                    echo "<a href='php/sair.php'>Sair</a>";
            }else{
                echo "<a href='login.php'>Login</a>";
            }
            ?>
        </nav>
    </header>

    <h1>Área do Candidato</h1>

    <section class="view-candidaturas">

        <?php
                      
                      include_once 'PHP/Vaga.php';

                      $vaga = new vaga();

                      $dados = $vaga->listarCandidaturaCandidato();
                  
                      foreach ($dados as $row) {
                        $dadosVaga = $vaga->listarVagaCandidatura($row->id_vaga);
                        
                        foreach($dadosVaga as $rowVaga){
                            $idpes = $rowVaga->id_pes;
                            $funcao = $rowVaga->funcao_vaga;
                            $descricao = $rowVaga->descricao_vaga;

                            $dadosPes = $vaga->listarAjudanteVaga($idpes);
                        }
                        
                        foreach($dadosPes as $rowPes){
                            $nome = $rowPes->nome_pes;
                        }

                           echo" <div class='card-candidatura'>
                           <label class='label-candidatura'>Nome:</label>
                           <p class='label-candidatura'>$nome</p>
                           <label class='label-candidatura'>Função: </label>
                           <p class='label-candidatura'>$funcao</p>
                           <label>Descrição:</label>
                           <p>$descricao</p>
                           <label >Status:</label>
                           <div class='status-card-candidatura'>";
                           if($row->status_can == 1){
                            echo "
                               <div class='status-candidatura' tipo-status='andamento'></div>
                               <span>Em andamento</span>";
                           }elseif($row->status_can == 0){
                            echo "
                                <div class='status-candidatura' tipo-status='recusado'></div>
                                <span>Recusado</span>";
                           }elseif($row->status_can == 2){
                            echo "
                                <div class='status-candidatura' tipo-status='aprovado'></div>
                                <span>Aprovado</span>";
                           }
                           echo"
                           </div>
                       </div>";
                        }

        ?> 

    </section>

</body>

</html>