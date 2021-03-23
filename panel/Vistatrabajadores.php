<?php include("modulos/trabajadores.php"); ?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

<?php


$conexion = new PDO('mysql:host=localhost;dbname=registro', 'root', 'Acdc1004966557');


$idSeleccionado = (isset($_POST['variable1'])) ? $_POST['variable1'] : "";

echo "idseleccionado=>" . $idSeleccionado;


$varTemp;


$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtIdentificacion = (isset($_POST['txtIdentificacion'])) ? $_POST['txtIdentificacion'] : "";
$txtTipo_identificacion = (isset($_POST['txtTipo_identificacion'])) ? $_POST['txtTipo_identificacion'] : "";
$txtDigito_v = (isset($_POST['txtDigito_v'])) ? $_POST['txtDigito_v'] : "";
$txtPrimer_apellido = (isset($_POST['txtPrimer_apellido'])) ? $_POST['txtPrimer_apellido'] : "";
$txtSegundo_apellido = (isset($_POST['txtSegundo_apellido'])) ? $_POST['txtSegundo_apellido'] : "";
$txtPrimer_nombre = (isset($_POST['txtPrimer_nombre'])) ? $_POST['txtPrimer_nombre'] : "";
$txtSegundo_nombre = (isset($_POST['txtSegundo_nombre'])) ? $_POST['txtSegundo_nombre'] : "";
$txtForma_pago = (isset($_POST['txtForma_pago'])) ? $_POST['txtForma_pago'] : "";
$txtBanco = (isset($_POST['txtBanco'])) ? $_POST['txtBanco'] : "";
$txtTipo_cuenta = (isset($_POST['txtTipo_cuenta'])) ? $_POST['txtTipo_cuenta'] : "";
$txtNo_cuenta = (isset($_POST['txtNo_cuenta'])) ? $_POST['txtNo_cuenta'] : "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";
$txtComprobante = (isset($_FILES['txtComprobante']["name"])) ? $_FILES['txtComprobante'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$modal = (isset($_POST['modal'])) ? $_POST['modal'] : "";



$accionAgregar = "";
$accionModificar = $accionCancelar = "disabled";
$mostrarModal = false;




switch ($accion) {

  case "btnAgregar":


    
    $fecha = new DateTime();
    $nombreArchivo = ($txtComprobante != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtComprobante"]["name"] : "default.pdf";

    $tmp_pdf = $_FILES['txtComprobante']['tmp_name'];

   

    if ($tmp_pdf != "") {
      move_uploaded_file($tmp_pdf, "../docs/" . $nombreArchivo);
    }else{

      $nombreArchivo="default.pdf";

    } 

    $statement = $conexion->prepare('INSERT INTO trabajadores (id , Identificacion, tipo_id, digito_v, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, forma_pago , banco , tipo_cuenta , no_cuenta , correo , comprobante) VALUES (null, :Identificacion,:tipo_id, :digito_v, :primer_apellido, :segundo_apellido, :primer_nombre, :segundo_nombre , :forma_pago , :banco , :tipo_cuenta , :no_cuenta , :correo , :comprobante)');
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
      ':tipo_cuenta' => $txtTipo_cuenta,
      ':no_cuenta' => $txtNo_cuenta,
      ':correo' => $txtCorreo,
      ':comprobante' => $nombreArchivo
    ));


    #$tipo = $_FILES['txtComprobante']['type'];
    #$size = $_FILES['txtComprobante']['size'];
    #$ruta = $_FILES['txtComprobante']['tmp_name'];


    $url = 'Vistatrabajadores.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;

  case "btnModificar":


    $statement = $conexion->prepare('UPDATE trabajadores SET
      id=:id,
      Identificacion=:Identificacion, 
      tipo_id=:tipo_id, 
      digito_v=:digito_v,
      primer_apellido=:primer_apellido, 
      segundo_apellido=:segundo_apellido,
      primer_nombre=:primer_nombre,
      segundo_nombre=:segundo_nombre,
      forma_pago=:forma_pago,
      banco=:banco,
      tipo_cuenta=:tipo_cuenta,
      no_cuenta=:no_cuenta,
      correo=:correo WHERE
      id=:id ');
    $statement->execute(array(':id' => $txtID, ':Identificacion' => $txtIdentificacion, ':tipo_id' => $txtTipo_identificacion, ':digito_v' => $txtDigito_v, ':primer_apellido' => $txtPrimer_apellido, ':segundo_apellido' => $txtSegundo_apellido, ':primer_nombre' => $txtPrimer_nombre, ':segundo_nombre' => $txtSegundo_nombre, ':forma_pago' => $txtForma_pago, ':banco' => $txtBanco, ':tipo_cuenta' => $txtTipo_cuenta, ':no_cuenta' => $txtNo_cuenta, ':correo' => $txtCorreo));

    /*

    $fecha = new DateTime();
    $nombreArchivo = ($txtComprobante != "")?$fecha->getTimestamp()."_". $_FILES["txtComprobante"]["name"]:"default.pdf";

    $tmp_pdf = $_FILES['txtComprobante']['tmp_name'];

    if ($tmp_pdf != "") {
      move_uploaded_file($tmp_pdf, "../docs/" . $nombreArchivo);
      $statement = $conexion->prepare('UPDATE trabajadores SET
      comprobante=:comprobante WHERE id=:id');
  
          $statement->execute(array(':comprobante' => $nombreArchivo, ':id' => $txtID));
        
    }


       */

    /**  fin de validación de la foto para editarla*/

    $url = 'Vistatrabajadores.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "btnCancelar":
    $url = 'Vistatrabajadores2.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "Seleccionar":

    //echo " PRESIONASTE SELECCIONAR";

    /*
    $accionAgregar = "disabled";
    $accionModificar = $accionCancelar = "";
    $mostrarModal = true;


    $statement = $conexion->prepare("SELECT * FROM trabajadores WHERE id=:id");
    $statement->execute(array(':id' => $txtID));
    $usuario = $statement->fetch(PDO::FETCH_LAZY);

    $txtNombre = $usuario['Nombre'];



    $txtIdentificacion = $usuario['Identificacion'];
    $txtTipo_identificacion = $usuario['tipo_id'];
    $txtDigito_v = $usuario['digito_v'];
    $txtPrimer_apellido = $usuario['primer_apellido'];
    $txtSegundo_apellido = $usuario['segundo_apellido'];
    $txtPrimer_nombre = $usuario['primer_nombre'];
    $txtSegundo_nombre = $usuario['segundo_nombre'];
    $txtForma_pago = $usuario['forma_pago'];
    $txtBanco = $usuario['banco'];
    $txtTipo_cuenta = $usuario['tipo_cuenta'];
    $txtNo_cuenta = $usuario['no_cuenta'];
    $txtCorreo = $usuario['correo'];
    $txtComprobante = $usuario['comprobante'];


  */

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





      <div class="row">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Agregar trabajador +
        </button>

      </div>

      <div class="row">

        <table>
          <thead>
            <tr>
              <th>Identificación</th>
              <th>TipoID</th>

              <th>Apellidos y Nombres</th>


              <th>Comprobante</th>
              <th>Acciones</th>

            </tr>



          </thead>

          <tbody>

            <?php foreach ($registro3 as $usuario) { ?>
              <tr>
                <!--<td> <?php //echo $usuario['id'];
                          ?></td> -->
                <td> <?php echo $usuario['Identificacion']; ?></td>
                <td> <?php echo $usuario['tipo_id']; ?></td>

                <td><?php echo $usuario['primer_apellido'] . ' '; ?> <?php echo $usuario['segundo_apellido'] . ' '; ?><?php echo $usuario['primer_nombre'] . ' '; ?><?php echo $usuario['segundo_nombre'] . ' '; ?></td>



                <td>




                  <div class="bs-example">
                    <!-- Button HTML (to Trigger Modal) -->

                    <div class="row">

                      <!--               <div class="col">
            
              <form action="" method="post">
              <input type="hidden" name="accion"  value="<?php echo $usuario['id']; ?>" />

              <a href="#myModal" class="btn btn-outline-warning btn-sm" data-toggle="modal" type="submit">
                <i class="nav-icon fas fa-eye"></i>
              </a>

              

              </form>

                <form action="" method="post">
                <input type="hidden" name="txtIdPrev" value="<?php echo $usuario['id']; ?>">
                <input class="btn btn-outline-danger btn-sm" heref="#myModal" data-toggle="modal" type="submit" value="previsualizar" name="modal">
                </form>


              

               
          </div> -->


                      <div class="col">
                        <a href="Vistacomprobante.php?id=<?php echo $usuario['id']; ?>" target="_blank">
                          <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal">
                            <i class="nav-icon fas fa-file"></i>
                          </button>
                        </a>
                      </div>

                    </div>





                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <?php



                            //print_r($txtID);
                            // $v1 = $_POST['txtID'];
                            $sentenciaSQL_comprobante = $pdo->prepare("SELECT * FROM `trabajadores` WHERE  id=" . $usuario['id']);
                            $sentenciaSQL_comprobante->execute();
                            $datos_prev = $sentenciaSQL_comprobante->fetchAll(PDO::FETCH_ASSOC);
                            // print_r($usuario['id']);
                            $idSeleccionado = (isset($_POST['variable1'])) ? $_POST['variable1'] : "";
                            echo "idSeleccionado =>" . $idSeleccionado;
                            print_r($idSeleccionado);

                            ?>
                            <h5 class="modal-title">Comprobante</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">


                            <div class="embed-responsive embed-responsive-21by9">

                              <?php

                              //print_r($txtID);
                              #$sentenciaSQL_comprobante = $pdo->prepare("SELECT * FROM `trabajadores` WHERE  id=" . $txtID);
                              #$sentenciaSQL_comprobante->execute();
                              #$comprobante = $sentenciaSQL_comprobante->fetchAll(PDO::FETCH_ASSOC);

                              ?>

                              <embed id="cartoonVideo" class="embed-responsive-item" width="900" height="315" src="../docs/<?php echo $usuario['comprobante']; ?>" allowfullscreen></embed>



                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                </td>


                <td>


                  <form action="" method="post">
                    <input type="hidden" name="txtID" value="<?php echo $usuario['id']; ?>">
                    <input class="btn btn-outline-danger btn-sm" type="hidden" value="Seleccionar" name="accion">
                  </form>

                 
                        <a href="Vistacomprobante.php?id=<?php echo $usuario['id']; ?>" target="_blank">
                          <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal">
                            <i class="nav-icon fas fa-pencil"></i>
                          </button>
                        </a>
                      

                </td>


              </tr>
            <?php } ?>
          </tbody>



        </table>


      </div>



      <br>












      <!-- formulario-->
      <form action="" method="post" enctype="multipart/form-data">





        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos para agregar un trabajador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">


                <div class="form-row">

                  <input class="form-control" type="hidden" name="txtID" placeholder="" id="txtID" value="<?php echo $txtID; ?>" require="">



                  <div class="form-group col-md-6">
                    <label for="">Identificación:</label>
                    <input class="form-control" type="number" required name="txtIdentificacion" placeholder="" id="txtIdentificacion" value="<?php echo $txtIdentificacion; ?>" require="">

                  </div>

                  <div class="form-group col-md-6">
                    <label for="">Tipo de Identificación</label>
                    <select class="form-control" name="txtTipo_identificacion" id="txtTipo_identificacion">
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






                  <label for="">Digito V:</label>
                  <input class="form-control" type="number" name="txtDigito_v" placeholder="" id="txtDigito_v" value="<?php echo $txtDigito_v; ?>">




                  <div class="form-group col-md-6">
                    <label for="">Primer Apellido:</label>
                    <input class="form-control" type="text" required name="txtPrimer_apellido" placeholder="" id="txtPrimer_apellido" value="<?php echo $txtPrimer_apellido; ?>" require="">

                  </div>

                  <div class="form-group col-md-6">
                    <label for="">Segundo Apellido:</label>
                    <input class="form-control" type="text" required name="txtSegundo_apellido" placeholder="" id="txtSegundo_apellido" value="<?php echo $txtSegundo_apellido; ?>" require="">

                  </div>

                  <div class="form-group col-md-6">
                    <label for="">Primer Nombre:</label>
                    <input class="form-control" type="text" name="txtPrimer_nombre" placeholder="" id="txtPrimer_nombre" required value="<?php echo $txtPrimer_nombre; ?>" require="">


                  </div>

                  <div class="form-group col-md-6">
                    <label for="">Segundo Nombre:</label>
                    <input class="form-control" type="text" name="txtSegundo_nombre" placeholder="" id="txtSegundo_nombre" value="<?php echo $txtSegundo_nombre; ?>">

                  </div>

                  <div class="form-group col-md-6">
                    <label for="">Forma de pago</label>
                    <select class="form-control" name="txtForma_pago" id="txtSegundo_nombre">
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

                  <div class="form-group col-md-6">
                    <label for="">Banco</label>
                    <select class="form-control" name="txtBanco" id="txtBanco">
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


                  <div class="form-group col-md-6">
                    <label for="">Tipo de Cuenta</label>
                    <select class="form-control" name="txtTipo_cuenta" id="txtTipo_cuenta">
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
                  <div class="form-group col-md-6">
                    <label for="">Numero de Cuenta:</label>
                    <input class="form-control" type="number" name="txtNo_cuenta" placeholder="" id="txtNo_cuenta" required value="<?php echo $txtNo_cuenta; ?>" require="">
                  </div>









                  <label for="">Correo:</label>
                  <input class="form-control" type="email" name="txtCorreo" placeholder="micorreo@gmail.com" id="txtCorreo" value="<?php echo $txtCorreo; ?>">

                  <label for="">Adjuntar comprobante:</label>
                  <input class="form-control" type="file" name="txtComprobante" placeholder="comprobante" id="txtComprobante" value="" required>





                </div>

                <div class="modal-footer">


                  <div class="row">

                    <div class="col-4"> <button value="btnCancelar" type="submit" <?php echo $accionCancelar ?> class="btn btn-outline-danger btn-sm" name="accion">Cancelar</button></div>
                    <div class="col-4"> <button value="btnModificar" type="submit" <?php echo $accionModificar ?> class="btn btn-outline-primary btn-sm" name="accion">Editar</button></div>
                    <div class="col-4"><button value="btnAgregar" type="submit" <?php echo $accionAgregar ?> class="btn btn-outline-success btn-sm" name="accion">Agregar</button></div>
                   

                    



                  </div>

                </div>
              </div>
            </div>
          </div>










          <!--  <div class="form-group">
          <div class="row">
            <div class="col-4"><label for="">Comprobante:</label> </div>

            <div class="col-8"> <input class="form-control" type="file" accept=".pdf" name="txtComprobante"  id="txtComprobante" value="<?php echo $txtComprobante; ?>"> </div>
          </div>
          <div class="row">
            <iframe src="../docs/<?php #echo $usuario['comprobante']; 
                                  ?>" frameborder="0"></iframe>
          </div>
        </div>  -->


          <br>
          <br>


          <div class="form-group">





            <div class="col-sm-12">

            </div>
            <div class="col-sm-12">

            </div>
            <div class="col-sm-12">

            </div>





          </div>





      </form>






    </div>
</div>





<!--   modal de practica --->


<div class="modal fade example-modal-lg" id="comprobanteModal" tabindex="-1" role="dialog" aria-labelledby="comprobanteModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007BFF">
        <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h1>Comprobante</h1>

        <div class="embed-responsive embed-responsive-4by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
        </div>




      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->























</section>
<!-- /.content -->
</div>








<!-- /.content-wrapper -->




<?php if ($mostrarModal) { ?>
  <script>
    $('#exampleModal').modal('show');
  </script>
<?php } ?>

<?php include("footer.php"); ?>