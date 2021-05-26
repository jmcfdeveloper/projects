<?php include("modulos/users.php"); ?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php


$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtUsername = (isset($_POST['txtUsername'])) ? $_POST['txtUsername'] : "";
$txtClave = (isset($_POST['txtClave'])) ? $_POST['txtClave'] : "";
$txtrol_id = (isset($_POST['txtrol_id'])) ? $_POST['txtrol_id'] : "";
$txtRol = (isset($_POST['txtRol'])) ? $_POST['txtRol'] : "";

$avatar = "avatar_neutro.svg";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


$accionAgregar = "";
$accionModificar = $accionCancelar = $accionEliminar = "disabled";
$mostrarModal = false;

switch ($accion) {

  case "btnAgregar":

    echo "--------------------------------------------------------->" . $txtRol;

    //$txtclave = hash('sha512', $txtclave);
    $statement = $conexion->prepare('INSERT INTO usuarios (id,username, password, rol_id, foto) VALUES (null, :usuario, :clave, :rol_id,:Foto)');


    $statement->execute(array(':usuario' => $txtUsername, ':clave' => $txtClave, ':rol_id' => $txtRol, ':Foto' => $avatar));

    //header('Location: Vistapanel.php');
    $url = 'Vistausuarios.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    break;

  case "btnModificar":

    /* $clave = hash('sha512', $txtclave); */
    $statement = $conexion->prepare('UPDATE usuarios SET

  id=:id,
  username=:usuario, 
  password=:clave,
  rol_id=:rol_id 
   WHERE
  id=:id ');
    $statement->execute(array(':id' => $txtID, ':usuario' => $txtUsername, ':clave' => $txtClave, ':rol_id' => $txtRol));


    $url = 'Vistausuarios.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    break;


  case "btnCancelar":

    $url = 'Vistausuarios.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "Seleccionar":

    $accionAgregar = "disabled";
    $accionModificar = $accionCancelar = $accionEliminar = "";

    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id=:id");
    $statement->execute(array(':id' => $txtID));
    $usuario = $statement->fetch(PDO::FETCH_LAZY);


    $txtUsername = $usuario['username'];
    $txtClave = $usuario['password'];
    $txtrol_id = $usuario['rol_id'];
    $txtRol = $usuario['rol_id'];

    if ($usuario['rol_id']) {
    }



    break;
}


?>
<!--1 Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Inicio</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Panel</a></li>
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


      <!-- /.row -->


      <!--- inicio del formulario-->


      <!-- fin del formulario-->


      <!-- Horizontal Form -->

      <div class="row">

        <div class="col-md-7">

          <div class="card" id="tablaUsuarios">
            <div class="card-header">
              <h3 class="card-title">Usuarios registrados</h3>

              <div class="card-tools">
                <!--  <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="caja_busqueda" id="caja_busqueda" class="form-control float-right" placeholder="Search"></input>
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div> -->

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">

              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($registroUsuarios as $usuario) { ?>
                    <tr>
                      <td> <?php echo $usuario['id']; ?></td>
                      <td><span class="badge bg-success"><?php echo $usuario['username']; ?></span></td>

                      <?php  //$clave= hash('sha512', $usuario['clave']);
                      ?>

                      <td> <?php echo $usuario['password']; ?></td>

                      <td> <span class="
                        <?php
                        if ($usuario['rol_id'] == "1") {
                          echo "badge bg-danger";
                        } elseif ($usuario['rol_id'] == "2") {
                          echo "badge bg-primary";
                        }

                        ?>">
                          <?php
                          if ($usuario['rol_id'] == "1") {
                            echo "Administrar";
                          } else {
                            echo "Ver";
                          }

                          ?>

                        </span>
                      </td>

                      <td>


                        <?php // $clave = hash('sha512', $usuario['clave']); 
                        ?>


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



        </div>


        <div class="col-md-5">

          <div class="card" id="formularioUsuarios">
            <div class="card-header">
              <h3 class="card-title">Usuario</h3>
            </div>

            <div class="card-body">

              <form action="" method="post" enctype="multipart/form-data">

                <div class="form-row">

                  <input class="form-control" type="hidden" name="txtID" placeholder="" id="txtID" value="<?php echo $txtID; ?>" required>



                  <div class="form-group col-md-12">
                    <label for="">Username:</label>

                    <input class="form-control" type="text" required name="txtUsername" placeholder="" id="txtUsername" value="<?php echo $txtUsername; ?>">
                  </div>


                  <div class="form-group col-md-12">
                    <label for="">Contraseña:</label>
                    <input class="form-control" type="password" name="txtClave" placeholder="" id="txtClave" required value="<?php echo $txtClave; ?>" require="">

                  </div>

                 

                  <div class="form-group col-md-12">
                  <label for="txtRol">Permisos:</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="txtRol" id="flexRadioDefault1" value="1" <?php if ($txtRol == "1") {
                                                                                                                    echo "checked";
                                                                                                                  } ?>>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Administrar
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="txtRol" id="flexRadioDefault2" value="2" <?php if ($txtRol == "2") {
                                                                                                                    echo "checked";
                                                                                                                  } ?>>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Visualizar
                      </label>
                    </div>

                  </div>



                  <div class="row align-items-start">


                    <div class="col"> <button value="btnCancelar" type="submit" <?php echo $accionCancelar ?> class="btn btn-outline-info btn-sm" name="accion">Cancelar</button></div>
                    <div class="col"> <button value="btnModificar" type="submit" <?php echo $accionModificar ?> class="btn btn-outline-primary btn-sm" name="accion">Editar</button></div>
                    <div class="col"> <button value="btnEliminar" type="submit" <?php echo $accionEliminar ?> class="btn btn-outline-danger btn-sm" name="accion">Eliminar</button></div>
                    <div class="col"><button value="btnAgregar" type="submit" <?php echo $accionAgregar ?> class="btn btn-outline-success btn-sm" name="accion">Agregar</button></div>


                  </div>

                  <div class="form-group col-md-12">

                    <br>
                    <br>



                    <!--Mensaje de error -->
                    <?php if (!empty($errores)) : ?>
                      <div>
                        <ul>
                          <?php echo $errores; ?>
                        </ul>
                      </div>
                    <?php endif; ?>



                  </div>





                </div>

              </form>

            </div>




          </div>



        </div>





      </div>
      <!--  Main row  -->




      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>



<!--  <form class="form-horizontal">
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Sign in</button>
                      <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
               
                  </form> -->


<!-- /.content-wrapper -->



<?php include("footer.php"); ?>