<?php include("modulos/pago.php");?>
<?php include("header.php");?>
<?php include("sidebar.php");?>

<?php

//========================codigo controlador de la vista de Cuentas==============================

$errores = "";




$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtTipo_pago = (isset($_POST['txtTipo_pago'])) ? $_POST['txtTipo_pago'] : "";
$txtCodigo = (isset($_POST['txtCodigo'])) ? $_POST['txtCodigo'] : "";

/* 
variables para los botenes */

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$accionAgregar = "";
$accionModificar = $accionCancelar = $accionEliminar = "disabled";

switch ($accion) {

  case "btnAgregar":

    /* echo "<script>alert('".$txtTipo_cuenta."')<script>"; */


    if (empty($txtTipo_pago) or empty($txtCodigo)) {
      $errores .= '<hr class="solid"><li><span class="badge badge-warning">Por favor rellena todos los datos</span></li> <hr class="solid">';
    } else {

      //	echo " variables=> ".$nombre."-".$apellido."-".$correo;


      $statement = $conexion->prepare('SELECT * FROM tipo_pago WHERE codigo = :codigo LIMIT 1');
      $statement->execute(array(':codigo' => $txtCodigo));
      $resultado = $statement->fetch();


      if ($resultado != false) {
        $errores .= '<h2><li><span class="badge badge-danger">Este codigo ya esta siendo utilizado</span></li></h2>';
      }
    }
    if ($errores  == '') {


      $statement = $conexion->prepare('INSERT INTO tipo_pago (id,tipo_pago,codigo) VALUES (null, :Tipo_pago, :codigo)');
      $statement->execute(array(
        ':Tipo_pago' => $txtTipo_pago,
        ':codigo' => $txtCodigo
      ));


      $url = 'Vistapagos.php';
      echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    }


    break;

  case "btnEditar":

    $statementEditar = $conexion->prepare('UPDATE tipo_pago SET 
      tipo_pago=:Tipo_pago, 
      codigo=:Codigo 
      WHERE
      id=:Id');

    $statementEditar->execute(array(
      ':Tipo_pago' => $txtTipo_pago,
      ':Codigo' => $txtCodigo,
      ':Id' => $txtID
    ));
    $url = 'Vistapagos.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';

    break;


  case "btnEliminar":

    $statement = $conexion->prepare('DELETE FROM tipo_pago WHERE id =:ID');
    $statement->execute(array(
      ':ID' => $txtID
    ));

    $url = 'Vistapagos.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "btnCancelar":
    $url = 'Vistapagos.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "Seleccionar":
    $accionAgregar = "disabled";
    $accionModificar = $accionCancelar = $accionEliminar = "";
    //$mostrarModal=true;


    $statement = $conexion->prepare("SELECT * FROM tipo_pago WHERE id=:id");
    $statement->execute(array(':id' => $txtID));
    $Pagos = $statement->fetch(PDO::FETCH_LAZY);

    $txtTipo_pago = $Pagos['tipo_pago'];
    $txtCodigo = $Pagos['codigo'];
    break;
}


//=======================  ===================================================




?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tipos de Pagos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pagos</h3>

              <div class="card-tools">
        
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
              <table class="table table-head-fixed text-nowrap">
                <caption>Cuentas</caption>
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Pago</th>
                    <th>codigo</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($registroPagos as $Pagos) { ?>
                    <tr>
                      <td> <?php echo $Pagos['id']; ?></td>
                      <td><?php echo $Pagos['tipo_pago']; ?></td>

                      <td> <span class="badge badge-danger"><?php echo $Pagos['codigo']; ?></span></td>

                      <td>


                        <form action="" method="post">
                          <input type="hidden" name="txtID" id="txtID" value="<?php echo $Pagos['id']; ?>">


                          <input class="btn btn-outline-info btn-sm" heref="#formSelected" type="submit" value="Seleccionar" name="accion">

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

        <div class="col-md-6">

          <form action="" method="post" enctype="multipart/form-data">

            <div class="form-row">

              <input class="form-control" type="hidden" name="txtID" placeholder="" id="txtID" value="<?php echo $txtID; ?>" require="">
              <div class="form-group col-md-12">
                <label for="">Tipo de pago:</label>

                <input class="form-control" type="text" required name="txtTipo_pago" placeholder="" id="txtTipo_pago" value="<?php echo $txtTipo_pago; ?>">
              </div>


              <div class="form-group col-md-12">
                <label for="">Codigo:</label>

                <input class="form-control" type="number" required name="txtCodigo" placeholder="" id="txtCodigo" value="<?php echo $txtCodigo; ?>">


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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("footer.php");?>