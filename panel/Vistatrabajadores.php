<?php include("modulos/trabajadores.php");?>
<?php include("templates_panel/cabecera.php"); ?>
<?php include("templates_panel/sidebar.php"); ?>

<?php  

$conexion = new PDO('mysql:host=localhost;dbname=registro', 'root', 'Acdc1004966557');



$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtIdentificacion=(isset($_POST['txtIdentificacion']))?$_POST['txtIdentificacion']:"";
$txtTipo_identificacion=(isset($_POST['txtTipo_identificacion']))?$_POST['txtTipo_identificacion']:"";
$txtDigito_v=(isset($_POST['txtDigito_v']))?$_POST['txtDigito_v']:"";
$txtPrimer_apellido=(isset($_POST['txtPrimer_apellido']))?$_POST['txtPrimer_apellido']:"";
$txtSegundo_apellido=(isset($_POST['txtSegundo_apellido']))?$_POST['txtSegundo_apellido']:"";
$txtPrimer_nombre=(isset($_POST['txtPrimer_nombre']))?$_POST['txtPrimer_nombre']:"";
$txtSegundo_nombre=(isset($_POST['txtSegundo_nombre']))?$_POST['txtSegundo_nombre']:"";
$txtForma_pago=(isset($_POST['txtForma_pago']))?$_POST['txtForma_pago']:"";
$txtBanco=(isset($_POST['txtBanco']))?$_POST['txtBanco']:"";
$txtTipo_cuenta=(isset($_POST['txtTipo_cuenta']))?$_POST['txtTipo_cuenta']:"";
$txtNo_cuenta=(isset($_POST['txtNo_cuenta']))?$_POST['txtNo_cuenta']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtComprobante=(isset($_POST['txtComprobante']))?$_POST['txtComprobante']:"";


$accion=(isset($_POST['accion']))?$_POST['accion']:"";



$accionAgregar="";
$accionModificar=$accionCancelar="disabled";
$mostrarModal=false;




switch($accion){
 
    case "btnAgregar":
    
     
    $statement = $conexion->prepare('INSERT INTO trabajadores (id , Identificacion, tipo_id, digito_v, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, forma_pago , banco , tipo_cuenta , no_cuenta , correo , comprobante) VALUES (null, :Identificacion,:tipo_id, :digito_v, :primer_apellido, :segundo_apellido, :primer_nombre, :segundo_nombre , :forma_pago , :banco , :tipo_cuenta , :no_cuenta , :correo , :comprobante)');
      
    /*$fecha=new DateTime();
    $nombreArchivo=($txtComprobante!="")?$fecha->getTimestamp()."_".$_FILES['txtfoto']["name"]:"imagen.jpg";
    $tmpFoto=$_FILES['txtfoto']["tmp_name"];
    if($tmpFoto!=""){move_uploaded_file($tmpFoto,"../imagenes/".$nombreArchivo);} */
    
    $statement->execute(array(
    ':Identificacion' => $txtIdentificacion,
    ':tipo_id' => $txtTipo_identificacion,
    ':digito_v' => $txtDigito_v,
    ':primer_apellido' => $txtPrimer_apellido, 
    ':segundo_apellido' => $txtSegundo_apellido, 
    ':primer_nombre' => $txtPrimer_nombre, 
    ':segundo_nombre' => $txtSegundo_nombre,
    ':forma_pago' => $txtForma_pago,
    ':banco' => $txtBanco, 
    ':tipo_cuenta'=>$txtTipo_cuenta, 
    ':no_cuenta'=>$txtNo_cuenta,
    ':correo'=>$txtCorreo,
    ':comprobante'=>$txtComprobante ));
    
      
    
     
    //header('Location: Vistapanel.php');
    
    break;
    
    case "btnModificar":
    
      
      $statement = $conexion->prepare('UPDATE usuarios SET
    
      id=:id,
      Nombre=:Nombre, 
      Apellido=:Apellido, 
      Correo=:Correo,
      usuario=:usuario, 
      clave=:clave,
      rol_id=:rol_id 
       WHERE
      id=:id ') ;
      $statement->execute(array(':id'=>$txtID,':Nombre' => $txtNombre,':Apellido' => $txtApellido,':Correo' => $txtCorreo,':usuario' => $txtusuario, ':clave' => $clave,':rol_id' => $txtrol_id));
    
    
    
    /** validación de la foto para editarla*/
    
      $fecha=new DateTime();
      $nombreArchivo=($txtfoto!="")?$fecha->getTimestamp()."_".$_FILES['txtfoto']["name"]:"imagen.jpg";
      $tmpFoto=$_FILES['txtfoto']["tmp_name"];
      if($tmpFoto!="")
      {
        move_uploaded_file($tmpFoto,"../imagenes/".$nombreArchivo);
      
        
    /**  otra validación de la foto para editarla y borrarla*/
    
    $statement =$conexion->prepare("SELECT foto FROM usuarios WHERE id=:id");
    $statement->execute(array(':id'=>$txtID));
    
    $usuario=$statement->fetch(PDO::FETCH_LAZY);
    
    
    if(isset($usuario["foto"])){
      if(file_exists("../imagenes/".$usuario["foto"])){
    
            if($usuario['foto']!="imagen.jpg"){
            unlink("../imagenes/".$usuario["foto"]);
          }
    
      }
    
    }
    
    /**  fin de otra validación de la foto para editarla y borrarla*/
    
      $statement = $conexion->prepare('UPDATE usuarios SET
      foto=:Foto
       WHERE
      id=:id ') ;
      $statement->execute(array(':id'=>$txtID,':Foto' => $nombreArchivo));
    
      }
    
    
    /**  fin de validación de la foto para editarla*/
    
      echo "presionaste btnModificar";
     
    
    break;
    
    
    case "btnCancelar":
      header('Location: Vistapanel.php');
      
     
    break;
    
    
    case "Seleccionar":
    
      echo " PRESIONASTE SELECCIONAR";
    
      $accionAgregar="disabled";
      $accionModificar=$accionCancelar="";
      $mostrarModal=true;
    
    
      $statement =$conexion->prepare("SELECT * FROM trabajadores WHERE id=:id");
      $statement->execute(array(':id'=>$txtID));
      $usuario=$statement->fetch(PDO::FETCH_LAZY);
    
      $txtNombre=$usuario['Nombre'];
      $txtApellido=$usuario['Apellido'];
      $txtCorreo=$usuario['Correo'];
      $txtusuario=$usuario['usuario'];
      $txtclave=$usuario['clave'];
      $txtrol_id=$usuario['rol_id'];
      $txtfoto=$usuario['foto'];
    
    
    
    
    
      
    
    break;
    
    
    
    
    }
    



?>



  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Listado de trabajadores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content"> 

    <div class="container">




    

    <!-- tabla de trabajadores-->
<div>

<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Trabajadores</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>

                    <!-- Identificación-TipoId-DigitoV-Apellidos y Nombres-Forma pago-Banco-Tipo Cuenta-No Cuenta	E-mail (Opcional)
 -->
                      <th>id</th>
                      <th>Identificación</th>
                      <th>TipoID</th>
                      <th>Digito V</th>
                      <th>Apellidos y Nombres</th>
                      <th>Forma Pago</th>
                      <th>Banco</th>
                      <th>Tipo Cuenta</th>
                      <th>No.Cuenta</th>
                      <th>Email</th>
                      
                   
                      
                      
                      <th>Comprobante</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($registro3 as $usuario){?>
                    <tr>
                      <td> <?php echo $usuario['id'];?></td>
                      <td> <?php echo $usuario['Identificacion'];?></td>
                      <td> <?php echo $usuario['tipo_id'];?></td>
                      <td> <?php echo $usuario['digito_v'];?></td>
                      <td><?php echo $usuario['primer_apellido'].' '; ?> <?php echo $usuario['segundo_apellido'].' '; ?><?php echo $usuario['primer_nombre'].' '; ?><?php echo $usuario['segundo_nombre'].' '; ?></td>
                      <td> <?php echo $usuario['forma_pago'];?></td>
                      <td> <?php echo $usuario['banco'];?></td>
                      <td> <?php echo $usuario['tipo_cuenta'];?></td>
                      <td> <?php echo $usuario['no_cuenta'];?></td>

                      <td><?php echo $usuario['correo']; ?></td>
                      <td><?php echo $usuario['comprobante']; ?></td>
                    <!--  <td><span class="badge bg-danger"><?php //echo $usuario['usuario']; ?></span></td> -->
                    
                      <?php  //$clave= hash('sha512', $usuario['clave']);?> 
                    
                     
                    <!--   <td><?php //if( $usuario['rol_id']=="1"){echo "Admin";} elseif( $usuario['rol_id']=="2"){ echo "usuario";} ?></td>         -->
                       <!--  <td> <img  class="img-thumbnail" width="100px"  height="100px" src="../imagenes/<?php echo $usuario['foto'];?>" /> </td> -->

                      <td>


                    <?php // $clave= hash('sha512', $usuario['clave']);?> 

                    
                      <form action="" method="post" >
                      <input type="hidden" name="txtID" value="<?php echo $usuario['id'];?>">
                    
                      <input class="btn btn-warning"   heref="#formSelected" type="submit" value="Seleccionar" name="accion">
                        
                
                    </form>
                      
                      </td>
                      
                      
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


</div>









<!-- formulario-->
  <form action="" method="post" enctype="multipart/form-data">

      
  <div class="form-group">
              <div class="row">
             
              <div class="col-10"> <input class="form-control" type="hidden" name="txtID" placeholder="" id="txtID"  value="<?php echo $txtID; ?>" require=""> </div> 
              </div>
              </div>

                  
              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Identificación:</label> </div>
              <div class="col-8"> <input class="form-control" type="text"  required name="txtIdentificacion" placeholder="" id="txtIdentificacion" value="<?php echo $txtIdentificacion; ?>" require="">  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Tipo de Identificación</label></div>
              <div class="col-8"> <select class="form-control"  name="txtTipo_identificacion"  id="txtTipo_identificacion" >
                              <?php include 'global/conexion_trabajadores_select.php';


                              $consulta = "SELECT * FROM identificacion ";
                              $ejecutar = mysqli_query($conexion, $consulta);
                              mysqli_close($conexion);
                              ?>
                              <?php foreach ($ejecutar as $opciones) : ?>
                                <option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo'] ?> </option>
                              <?php endforeach ?>
                            </select>


                          </div>
              
              
              
              </div>
              </div>

              
              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Digito V:</label> </div>
              <div class="col-8"> <input class="form-control" type="text"  required name="txtDigito_v" placeholder="" id="txtDigito_v" value="<?php echo $txtDigito_v; ?>" require="">  </div>
              </div>
              </div>



              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Primer Apellido:</label> </div>
              <div class="col-8"> <input class="form-control" type="text"  required name="txtPrimer_apellido" placeholder="" id="txtPrimer_apellido" value="<?php echo $txtPrimer_apellido; ?>" require="">  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Segundo Apellido:</label> </div>
              <div class="col-8"> <input class="form-control" type="text"  required name="txtSegundo_apellido" placeholder="" id="txtSegundo_apellido" value="<?php echo $txtSegundo_apellido; ?>" require="">  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Primer Nombre:</label> </div>
              <div class="col-8">  <input class="form-control"  type="text"   name="txtPrimer_nombre" placeholder="" id="txtPrimer_nombre"  required value="<?php echo $txtPrimer_nombre; ?>" require=""> </div>
              </div>
              </div>

              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Segundo Nombre:</label> </div>
              <div class="col-8">  <input class="form-control"  type="text"   name="txtSegundo_nombre" placeholder="" id="txtSegundo_nombre"  required value="<?php echo $txtSegundo_nombre; ?>" require=""> </div>
              </div>
              </div>


              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Forma de pago</label></div>
              <div class="col-8"> <select class="form-control"  name="txtForma_pago"  id="txtSegundo_nombre" >
                              <?php include 'global/conexion_trabajadores_select.php';


                              $consulta = "SELECT * FROM tipo_pago ";
                              $ejecutar = mysqli_query($conexion, $consulta);
                              mysqli_close($conexion);
                              ?>
                              <?php foreach ($ejecutar as $opciones) : ?>
                                <option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo_pago'] ?> </option>
                              <?php endforeach ?>
                            </select>


                          </div>
              
              
              
              </div>
              </div>


              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Banco</label></div>
              <div class="col-8"> <select class="form-control"  name="txtBanco"  id="txtBanco" >
                              <?php include 'global/conexion_trabajadores_select.php';


                              $consulta = "SELECT * FROM bancos ";
                              $ejecutar = mysqli_query($conexion, $consulta);
                              mysqli_close($conexion);
                              ?>
                              <?php foreach ($ejecutar as $opciones) : ?>
                                <option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['banco'] ?> </option>
                              <?php endforeach ?>
                            </select>


                          </div>
              
              
              
              </div>
              </div>


              <div class="form-group">
              <div class="row">
              <div class="col-4"> <label for="">Tipo de Cuenta</label></div>
              <div class="col-8"> <select class="form-control"  name="txtTipo_cuenta"  id="txtTipo_cuenta" >
                              <?php include 'global/conexion_trabajadores_select.php';


                              $consulta = "SELECT * FROM tipo_cuenta ";
                              $ejecutar = mysqli_query($conexion, $consulta);
                              mysqli_close($conexion);
                              ?>
                              <?php foreach ($ejecutar as $opciones) : ?>
                                <option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo_cuenta'] ?> </option>
                              <?php endforeach ?>
                            </select>


                          </div>
              
              
              
              </div>
              </div>



              <div class="form-group">
              <div class="row">
              <div class="col-4"><label for="">Numero de Cuenta:</label> </div>
              <div class="col-8"> <input class="form-control"  type="text" name="txtNo_cuenta" placeholder="" id="txtNo_cuenta" required value="<?php echo $txtNo_cuenta; ?>"  require=""> </div>
              </div>
              </div>



              <div class="form-group">
              <div class="row">
              <div class="col-4"><label for="">Comprobante:</label> </div>
              <div class="col-8"> <input class="form-control"  type="text" name="txtComprobante" placeholder="---" id="txtComprobante" required value="<?php echo $txtComprobante; ?>"  require=""> </div>
              </div>
              </div>




              <div  class="form-group">
               
                  <div class="col-sm-12">
                  <button value="btnCancelar" type="submit" <?php echo $accionCancelar?> class="btn btn-outline-danger btn-lg btn-block" name="accion">Cancelar</button>
                  </div>
                  <div class="col-sm-12">
                  <button value="btnModificar" type="submit" <?php echo $accionModificar?> class="btn btn-outline-primary btn-lg btn-block" name="accion">Editar</button> 
                  </div>
                  <div class="col-sm-12">
                  <button value="btnAgregar" type="submit" <?php echo $accionAgregar?>  class="btn btn-outline-success btn-lg btn-block" name="accion">Agregar</button> 
                  </div>
               
                 
                 
                 
              
                </div>             

             
           


  </form>






</div>






<!--   modal de practica --->

<div  class="modal fade example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007BFF">
        <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <h1>este es el cuerpo del modal</h1>
 
    </div>
  </div>
</div>
</div>

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Ejemplo de modal
</button>

<input class="btn btn-warning"   heref="#formSelected" type="submit" value="Seleccionar" name="accion">



















  
    </section>
    <!-- /.content -->
  </div>




  



  <!-- /.content-wrapper -->
 



  <?php include("templates_panel/piePagina.php");?>