<?php
    session_start();
    require_once 'PHP/Conexao.php';
    require_once 'PHP/Pessoa.php';
    require_once 'PHP/Contato.php';
    include_once 'PHP/Moderacao.php';
    include_once 'PHP/Vaga.php';

    $vaga = new vaga();
    $moderacao = new moderacao();
    $pessoa = new pessoa();
    $contato = new contato();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento | + Ajuda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./gerenciamento/content/gerenciamento.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>
<body style="Overflow-y: scroll;">
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
    <h1>Área de gerenciamento</h1>
    <main>
        <section class="area-grafico" wm-classes>
            <h2>Estatísticas do mais ajuda</h2>
            <canvas class="meuGrafico" width="400" height="140"></canvas>
        </section>
        <section class="area-ajudados" wm-classes>
            <h2>Beneficiados</h2>
            <!-- Tabela dos ajudados -->
            <div class="div-tabela">
            <table class="table table-light table-striped container">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Contexto</th>
                    <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $cont = 1;
                        $dados = $pessoa->listarAjudado();
                        foreach($dados as $row){
                            echo " <tr>
                            <th scope='row'>$cont</th>
                            <td>$row->nome_pes</td>
                            <td>$row->telefone_pes</td>
                            <td>$row->descricao_pes</td>
                            <td><a href='PHP/excluirAjudado.php?id=$row->id_pes'><i class='bi bi-x-circle' style='color:red'></i></a></td>
                            </tr>";
                            $cont++;
                        }
                    ?>
                    
                </tbody>
                </table>
            </div>
        </section>
        <section class="area-ajudantes" wm-classes>
            <h2>Ajudantes</h2>
            <!-- Tabela dos ajudantes -->
            <div class="div-tabela">
            <table class="table table-light table-striped container">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nacionalidade</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $cont = 1;
                        $dadosAju = $pessoa->listarAjudantes();
                        foreach($dadosAju as $rowAju){
                            echo " <tr>
                            <th scope='row'>$cont</th>
                            <td>$rowAju->nome_pes</td>
                            <td>$rowAju->email_pes</td>
                            <td>$rowAju->nacionalidade_pes</td>
                            <td>$rowAju->telefone_pes</td>
                            <td><a href='PHP/excluirAjudado.php?id=$rowAju->id_pes'><i class='bi bi-x-circle' style='color:red'></i></a></td>
                            </tr>";
                            $cont++;
                        }
                    ?>
                    
                </tbody>
                </table>
            </div>
        </section>
        <section class="area-reports" wm-classes>
            <h2>Moderação</h2>
            <!-- Tabela dos reports -->
            <div class="div-tabela">
            <table class="table table-light table-striped container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuário</th>
      <th scope="col">Visualizar</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
            <?php




$dados = $moderacao->listarVagaDenunciada();

  foreach($dados as $row){

    if($row->id_vaga != 0){
    $dadosVaga = $vaga->listarVagaCandidatura($row->id_vaga);

    foreach($dadosVaga as $rowVaga){
      $idpes = $rowVaga->id_pes;
      $funcao = $rowVaga->funcao_vaga;
      $descricao = $rowVaga->descricao_vaga;
      $requisitos = $rowVaga->requisitos_vaga;
      $tipo = $rowVaga->tipo_vaga;
      $data = $rowVaga->data_vaga;
    }

    $dadosPes = $vaga->listarAjudanteVaga($idpes);

    foreach($dadosPes as $rowPes){
      $nome = $rowPes->nome_pes;
    }

        echo "
        <tr>
        <th scope='row'>1</th>
        <td>$nome</td>
        <td><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#staticBackdrop$row->id_mod'>
        visualizar
      </button></td>
        <td><a href='PHP/permitir.php?id=$row->id_mod'> <button type='button' class='btn btn-success btn-sm'>Permitir</button> </a>
        <a href='PHP/banirVaga.php?id=$row->id_mod'> <button type='button' class='btn btn-danger btn-sm'>Banir</button></td> </a></td>
        </tr>

        <div class='modal fade' id='staticBackdrop$row->id_mod' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='staticBackdropLabel'>Dados da Vaga</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
       Função = $funcao <br> <br> 
       Descricao = $descricao <br> <br> 
       Função = $funcao <br> <br> 
       Requisitos = $requisitos <br> <br> 
       Tipo = $tipo <br> <br> 
       Data = $data 
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
      </div>
    </div>
  </div>
</div>


        ";
}elseif($row->id_can != 0){
    $dadosCan = $moderacao->listarCandidatura($row->id_can);

    foreach($dadosCan as $rowCan){
        $idpes = $rowCan->id_pes;
        $curriculo = $rowCan->curriculo_can;
      }
    
      $dadosPes = $vaga->listarAjudanteVaga($idpes);

    foreach($dadosPes as $rowPes){
      $nome = $rowPes->nome_pes;
    }

        echo "
        <tr>
        <th scope='row'>1</th>
        <td>$nome</td>
        <td><a href='curriculos/$curriculo' target='_blank'><button type='button' class='btn btn-primary btn-sm'>Visualizar</button></a></td>
        <td><a href='PHP/permitir.php?id=$row->id_mod'> <button type='button' class='btn btn-success btn-sm'>Permitir</button> </a>
        <a href='PHP/banirCandidatura.php?id=$row->id_mod'> <button type='button' class='btn btn-danger btn-sm'>Banir</button></td> </a>
        </tr>



        ";
}
    

}
        
    
    ?>
    </tbody>
          </table>
          
            </div>
        </section>
        <section class="area-contate-nos" wm-classes >
            <h2>Mensagens Recebidas</h2>
            <div class="container-msgs" >
                <?php

                        $dadosCon = $contato->listarMensagem();
                        foreach($dadosCon as $rowCon){
                            echo " <div class='card' wm-id-vaga='1'>
                            <div class='card-details'>
                              <p class='text-body'>$rowCon->email_con</p>
                              <p class='text-body'>$rowCon->mensagem_con</p>
                            </div>
                            <button class='card-button'>$rowCon->nome_con</button>
                          </div>";
                           
                        }

                ?>
                
            </div>
        </section>


        <div class="btn-extra " id="btnExtra">
            <i id="btnExtraExp" class="bi bi-plus" ></i>
            <div>
                <h2>Filtros</h2>
                <button wm-button wm-tipe="area-grafico">
                    Gráfico
                </button>
                <button wm-button wm-tipe="area-ajudados">
                    Solicitações de ajuda
                </button>
                <button wm-button wm-tipe="area-ajudantes">
                    Ajudantes
                </button>
                <button wm-button wm-tipe="area-contate-nos">
                    Mensagens
                </button>
                <button wm-button wm-tipe="area-reports">
                    Moderação
                </button>
            </div>
        </div>

    </main>


    

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="gerenciamento/gerenciamento.js"></script>
    <script>

    <?php 

    include_once 'PHP/Pessoa.php';

    $pessoa = new pessoa();

    $vetor = $pessoa->contarAjudantes();
    
    foreach ($vetor as $row) {
    $qtdajudantes = $row->qtd_ajudantes; 
    }

    $vetor = $pessoa->contarAjudados();
    
    foreach ($vetor as $row) {
    $qtdajudados = $row->qtd_ajudados; 
    }
    ?>

    qtdAjudantes = <?php echo "$qtdajudantes";?>;
    qtdAjudados = <?php echo "$qtdajudados";?>;

        var ctx = document.getElementsByClassName('meuGrafico');
         
        var chartGrafh = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Parceiros','Beneficiado',],
                datasets: [{
                    label: 'My First Dataset',
                    data: [qtdAjudantes, qtdAjudados],
                    backgroundColor: [
                        '#82A0BC',
                        '#354F52',
                    ],
                    hoverOffset: 4
                    }]
            }
        })
        
    </script>
</body>
</html>