<?php

$info = $_SESSION['rol2'];
$arrayInfo = $_SESSION['usuario'];

?>


<aside class="main-sidebar sidebar-dark-info elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">IDS Tesorería</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
     
        <div class="row">
          <div class="col-3">
          </div>
          <div class="col-8">
          <a href="#" class="center"><?php echo /*$info[1] */ " "/*.$info[2]*/ . "Administrador"; ?></a>
          </div>
          <div class="col-1">
          </div>
       
        </div>
        
      
      </div>

        
      </div>  -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../imagenes/<?php echo $arrayInfo['foto']; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $arrayInfo['username']; ?></a>
          </div>
        </div>













        <!--  <div class="image">
          <img  class="brand-image img-circle elevation-3" src="../imagenes/<?php //echo $usuario['foto'];
                                                                            ?>" alt="User Image"  width="100" height="100" >
          <P></P>
        </div>-->


        <!-- Add icons to the links using the .nav-icon class

        fa-piggy-bank
        fa-cash-register
        fa-bitcoin
        fa-sign-out
        fa-address-card
        fa-id-card
        fa-id-card-alt
        fa-address-card
        fa-ticket-alt
        fa-cog
        fa-cogs
        fa-user-cog

               with font-awesome or any other icon font library -->





        <li class="nav-item has-treeview menu-open">

          <a href="Vistapanel.php" class="nav-link active" style="background-color: #0753ED">
            <i class="nav-icon fas fa-cogs"></i>
            <p style="color:#FFFFFF";>
              Panel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php" class="nav-link active" style="background-color: #1bbc9b">
                <i class="nav-icon fas fa-users"></i>
                <p style="color:#FFFFFF";>Trabajadores</p>
              </a>
            </li>

          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="Vistabancos" class="nav-link active" style="background-color: #09f9f9">
                <i class="nav-icon fas fa-piggy-bank"></i>
                <p style="color:#FFFFFF";>Bancos</p>
              </a>
            </li>

          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="Vistaid.php" class="nav-link active" style="background-color: #FF8518">
                <i class="nav-icon fas fa-address-card"></i>
                <p style="color:#FFFFFF";>Identificaciones</p>
              </a>
            </li>

          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="Vistacuentas.php" class="nav-link active" style="background-color: #218838">
                <i class="nav-icon fas fa-users-cog"></i>
                <p style="color:#FFFFFF";>Tipos de cuentas</p>
              </a>
            </li>

          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="Vistapagos.php" class="nav-link active" style="background-color: #a509f9">
                <i class="nav-icon fas fa-credit-card"></i>
                <p style="color:#FFFFFF";>Tipos de pago</p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-item has-treeview menu-open">

          <a href="Vistapanel.php" class="nav-link active" style="background-color: #0753ED">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Accesibilidad
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="Vistausuarios.php" class="nav-link active" style="background-color: #1bbc9b">
                <i class="nav-icon fas fa-users"></i>
                <p style="color:#FFFFFF";>Usuarios</p> 
              </a>
            </li>

          </ul>
         
        </li>

      </ul>




    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

</aside>