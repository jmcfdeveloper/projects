<?php // include("modulos/panel.php"); ?>
<?php include("cabecera.php"); ?>
<?php include("sidebar.php"); ?>

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Tus mascotas</strong></h1>
        </div>
        <div class="col-sm-6">
          <a class="btn btn-outline-success btn-lg" href="Vistamismascotas.php" role="button">Ver mis mascotas </a>
          </div>
        <!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Colab v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



         
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

    <?php include('registrar_mascotas.php'); ?>

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
 


         <!-- Small boxes (End box) -->

        <!-- /.row -->


    <!--- inicio del formulario-->


    <!-- fin del formulario-->


             <!-- Horizontal Form -->
           
             <!--  Main row  -->


           



      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>





  <!-- /.content-wrapper -->
 



  <?php include("piePagina.php");?>