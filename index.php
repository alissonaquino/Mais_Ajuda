<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal/content/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<header>
        <img src="logo+ajuda-removebg-preview.png" alt="">
        <nav>
            <a href="#">Inicio</a>
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
    <main>
        <div class="conteudo">

        </div>
    </main>
    <aside>
        <div class="btn-exp"><i class="bi bi-arrow-left" style="font-size: 1.2em; color: #fff;"></i></div>
        <ul>
            <h2>Desemprego</h2>
            <li wm-nav="desemprego" wm-caminho="./arquivoshtml/desemprego.html">Desemprego</li>
            <li wm-nav="desemprego" wm-caminho="./arquivoshtml/desenvolvimentoHabilidades.html">Desenvolvimento de habilidades</li>
            <li wm-nav="desemprego" wm-caminho="./arquivoshtml/estrategias.html">Estratégias de busca de emprego</li>
            <li wm-nav="desemprego" wm-caminho="./arquivoshtml/saudeMental.html">Saúde mental e bem-estar durante o desemprego</li>
            <h2>Financeiro</h2>
            <li wm-nav="financeiro" wm-caminho="./arquivoshtml/empreendedorismo.html">Empreendedorismo</li>
            <li wm-nav="financeiro" wm-caminho="./arquivoshtml/investimentos.html">Investimentos</li>
            <li wm-nav="financeiro" wm-caminho="./arquivoshtml/gerenciamentoDividas.html">Gerenciamento de dívidas</li>
            <li wm-nav="financeiro" wm-caminho="./arquivoshtml/planejamentoFinanceiroPessoal.html">Planejamento financeiro pessoal</li>
            <h2>Ajuda</h2>
            <li wm-nav="ajuda" wm-caminho="./arquivoshtml/verVagas.php">Ver vagas</li>
            <li wm-nav="ajuda" wm-caminho="./arquivoshtml/anunciarVaga.html">Anuncio de vagas</li>
            <li wm-nav="ajuda" wm-caminho="./arquivoshtml/precisoDeAjuda.php">Preciso de ajuda</li>
            <li wm-nav="ajuda" wm-caminho="./arquivoshtml/queroAjudar.html">Quero ajudar</li>
        </ul>
    </aside>
    <script src="principal/content/script.js"></script>
</body>
</html>