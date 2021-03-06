<?php

$info=$_SESSION['rol2'];

?>
<?php
$conexion = new PDO('mysql:host=localhost;dbname=mascotas', 'root', 'Acdc1004966557');


$statement =$conexion->prepare("SELECT foto FROM usuarios WHERE id=:id");
$statement->execute(array(':id'=>$info[0]));

$usuario=$statement->fetch(PDO::FETCH_LAZY);
//print_r($usuario);

if(isset($usuario["foto"])){
  if(file_exists("../imagenes/".$usuario["foto"])){

        $profileFoto=$usuario["foto"];
      }

  }





?>

<link rel="stylesheet" href="css/style.css">

<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
  
      <img src="../imagenes/icon/cat.svg" class="brand-image img-circle elevation-3"
           style="opacity: .8"  width="40px" height="40px">
      <span class="brand-text font-weight-light">Pets Life</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
       <div class="info" style="align-content: center" >
        <div class="col">
        
      <div class="col align-self-center" >
        <a href="#" class="d-block" ><?php echo $info[1]." ".$info[2];?></a>
        </div>  
      </div>
        </div>
     </div>
      <!-- Sidebar user panel (optional) -->
     
      

      <!-- Sidebar Menu --> 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
        
        <div class="image">
          <img class="img-thumbnail rounded mx-auto d-block" src="../imagenes/<?php echo $usuario['foto'];?>" alt="User Image"  width="150" height="150" >
        </div>

     

        


</br>
        
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <link rel="stylesheet" href="css/style.css">
               <li >
                <a href="Vistacolab.php" class="nav-link active" style="background-color: #17A2B8">
                  <i>  <img src="../imagenes/icon/home.svg" alt="insertar SVG con la etiqueta image" width="35px" height="35px">  </i>
                  <p>   Mi Inicio
                    <i class="right fas fa-angle-left"></i>
                  </p>
                
                </a>
                 
              </li>

              <li>
                <a href="Vistagaleria.php"  class="nav-link active"  aria-selected="true"  style="background-color: #218838">
                  <?php // include(''); ?>
                  <i> <img src="../imagenes/icon/galeria.svg" alt="insertar SVG con la etiqueta image" width="40px" height="40px"> </i>
                  <p>  Mi galeria
                    <i class="right fas fa-angle-left"></i>
                  </p>
                
                </a>
                 
              </li>

             





              
<!-- /.sidebar otros elementos-->
<li class="nav-item has-treeview" >
            <a href="#" class="nav-link active" style="background-color: #563D7C">
            <img src="../imagenes/icon/cat.svg" alt="insertar SVG con la etiqueta image" width="35px" height="35px">
              <p>
                Mis mascotas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Vistamismascotas.php" class="nav-link active" style="background-color: #0069D9">
                <img src="../imagenes/icon/cat-approve.svg" alt="insertar SVG con la etiqueta image" width="35px" height="35px">
                  <p>Ver mascotas</p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="Vistaregistrarmascota.php" class="nav-link active" class="nav-link active" style="background-color:  #17A2B8">
                <img src="../imagenes/icon/cat-add.svg" alt="insertar SVG con la etiqueta image" width="35px" height="35px">
                  <p>Registrar mascotas</p>
                </a>
              </li>
            
            </ul>
          </li>


<!-- /.sidebar -->

  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>