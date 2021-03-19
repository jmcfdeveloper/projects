<?php

$info=$_SESSION['rol2'];
$arrayInfo=$_SESSION['usuario'];

?>


<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
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
          <a href="#" class="center"><?php echo /*$info[1] */" "/*.$info[2]*/."Administrador";?></a>
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
          <img src="../imagenes/<?php echo $arrayInfo['foto'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $arrayInfo['username'];?></a>
        </div>
      </div>


      

     
      






        
       <!--  <div class="image">
          <img  class="brand-image img-circle elevation-3" src="../imagenes/<?php //echo $usuario['foto'];?>" alt="User Image"  width="100" height="100" >
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
              
               <li>
                <a href="Vistatrabajadores.php" class="nav-link active" style="background-color: #0069D9">
                  <i class="nav-icon fas fa-users" ></i>
                  <p>  Trabajadores
                    <i></i>
                  </p>
                
                </a>
                 
              </li>

             

              <li>
                <a href="" class="nav-link active"  style="background-color: #218838">
                  <i class="nav-icon fas fa-piggy-bank"></i>
                  <p>  Bancos
                    <i ></i>
                  </p>
                
                </a>
                 
              </li>

              <li>
                <a href="" class="nav-link active" style="background-color: #563D7C">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>  Identificaciones
                    <i ></i>
                  </p>
                
                </a>
                 
              </li>

              <li>
                <a href="" class="nav-link active" style="background-color: #17A2B8">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>  Tipos de cuenta
                    <i></i>
                  </p>
                
                </a>
                 
              </li>

              <li>
                <a href="" class="nav-link active" style="background-color:  #C82333">
                  <i class="nav-icon fas fa-credit-card"></i>
                  <p>  Tipos de pago
                    <i ></i>
                  </p>
                
                </a>
                 
              </li>


              <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-sign-out-alt mr-2"  data-toggle="modal" data-target="#modal-default"></i> Cerrar sesión 
           
            <span class="float-right text-muted text-sm"></span>
          </a>
          



              <!--    Desactivaré las otras opciones del sidebar por ahora
            
              
               <li>
                <a href="Vistapanel.php" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>  Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                
                </a>
                 
              </li>

            

              <li >
                <a href="Vistamascotas.php" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p > Mascotas</p>
                 
                </a>
                 
              </li>

              -->
  
        </ul>


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










      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>