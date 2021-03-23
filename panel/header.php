<?php
$info=$_SESSION['rol2'];
$arrayInfo=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>IDS | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">




  <script>
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
});

</script>




  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark-info navbar-dark">
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
        <img class="brand-image img-circle elevation-3" src="../imagenes/<?php echo $arrayInfo['foto']?>" alt="User Image"  width="30px"  height="30px">
        </div>
       
      </div>
          </i>
          <span class="badge badge-danger navbar-badge">1</span>
        </a>


        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Tus Opciones</span>
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

        
    <!-- foto que despliega menú -->

       
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