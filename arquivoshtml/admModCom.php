<?php

session_start();




// while($new = mysqli_fetch_assoc($dado))
// {
//   $foto_pet = $new['foto_pet'];

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
<link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">

</head>
<style>
 *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background: #45c4d0;
}
header{
    background: #36969f;
    height: 100px;
}

main{
    background-color: white;
    min-width: 300px;
    max-width: 1000px;
    margin: auto;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.306);
    padding: 20px;

}

.public{
    display: flex;
    height: 80px;
    align-items: center;
    justify-content: space-between;
    padding: 25px;
    width: 100%;
}
.modal-post{
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.modal-post button{
    width: 80%;
    height: 35px;
    text-transform: uppercase;
    background: #45c4d0;
    color: white;
    border: 1px solid rgb(181, 181, 181);
    border-radius: 15px;
    box-shadow: -2px 5px 15px rgba(0, 0, 0, 0.147);
    cursor: pointer;
}
.buscar{
    width: 50%;
}
.buscar input[type=text]{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    width: 80%;
    height: 35px;
    border-radius: 15px;
    text-align: center;
    border: 1.5px solid #45c4d0;
    box-shadow: 2px 5px 15px rgba(0, 0, 0, 0.147);
}
.forum-posts{
    width: 90%;
    overflow-y: scroll;
    height: 500px;
    margin: 20px auto;
    border: 2px solid #45c4d0;
    padding: 20px;
    border-radius: 10px 6px;
    box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.252);
    background: rgb(238, 237, 237);
    
}
.forum-posts p{
    text-align: center;
    font-size: 18px;
}
.dados-forum-post{
    text-align: center;
    margin-bottom: 8px;
}
.dados-forum-post p{
   padding: 3px;
}
.dados-forum-post img{
    width: 50px;
    height: 50px;
    border-radius: 25px;
    margin-right: 5px;
}
.interacoes{
    width: 70%;
    height: 40px;
    margin: 45px auto 0 auto;
    background-color: #45c4d0;
    border-radius: 15px;
    box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.139);
}
.interacoes ul{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
}
.interacoes ul li{
    width: 30%;
    list-style: none;
    text-align: center;
}
.interacoes ul li {
    height: 25px;
    margin-right: 10px;
}
.interacoes ul li img{
    height: 20px;
    color: white;
    cursor: pointer;
}
.modal-forum{
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    overflow-y: hidden;
}
.modal-forum-public{
    max-width: 670px;
    height: 600px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #fff;
    margin: auto;
    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.276);
    border-radius: 10px;
    transform: translateY(30%);
}
.modal-forum-public input{
    margin: 50px auto;
    width: 60%;
    height: 100px;
    border-radius: 8px;
    padding: 3px;
    border: 2px solid #2a737a;
    text-align: center;
    box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.146);
}
.modal-forum-public button{
    width: 40%;
    height: 30px;
    border-radius: 8px;
    background: #36969f;
    color: white;
    box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.146);
}
.fechar{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: red;
    color: white;
    top: 10px;
    width: 40px;
    height: 40px;
    transform: translate(820%,-420%);
    border-radius: 50%;
    cursor: pointer;
}
.box-comentarios{
    padding: 0 10px;
    height: 300px;
    overflow-y: scroll;
    display: none;
    
}
.publicar-comentario{
    width: 90%;
    margin: 0 auto 10px auto;
    background-color: #45c4d0;
    height: 100px;
    border-radius: 15px;
    box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.139);
    padding: 7px;
   
}
.fechar-comentario{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    background-color: #2a737a;
    cursor: pointer;
}
.publicar-comentario input[type="text"]{
    width: 100%;
    height: 40px;
    border-radius: 15px;
    border: none;
    background-color: rgb(255, 255, 255);
    padding: 4px;
    box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.139);
}
.publicar-comentario input[type="submit"]{
    width: 80%;
    display: block;
    margin: 0 auto;
    height: 40px;
    border-radius: 15px;
    border: none;
    margin-top: 5px;
    background: #fff;
    padding: 4px;
    color: #2a737a;
    box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.139);
    cursor: pointer;
}
.comentarios{
    width: 90%;
    height: 200px;
    position: relative;
    margin: 0 auto 10px auto;
    background-color: #45c4d0;
    border-radius: 15px;
    box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.139);
    padding: 10px 20px;
    border-bottom: 1px solid #fff;
    overflow-y: scroll;
    
}
.comentarios .dados-comentarios{
    display: flex;
}
.comentarios .dados-comentarios img{
    width: 30px;
    height: 30px;
    border-radius: 25px;
    margin-right: 5px;
    border: 1px solid #fff;
}
.comentarios .dados-comentarios h3{
    font-size: 18px;
    margin-top: 5px;
    margin-left: 5px;
    color: #fff;
    text-shadow: 3px 3px 2px rgba(0, 0, 0, 0.221);
}
.comentarios p{
    color: #fff;
    text-shadow: 3px 3px 2px rgba(0, 0, 0, 0.221);
}
@media screen and (max-width:768px){
    .forum-posts{width: 100%; display: inline-block; margin: 15px auto;}
    
} 
.botao{
    width: 100%;
    height: 35px;
    text-transform: uppercase;
    background: #45c4d0;
    color: white;
    border: 1px solid rgb(181, 181, 181);
    border-radius: 15px;
    box-shadow: -2px 5px 15px rgba(0, 0, 0, 0.147);
    cursor: pointer;
}
a {
  color: white;
  text-decoration: none;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Tela de Inicio -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">

  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="home.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="adm.php" class="brand-link">
      <span class="brand-text font-weight-light">+ Ajuda</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
        <a href="#" class="d-block">Administrador</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Pesquisar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Buscar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admBusQuizz.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quizz</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admBusUsu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuário</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Moderação
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admModQuizz.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quizz</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admModDis.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Discussões</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admModCom.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comentários</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
                <a href="admCadasAdm.php" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Cadastrar Adm</p>
                </a>
              </li>
          </li>
            </ul>
          </li>
            </ul>
          </li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="text-center">Vagas Denunciadas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="container">
        <table class="table">
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

include_once '../PHP/Moderacao.php';

$moderacao = new moderacao();

include_once '../PHP/Vaga.php';

$vaga = new vaga();

$dados = $moderacao->listarVagaDenunciada();

  foreach($dados as $row){

    $dadosVaga = $vaga->listarVagaCandidatura($row->id_vaga);

    foreach($dadosVaga as $rowVaga){
      $idpes = $rowVaga->id_pes;
    }

    $dadosPes = $vaga->listarAjudanteVaga($idpes);

    foreach($dadosPes as $rowPes){
      $nome = $rowPes->nome_pes;
    }

        echo "
        <tr>
        <th scope='row'>1</th>
        <td>$nome</td>
        <td><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#staticBackdrop'>
        visualizar
      </button></td>
        <td><button type='button' class='btn btn-success btn-sm'>Permitir</button>
        <button type='button' class='btn btn-danger btn-sm'>Banir</button></td>
        </tr>

        <div class='modal fade' id='staticBackdrop' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        ...
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary'>Understood</button>
      </div>
    </div>
  </div>
</div>


        ";
        
    } 

?>
          </tbody>
          </table>
          </div>
    </section>
    </div>
</div>


<!-- jQuery -->
<script src="AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
<script src="AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE-3.2.0/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>
</body>
</html>
