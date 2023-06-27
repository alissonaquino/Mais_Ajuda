<?php
  session_start();

  require_once 'PHP/Contato.php';
  
  $contato = new contato();
  
  if(isset($_POST['btEnviar'])){
      $contato->enviarMensagem($_POST);
  }
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Contato/content/Contato.css">
    
    <title>CONTATE-NOS</title>
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

    <h1>Entre em Contato Conosco</h1>

    <div class="contato-div">
        <div class="mensagem-contato-div">
            <h2>Bem-vindo</h2>
            <p>Seja muito bem vindo a área de contato do nosso site! Sinta-se a vontade para nos contatar. Para isso, basta apenas clicar no botão abaixo:</p>
            <button class="btn-contato" id="btn-next">Começar</button>
        </div>
        <form action="" method="POST">
        <div class="conteudo-contato-div">
            <h2>Nome:</h2>
            <input type="text" name="nome_con" placeholder="Insira o nome" maxlength="60">
            <h2>E-mail:</h2>
            <input type="text" name="email_con" placeholder="Insira o e-mail" maxlength="60">
            <h2>Mensagem:</h2>
            <textarea name="mensagem_con" id="" cols="30" rows="10" placeholder="Insira a mensagem" maxlength="504"></textarea>
            <button name="btEnviar" type="submit">
                <div class="svg-wrapper-1">
                  <div class="svg-wrapper">
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg%22%3E">
                      <path d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                    </svg>
                  </div>
                </div>
                <span>Enviar</span>
              </button>
              </form>
        </div>  
    </div>

    <script type="text/javascript" src="Contato/content/Contato.js"></script>

</body>
</html>



