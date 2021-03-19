<?php


if(!isset($_SESSION['rol'])){
  header('location:../');
}else{
  $info=$_SESSION['rol2'];
  $arrayInfo=$_SESSION['usuario'];
  if($_SESSION['rol'] != 2){  
      header('location: ../');
  }
}




?>
<?php
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | IDS-Tesorería</title>
  <!-- Tell the browser to be responsive to screen width -->


  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/main.css">
<!-- CSS para la tabla dinamica
  <link rel="stylesheet" type="text/css" href="css/estilo.css"> -->
<!-- Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>





  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>




<!-- /.deplegable otros elementos-->

<!-- /.desplegable -->








    <!-- SEARCH FORM -->
    
  
    

    <!-- Right navbar links  -->
    <ul class="navbar-nav ml-auto">


    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">

    <!--foto que despliega menú-->
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i >
          <div class="user-panel mt-6 pb-6 mb-6 d-flex">
        <div class="image">
        <img class="brand-image img-circle elevation-3" src="../imagenes/<?php echo $arrayInfo['foto'];?>" alt="User Image"  width="40px"  >
        </div>
       
      </div>
          </i>
          <span class="badge badge-danger navbar-badge">1</span>
        </a>
    <!-- foto que despliega menú -->

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header"><?php echo $arrayInfo['username']."- Tus Opciones"?></span>
          <div class="dropdown-divider"></div>
         
          <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-sign-out-alt mr-2"  data-toggle="modal" data-target="#modal-default"></i> Cerrar sesión 
           
            <span class="float-right text-muted text-sm"></span>
          </a>
          

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"   data-toggle="modal" data-target="#modal-default" ></i> configuración 
            <span class="float-right text-muted text-sm"> </span>
          </a>

        
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer"> <strong>IDS </strong>Teoreria</a>
        </div>
      </li>
   

       
    <!-- Aquí iría el usuario logueado jejeje   style="background-color: #FFFFFF;" -->
    
    </ul>
  </nav>

  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Deseas Cerrar sesión?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Si cierra sesión será redirigido a la pagina de login</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger" ><a href="modulos/cerrar.php"  style="color: #FFFFFF;">Cerrar sesión</a> </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


  <!-- /.navbar -->
