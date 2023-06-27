<?php

session_start();

require_once 'PHP/pessoa.php';

$pessoa = new pessoa();

if(isset($_POST['btLogin'])){
    $pessoa->login($_POST);
}

if(isset($_POST['btCadastrar'])){
    $pessoa->cadastrarPessoa($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="principal/content/login.css">
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>
    <main>
        <section class="left-login">
            <div>
                <img src="imagens/logo-mais_ajuda-2-verde.png" alt="">
            </div>
        </section>
        <section class="right-login">
            <h2>Acessar</h2>
            <?php if(isset($_SESSION['erroLogin']) && $_SESSION['erroLogin'] != ""){
                echo "<h3 style='color: red'>".$_SESSION['erroLogin']."</h3>";
                $_SESSION['erroLogin'] = "";
            } 
            ?>
            
            <form action="" method="POST">
                <p>Mais Ajuda</p>
                <div class="inputbox">
                    <input required="required" type="text" name="email_pes">
                    <span>E-mail</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input required="required" type="password" name="senha_pes">
                    <span>Senha</span>
                    <i></i>
                </div>
                <input type="submit" name="btLogin" value="Login">
                <a href="#" wm-cadastrar>Cadastre-se</a>
            </form>
        </section>
    </main>
    <div class="modal-cadastro" >
        <div class="content-modal">
            <form id="form-cadastro" action="" method="POST">
                <button class="btn-fechar">
                    <i class="bi bi-x" style="color: #fff; font-size: 2em;"></i>
                </button>
                <label>Nome:</label>
                <input type="text" id="nome" name="nome_pes" class="input">
                <label>CPF:</label>
                <input type="number" id="cpf" name="cpf_pes" class="input">
                <label>Genêro:</label>
                <select id="genero" name="genero_pes" class="input">
                    <option value="F">Feminino</option>
                    <option value="M">Masculino</option>
                    <option value="I">Indiferente</option>
                </select>
                <div>
                    <div>
                        <label>Nacionalidade:</label>
                        <input type="text" id="nacionalidade" name="nacionalidade_pes" class="input">
                    </div>
                    <div>
                        <label>Endereço:</label>
                        <input type="text" id="endereco" name="endereco_pes" class="input">
                    </div>
                </div>
                <div>
                </div>

                <label>Telefone:</label>
                <input type="text" id="telefone" name="telefone_pes" class="input">
                <label>Sobre:</label>
                <textarea placeholder="Sobre mim, objetivos, metas, etc..." name="descricao_pes" class="input"></textarea>
                <label>E-mail:</label>
                <input type="email" id="email" name="email_pes" class="input">
                <label>Senha:</label>
                <input type="password" id="senha" name="senha_pes" class="input">
                <label>Confirme sua Senha:</label>
                <input type="password" id="confirm-senha" name="senha2_pes" class="input">
                <label>Situação:</label>
                <select id="situacao" name="situacao_pes" class="input">
                    <option value="C">Candidato</option>
                    <option value="A">Ajudante</option>
                </select>
                <input type="submit" name="btCadastrar" value="Cadastrar" form="form-cadastro">
            </form>
        </div>
    </div>
    <script src="principal/content/login.js"></script>
    <!-- <script>
        function enviarEmail() {

            // Recupera as informações do candidato do formulário HTML
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;

            // Configura as informações do servidor de e-mail
            const servidorSMTP = 'smtp.gmail.com';
            const portaSMTP = 465;
            const usuario = 'seu-email@gmail.com'; // Substitua pelo seu e-mail
            const senha = 'sua-senha'; // Substitua pela sua senha

            // Configura as informações do e-mail a ser enviado
            const remetente = usuario;
            const destinatario = email;
            const assunto = 'Sua candidatura foi recebida!';
            const corpo = `Olá ${nome}, sua mensagem foi recebida! Aqui está o texto que você escreveu: ${mensagem}`;

            // Configura o objeto de e-mail
            const emailConfig = {
                host: servidorSMTP,
                port: portaSMTP,
                secure: false,
                auth: {
                    user: usuario,
                    pass: senha
                }
            };

            // Cria o objeto de transporte de e-mail
            const transporter = nodemailer.createTransport(emailConfig);

            // Cria o objeto de e-mail
            const emailObj = {
                from: remetente,
                to: destinatario,
                subject: assunto,
                text: corpo
            };

            // Envia o e-mail
            transporter.sendMail(emailObj, (error, info) => {
                if (error) {
                    console.error(error);
                } else {
                    console.log(info);
                    alert('Mensagem enviada com sucesso!');
                }
            });
        }
    </script> -->
</body>

</html>