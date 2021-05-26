<?php include("modulos/panel.php"); ?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Panel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Panel</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->


    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>
            <?php echo $trabajadores['total']; ?>
            </h3>
            <p>
              Trabajadores
            </p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="index.php" class="small-box-footer">
            Ver <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
            <?php echo $bancos['total']; ?><sup style="font-size: 20px"></sup>
            </h3>
            <p>
              Bancos
            </p>
          </div>
          <div class="icon">
            <i class="fas fa-piggy-bank"></i>
          </div>
          <a href="Vistabancos.php" class="small-box-footer">
            Ver <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
      
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
            <?php echo $identificacion['total']; ?>
            </h3>
            <p>
              Identificaciones
            </p>
          </div>
          <div class="icon">
            <i class="fas fa-address-card"></i>
          </div>
          <a href="Vistaid.php" class="small-box-footer">
            Ver <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>
            <?php echo $Usuarios['total']; ?>
            </h3>
            <p>
              Usuarios
            </p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="Vistausuarios.php" class="small-box-footer">
            Ver <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
            <?php echo $Pagos['total']; ?><sup style="font-size: 20px"></sup>
            </h3>
            <p>
              Tipos de pago
            </p>
          </div>
          <div class="icon">
        <!--   <img  src="../imagenes/icon/credito.svg" width="87.5px" height="70px" > -->
           <i class="fas fa-credit-card"></i>

          </div>
          <a href="Vistapagos.php" class="small-box-footer">
            Ver <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
      
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
            <?php echo $Cuentas['total']; ?>
            </h3>
            <p>
              Tipos de cuenta
            </p>
          </div>
          <div class="icon">
            <i class="fas fa-users-cog"></i>
          </div>
          <a href="Vistacuentas.php" class="small-box-footer">
            Ver <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->








  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- /.col-md-6 -->

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include("footer.php"); ?>