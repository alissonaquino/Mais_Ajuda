<?php
session_start();

require_once '../PHP/vaga.php';

$vaga = new vaga();

if(isset($_POST['btCandidatar'])){
    $vaga->candidatar($_POST);
}
?>


<!-- <h2>Ver vagas</h2>
<p>Aqui você pode verificar vagas disponiveis e carregar seu curriculo para que os anunciantes possam analisar</p> -->



<div class="modal-cadastro">
  <div class="modal-anuncio-vaga">
    <button>
      <i class="bi bi-x" style="color: #000;"></i>
    </button>
    <h3>Envie seu curriculo para esta vaga</h3>
    <p>Lembrando para que possamos te registrar nesta vaga você deve estar registrado no nosso sistema</p>
    <form action="arquivoshtml/verVagas.php" id="candidatura" method="post" enctype="multipart/form-data">
      <div id='invisivel'> </div>
      
      <label for="">Email:</label>
      <input type="email" class="input" id="email-candidatura" name="email-candidatura">
      <label >Curriculo:</label>
      <label for="curriculo-candidatura" id="arquivo"><i class="bi bi-folder-plus"></i> Carregar Curriculo</label>
      <input type="file" class="input" id="curriculo-candidatura" name="curriculo-candidatura">
  
      <input type="submit" name="btCandidatar" form="candidatura">
    </form>
  </div>
</div>

<div class="view-vagas">
        <div class="content-view-vagas" wm-position="1">
            <p>
                📢 Encontre o emprego dos seus sonhos! 🌟
                <br><br>
                Bem-vindo à nossa área exclusiva, onde as melhores oportunidades profissionais se encontram. Aqui, você poderá explorar uma ampla variedade de vagas de emprego disponíveis, em diferentes setores e níveis de experiência.
                <br><br>
                Deseja dar um passo à frente na sua carreira? Não perca mais tempo! Este é o lugar perfeito para você anunciar seu currículo e atrair a atenção das empresas que buscam talentos como você. Nossa plataforma conecta candidatos talentosos com recrutadores ávidos por encontrar profissionais qualificados.
            </p>
            <div class="btns-prev-next">
                <button wm-next="view-vagas-2">Prosseguir</button>
            </div>
        </div>
        <div class="content-view-vagas" wm-position="2">
            <p>
                Sabemos o quanto é importante encontrar um emprego que combine com suas habilidades e aspirações. Portanto, estamos comprometidos em fornecer um ambiente onde você possa se destacar e apresentar-se da melhor maneira possível. Deixe seu currículo brilhar e aproveite a oportunidade de impressionar os empregadores em potencial.
                <br><br>
                Não deixe suas ambições profissionais em espera! Explore nossas vagas de emprego e seja notado pelas empresas que buscam por alguém como você. Este é o seu momento de brilhar, então não perca essa chance única!
                <br><br>
                Prepare-se para alcançar novos horizontes profissionais. Junte-se a nós agora mesmo e coloque sua carreira no caminho do sucesso! 💼🚀
            </p>
            <div class="btns-prev-next">
                <button wm-prev="view-vagas-2">Retornar</button>
                <button wm-next="view-vagas-3">Prosseguir</button>
            </div>
        </div>
       
        <div class="content-view-vagas tabela-vagas" wm-position="3">
            <h2>Lista de vagas</h2>
            <div class="tabela-lista-vagas">
            <?php
                      
                      include_once '../PHP/Vaga.php';

                      $vaga = new vaga();

                      $dados = $vaga->listarVaga("");
                  
                      foreach ($dados as $row) {
                        $data = date('d/m/Y', strtotime($row->data_vaga));
                           echo" <div class='card' wm-id-vaga='$row->id_vaga'>
                    <div class='card-details'>
                      <p class='text-title'>$data | $row->funcao_vaga <a style='' href='PHP/reportarVaga.php?id=$row->id_vaga'> <i style='color:red' class='bi bi-flag-fill danger'></i></a> </p>
                      <p class='text-body'>Tipo: $row->tipo_vaga  </p> 
                      <p class='text-body'>Salário: R$ $row->salario_vaga | $row->requisitos_vaga  </p> 
                      
                      <p class='text-body'>$row->descricao_vaga </p>                   
                    </div>
                    <button class='card-button'>Me candidatar</button>
                  </div>";
                        }

                      ?> 
            </div>
            <div class="btns-prev-next">
                <button wm-prev="view-vagas-3">Retornar</button>
            </div>
        </div>
    </div>
