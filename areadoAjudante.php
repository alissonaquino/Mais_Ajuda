<?php
session_start();

require_once 'PHP/vaga.php';

$vaga = new vaga();

if(isset($_POST['btAnunciar'])){
    $vaga->cadastrarVaga($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> + Ajuda | Área do ajudante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="areadoAjudante/content/areadoAjudadante.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
</head>
<body>
    <div class="modal-cadastro" >
        <div class="content-modal">
            <form id="form-cadastro" method="POST" action="">
                <button class="btn-fechar">
                    <i class="bi bi-x" style="color: #fff; font-size: 2em;"></i>
                </button>
                <label>Função:</label>
                <input type="text" name="funcao_vaga" id="funcao" class="input">
                <label>Tipo de contrato:</label>
                <select name="tipo_vaga" id="tipo" class="input">
                    <option value="Contrato de Aprendizagem">Contrato de Aprendizagem</option>
                    <option value="Contrato de Estágio">Contrato de Estágio</option>
                    <option value="Contrato Temporário">Contrato Temporário</option>
                    <option value="Contrato de Trabalho Intermitente">Contrato de Trabalho Intermitente</option>
                    <option value="Contrato de Trabalho Parcial">Contrato de Trabalho Parcial</option>
                    <option value="Contrato de Trabalho Remoto">Contrato de Trabalho Remoto</option>
                    <option value="Contrato de Trabalho Normal">Contrato de Trabalho Normal</option>
                </select>
                <label>Requisitos:</label>
                <textarea placeholder="Sobre mim, objetivos, metas, etc..." name="requisitos_vaga" class="input"></textarea>
                <label>Salário:</label>
                <input type="number" id="salario" name="salario_vaga" class="input">
                <label>Descrição:</label>
                <textarea placeholder="Descrição..." name="descricao_vaga" class="input"></textarea>
                <input type="submit" name="btAnunciar" value="Anunciar" form="form-cadastro">
            </form>
        </div>
    </div>

    <div class="msg-ajuda">
        <button><i class="bi bi-x" style="color: #fff;"></i></button>
        <div class="content-msg-ajuda" wm-msg-ajuda="1">
            <p>
                Seja bem-vindo(a) à nossa equipe de apoio!
                <br><br>
                Estamos muito felizes por você ter decidido se juntar a nós e contribuir com sua valiosa ajuda. Ao prosseguir, você terá acesso a uma lista de pessoas que estão enfrentando dificuldades e necessitam de suporte.
            </p>
            <div class="btns-prev-next">
                <button wm-next="msg-ajuda-2">Prosseguir</button>
            </div>
        </div>
        <div class="content-msg-ajuda" wm-msg-ajuda="2">
            <p>
                Sua disposição em estender a mão e oferecer auxílio é um gesto poderoso de empatia e solidariedade. Através do seu comprometimento, poderemos fazer a diferença na vida daqueles que mais precisam.
                <br>
                <br>
                Sabemos que cada história é única e cada pessoa enfrenta desafios particulares. Ao se envolver com essa lista, você terá a oportunidade de impactar positivamente vidas e oferecer esperança a quem se sente desamparado.
                <br>
                <br>
                Lembre-se de que seu tempo e esforço farão uma diferença significativa na vida daqueles que você ajudar. Sua dedicação é uma inspiração e sua generosidade irá iluminar caminhos antes obscuros.
                <br>
                Agradecemos desde já por sua disposição em colaborar e por tornar nosso trabalho ainda mais significativo. Juntos, poderemos construir um mundo melhor, onde o apoio mútuo é fundamental.
                <br>
                Seja bem-vindo(a) à equipe de ajuda, e juntos vamos impactar positivamente a vida daqueles que mais necessitam.
                <br><br>
                Com gratidão,
                Equipe de Apoio
            </p>
            <div class="btns-prev-next">
                <button wm-prev="msg-ajuda-2">Retornar</button>
                <button wm-next="msg-ajuda-3">Prosseguir</button>
            </div>
        </div> 

        <div class="content-msg-ajuda" wm-msg-ajuda="3">
            <h2>Pessoas que precisam de ajuda</h2>
            <p>Abaixo contém uma lista com nome e o telefone de pessoas em situações precárias</p>
            <div class="tabela-ajuda">
            <table class="table " style="background-color: #354F52">
                <thead>
                    <tr>
            
                    <th scope="col " style="color: white">Nome</th>
                    <th scope="col" style="color: white">Telefone</th>
                    <th scope="col" style="color: white">Contexto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        include_once 'PHP/Pessoa.php';

                        $pessoa = new pessoa();

                        $dados = $pessoa->listarAjudado();

                        foreach ($dados as $row) {
                            echo "<tr>
                            
                            <td style='color: white'>$row->nome_pes</td>
                            <td style='color: white'>$row->telefone_pes</td>
                            <td style='color: white'>$row->descricao_pes</td>
                            </tr>";
                        }
                    
                    ?>
                    <tr>
                    
                </tbody>
                </table>
            </div>
            <div class="btns-prev-next">
                <button wm-prev="msg-ajuda-3">Retornar</button>
            </div>
        </div> 
    </div>

    <!-- <div class="modal-candidatos">
        <button><i class="bi bi-x" style="color: #fff;"></i></button>
        <h2>Candidatos nesta vaga</h2>
        <div class="tabela-candidatos">
        <table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th scope="col ">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Currículo</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody> -->
    <?php
        // include_once 'PHP/Vaga.php';

        // $vaga = new vaga();

        // $dados = $vaga->listarCandidaturaCandidato();
        // $cont = 1;

        // foreach ($dados as $row) {
        //     echo "<tr>
        //     <th class='' scope='row'>$cont</th>
        //     <td>Alisson</td>
        //     <td><a href=''><button type='button' class='btn btn-primary btn-sm'>Visualizar</button></a></td>
        //     <td><a href=''><button type='button' class='btn btn-success btn-sm'>Aprovar</button></a> <a href=''><button type='button' class='btn btn-danger btn-sm'>Recusar</button></a></td>
        //   </tr>";
        //   $cont++;
        // }
    ?>
    <!-- <tr>
      <th class="" scope="row ">1</th>
      <td>Alisson</td>
      <td><a href=""><button type="button" class="btn btn-primary btn-sm">Visualizar</button></a></td>
      <td><a href=""><button type="button" class="btn btn-success btn-sm">Aprovar</button></a> <a href=""><button type="button" class="btn btn-danger btn-sm">Recusar</button></a></td>
    </tr>
    <tr>
      <th class="" scope="row ">1</th>
      <td>Alisson</td>
      <td><a href=""><button type="button" class="btn btn-primary btn-sm">Visualizar</button></a></td>
      <td><a href=""><button type="button" class="btn btn-success btn-sm">Aprovar</button></a> <a href=""><button type="button" class="btn btn-danger btn-sm">Recusar</button></a></td>
    </tr>
    <tr>
      <th class="" scope="row ">1</th>
      <td>Alisson</td>
      <td><a href=""><button type="button" class="btn btn-primary btn-sm">Visualizar</button></a></td>
      <td><a href=""><button type="button" class="btn btn-success btn-sm">Aprovar</button></a> <a href=""><button type="button" class="btn btn-danger btn-sm">Recusar</button></a></td>
    </tr>
  </tbody>
</table>
        </div>
    </div> -->

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

    <h1>Área do ajudante</h1>

    <main>
          
          <?php
                      
                      include_once 'PHP/Vaga.php';

                      $vaga = new vaga();

                      $dados = $vaga->listarVaga($_SESSION['idpes']);
                  
                      foreach ($dados as $row) {
                        $data = date('d/m/Y', strtotime($row->data_vaga));
                        $id = $row->id_vaga;
                           echo" <div class='card' wm-id-vaga='$row->id_vaga'>
                           <div class='card-details'>
                             <p class='text-title'>$data | $row->funcao_vaga  </p>
                             <p class='text-body'>Tipo: $row->tipo_vaga  </p> 
                             <p class='text-body'>Salário: R$ $row->salario_vaga | $row->requisitos_vaga  </p> 
                             
                             <p class='text-body'>$row->descricao_vaga </p>                    
                    </div>
                    <button class='card-button'  data-toggle='modal' data-target='#exampleModal$id'>Candidatos nesta vaga</button>
                  </div>

                  
                  <div class='modal fade '  id='exampleModal$id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Candidatos nesta vaga</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body '>
                    
                        <div class='tabela-candidatos'>
                        <table class='table table-light'>
                    <thead class='thead-light'>
                    <tr>
                        <th scope='col '>#</th>
                        <th scope='col'>Currículo</th>
                        <th scope='col'>Ações</th>
                    </tr>
                    </thead>
                    <tbody>";

                    $dadosCan = $vaga->listarCandidaturaVaga($id);
        $cont = 1;

        foreach ($dadosCan as $rowCan) {
            $dadosPes = $vaga->listarCandidaturaCandidato2($rowCan->id_pes);
            foreach ($dadosPes as $rowPes) {
                $nome = $rowPes->nome_pes;
            }

            echo "<tr>
            <th class='' scope='row'><a href='PHP/reportarCandidatura.php?id=$rowCan->id_can'> <i style='color:red' class='bi bi-flag-fill danger'></i></a></th>
            <td><a href='curriculos/$rowCan->curriculo_can' target='_blank'><button type='button' class='btn btn-primary btn-sm'>Visualizar</button></a></td>
            <td><a href='PHP/aceitar.php?id=$rowCan->id_can'><button type='submit' class='btn btn-success btn-sm'>Aprovar</button></a><a href='PHP/recusar.php?id=$rowCan->id_can'> <button type='submit' class='btn btn-danger btn-sm'>Recusar</button></a></td>
          </tr>";
          $cont++;
        }
            echo"
                    </tbody>
                    </table>
                           
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                   
                            </div>
                            </div>
                            </div>
    
                        ";
                        }
                        

                      ?> 

                      
    </main>

    <div class="btn-extra" id="btnExtra">
        <i id="btnExtraExp" class="bi bi-plus" ></i>
        <div>
            <p>
                Anuncie uma vaga em nosso portal, assim você pode ajudar pessoas em forma de emprego.
            </p>
            <button btn-anuncie>Anuncie</button>
        </div>
        <div>
            <p>
                Ajude pessoas que estão em situações criticas, clique e saiba mais...
            </p>
            <button btn-ajude>Ajude</button>
        </div>
    </div>

    
       
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="areadoAjudante/content/areadoAjudante.js"></script>

</body>
</html>