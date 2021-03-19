<?php include("modulos/panel.php"); ?>
<?php include("cabecera.php"); ?>
<?php include("sidebar.php"); ?>

<?php

$conexion = new PDO('mysql:host=localhost;dbname=mascotas', 'root', PASSWORD_REGISTRO);

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtRaza = (isset($_POST['txtRaza'])) ? $_POST['txtRaza'] : "";
$txtUsuario_mascota = (isset($_POST['txtUsuario_mascota'])) ? $_POST['txtUsuario_mascota'] : "";
$txtanimal_id = (isset($_POST['txtanimal_id'])) ? $_POST['txtanimal_id'] : "";

$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


$accionAgregar = "";
$accionModificar = $accionCancelar = "disabled";
$mostrarModal = false;

switch ($accion) {

  case "btnAgregar":


    $statement = $conexion->prepare('INSERT INTO mascota (id,Nombre, Raza, Usuario_mascota, animal_id ,foto)
 VALUES (null,:Nombre,:Raza,:Usuario_mascota, :animal_id, :Foto)');

    $fecha = new DateTime();
    $nombreArchivo = ($txtfoto != "") ? $fecha->getTimestamp() . "_" . $_FILES['txtfoto']["name"] : "mascota.jpg";
    $tmpFoto = $_FILES['txtfoto']["tmp_name"];
    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "../imagenes/" . $nombreArchivo);
    }

    $statement->execute(array(':Nombre' => $txtNombre, ':Raza' => $txtRaza, ':Usuario_mascota' => $txtUsuario_mascota, ':animal_id' => $txtanimal_id, ':Foto' => $nombreArchivo));




    //header('Location: Vistamascotas.php');

    break;

  case "btnModificar":


    $statement = $conexion->prepare('UPDATE mascota SET

  id=:id,
  Nombre=:Nombre, 
  Raza=:Raza, 
  Usuario_mascota=:Usuario_mascota,
  animal_id=:animal_id
   WHERE
  id=:id ');
    $statement->execute(array(':id' => $txtID, ':Nombre' => $txtNombre, ':Raza' => $txtRaza, ':Usuario_mascota' => $txtUsuario_mascota, ':animal_id' => $txtanimal_id));



    /** validación de la foto para editarla*/

    $fecha = new DateTime();
    $nombreArchivo = ($txtfoto != "") ? $fecha->getTimestamp() . "_" . $_FILES['txtfoto']["name"] : "mascota.jpg";
    $tmpFoto = $_FILES['txtfoto']["tmp_name"];
    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "../imagenes/" . $nombreArchivo);


      /**  otra validación de la foto para editarla y borrarla*/

      $statement = $conexion->prepare("SELECT foto FROM mascota WHERE id=:id");
      $statement->execute(array(':id' => $txtID));

      $usuario = $statement->fetch(PDO::FETCH_LAZY);
      //print_r($usuario);

      if (isset($usuario["foto"])) {
        if (file_exists("../imagenes/" . $usuario["foto"])) {

          if ($usuario['foto'] != "mascota.jpg") {
            unlink("../imagenes/" . $usuario["foto"]);
          }
        }
      }

      /**  fin de otra validación de la foto para editarla y borrarla*/




      $statement = $conexion->prepare('UPDATE mascota SET
  foto=:Foto
   WHERE
  id=:id ');
      $statement->execute(array(':id' => $txtID, ':Foto' => $nombreArchivo));
    }


    /**  fin de validación de la foto para editarla*/




    echo "presionaste btnModificar";


    break;


  case "btnCancelar":
    header('Location: Vistapanel.php');


    break;


  case "Seleccionar":

    $accionAgregar = "disabled";
    $accionModificar = $accionCancelar = "";
    $mostrarModal = true;


    $statement = $conexion->prepare("SELECT * FROM mascota WHERE id=:id");
    $statement->execute(array(':id' => $txtID));
    $usuario = $statement->fetch(PDO::FETCH_LAZY);

    $txtNombre = $usuario['Nombre'];
    $txtRaza = $usuario['Raza'];
    $txtUsuario_mascota = $usuario['Usuario_mascota'];
    $txtanimal_id = $usuario['animal_id'];
    $txtfoto = $usuario['foto'];







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
          <h1 class="m-0 text-dark">Administrar Mascotas</h1>
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





    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">



        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $registro2['totalMascotas']; ?></h3>

              <p>Mascotas Registradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
           
          </div>
        </div>



        <!-- ./col -->

        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $registroRazas['totalRazas']; ?></h3>

              <p>Razas registradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- /.row -->


      <!--- inicio del formulario-->


      <!-- fin del formulario-->


      <!-- Horizontal Form -->

      <!--  Main row  -->






      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabla de Mascotas</h3>

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
                    <th>id</th>
                    <th>Nombre</th>

                    <th>Raza</th>
                    <th>usuario asociado</th>


                    <th>Animal id</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($registroMascotas as $usuario) { ?>
                    <tr>
                      <td> <?php echo $usuario['id']; ?></td>
                      <td><?php echo $usuario['Nombre']; ?></td>

                      <td><?php echo $usuario['Raza']; ?></td>



                      <td><span class="badge bg-warning"><?php



                                                          echo $usuario['Usuario_mascota'];


                                                          ?></span></td>

                      <td><?php echo $usuario['animal_id'];  ?></td>
                      <td> <img class="img-thumbnail" width="100px" height="100px" src="../imagenes/<?php echo $usuario['foto']; ?>" /> </td>

                      <td>


                        <form action="" method="post">
                          <input type="hidden" name="txtID" value="<?php echo $usuario['id']; ?>">

                          <input class="btn btn-warning" heref="#formSelected" type="submit" value="Seleccionar" name="accion">


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




      <div class="row justify-content-center" id="formSelected">

        <div class="col-md-8">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Deseas agregar una nueva mascota?</h3>
            </div>
            <div class="card-body">

              <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>

              <form action="" method="post" enctype="multipart/form-data" ng-hide="ocultar">




                <!-- Modal -->
                <div class="modal fade example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #007BFF">
                        <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">




                        <div class="form-group">
                          <div class="row">

                            <div class="col-10"> <input class="form-control" type="hidden" name="txtID" placeholder="" id="txtID" value="<?php echo $txtID; ?>" require=""> </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-4"> <label for="">Nombre:</label> </div>
                            <div class="col-8"> <input class="form-control" type="text" required name="txtNombre" placeholder="" id="txtNombre" value="<?php echo $txtNombre; ?>" require=""> </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-4"> <label for="">Raza:</label> </div>
                            <div class="col-8"> <input class="form-control" type="text" name="txtRaza" placeholder="" id="txtRaza" required value="<?php echo $txtRaza; ?>" require=""> </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-4"><label for="">Su usuario:</label> </div>
                            <div class="col-8"> <select class="form-control"  name="txtUsuario_mascota"  id="txtUsuario_mascota" >
                                <?php include 'conexiones.php/conexion_animales.php';


                                $consulta = "SELECT * FROM usuarios ";
                                $ejecutar = mysqli_query($conexion, $consulta);
                                ?>
                                <?php foreach ($ejecutar as $opciones) : ?>
                                  <option value="<?php echo $opciones['id'] ?>" class="form-control"><?php echo $opciones['Nombre'] ?> </option>
                                <?php endforeach ?>
                              </select>


                            </div>

                          </div>
                        </div>




                        <div class="form-group">
                          <div class="row">
                            <div class="col-4"> <label for="">Animal:</label></div>
                            <div class="col-8">
                              <select class="form-control" data-style="btn-primary" required id="txtanimal_id" name="txtanimal_id">
                                <?php include 'conexiones.php/conexion_animales.php';


                                $consulta = "SELECT * FROM animal ";
                                $ejecutar = mysqli_query($conexion, $consulta);
                                ?>
                                <?php foreach ($ejecutar as $opciones) : ?>
                                  <option value="<?php echo $opciones['id'] ?>" class="form-control"><?php echo $opciones['Nombre'] ?> </option>
                                <?php endforeach ?>


                              </select>
                            </div>



                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">

                            <div class="col-4"> <label class="form-group" for="">foto:</label></div>
                            <?php if ($txtfoto != "") { ?>
                              <br />
                              <br />

                              <img class="img-thumbnail rounded mx-auto d-block" width="200px" src="../imagenes/<?php echo $txtfoto; ?>" alt="Si ves esto es porque salió mal" />
                              <br />
                              <br />
                            <?php } ?>

                            <div class="col-8"><input class="form-control" type="file" accept="image/*" name="txtfoto" placeholder="" id="txtfoto" value="<?php echo $txtfoto; ?>" require=""></div>
                          </div>
                        </div>





                      </div>


                      <div class="form-group">

                        <div class="col-sm-12">
                          <button value="btnCancelar" type="submit" <?php echo $accionCancelar ?> class="btn btn-outline-danger btn-lg btn-block" name="accion">Cancelar</button>
                        </div>
                        <div class="col-sm-12">
                          <button value="btnModificar" type="submit" <?php echo $accionModificar ?> class="btn btn-outline-primary btn-lg btn-block" name="accion">Editar</button>
                        </div>
                        <div class="col-sm-12">
                          <button value="btnAgregar" type="submit" <?php echo $accionAgregar ?> class="btn btn-outline-success btn-lg btn-block" name="accion">Agregar</button>
                        </div>





                      </div>




                    </div>
                  </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Agregar Mascota
                </button>













              </form>

            </div>
          </div>

        </div>
      </div>






      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>





<!-- /.content-wrapper -->




<?php include("piePagina.php"); ?>