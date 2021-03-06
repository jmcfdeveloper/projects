<?php include("cabecera.php"); ?>
<?php include("sidebar.php"); ?>
<?php
include '../global/config.php';
include '../global/conexion.php';
?>

<?php
$conexion = new PDO('mysql:host=localhost;dbname=mascotas', USUARIO, PASSWORD2);

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtTitulo = (isset($_POST['txtTitulo'])) ? $_POST['txtTitulo'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";

$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto']["name"] : "";

$txtPET = (isset($_POST['txtPET'])) ? $_POST['txtPET'] : "";



$usuario_id = $info[0];

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


$accionAgregar = "";
$accionModificar = $accionCancelar = "disabled";
$mostrarModal = false;

switch ($accion) {

  case "btnAgregar":


    $fecha = new DateTime();
    $nombreArchivo = ($txtfoto != "") ? $fecha->getTimestamp() . "_" . $_FILES['txtfoto']["name"] : "publicacion.jpg";
    $tmpFoto = $_FILES['txtfoto']["tmp_name"];
    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "../imagenes/" . $nombreArchivo);
    }

    $statementP = $conexion->prepare('INSERT INTO publicaciones (id , titulo , descripcion , foto, mascota_id, usuario_id) VALUES (null,:Titulo,:Descripcion,:Foto, :Mascota_id, :Usuario_id)');
    $statementP->execute(array(
      ':Titulo' => $txtTitulo, ':Descripcion' => $txtDescripcion,
      ':Foto' => $nombreArchivo, ':Mascota_id' => $txtPET, ':Usuario_id' => $usuario_id
    ));






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
          <!--  <h1 class="m-0 text-dark"><strong><?php //echo $info[1] . " " . $info[2] . ",Este es tu inicio."; 
                                                  ?></strong></h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> Home</a></li>
            <li class="breadcrumb-item active">Tus publicaciones</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">


    <div class="container-fluid">


    </div>
  </section>
  <!-- /.content -->


  <form action="" method="post" enctype="multipart/form-data" ng-hide="ocultar">

    <div class="modal fade example-modal-lg" id="modalPublicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <div class="col-10"> <input class="form-control" type="hidden" name="txtID" placeholder="" id="txtID" value="" require=""> </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-4"> <label for="">Titulo:</label> </div>
                <div class="col-8"> <input class="form-control" type="text" required name="txtTitulo" placeholder="<?php echo "¿Que hiciste hoy " . $info[1] . "?"; ?>" id="txtTitulo" value=""> </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-4"> <label for="">Descripción:</label> </div>
                <div class="col-8"> <textarea class="form-control" type="textarea" name="txtDescripcion" placeholder="" id="txtDescripcion" required value="" require=""></textarea> </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">

                <div class="col-4"> <label class="form-group" for="">foto:</label></div>
                <div class="col-8"><input class="form-control" type="file" accept="image/*" name="txtfoto" placeholder="" id="txtfoto" value=""></div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-4"> <label for="txtPET">Macota:</label></div>
                <div class="col-8">
                  <select class="form-control" data-style="btn-primary" required id="txtPET" name="txtPET">
                    <?php include 'conexiones.php/conexion_animales.php';

                    $user = $info[0];
                    $consulta = "SELECT * FROM mascota WHERE Usuario_mascota = $user ORDER BY id DESC";
                    $ejecutar = mysqli_query($conexion, $consulta);
                    ?>
                    <?php foreach ($ejecutar as $opciones) : ?>
                      <option value="<?php echo $opciones['id'] ?>" class="form-control"><?php echo $opciones['Nombre'] ?> </option>
                    <?php endforeach ?>


                  </select>
                </div>



              </div>
            </div>





          </div>


          <div class="form-group">

            <!--   <div class="col-sm-12">
                    <button value="btnCancelar" type="submit" <?php echo $accionCancelar ?> class="btn btn-outline-danger btn-lg btn-block" name="accion">Cancelar</button>
                    </div>
                    <div class="col-sm-12">
                    <button value="btnModificar" type="submit" <?php echo $accionModificar ?> class="btn btn-outline-primary btn-lg btn-block" name="accion">Editar</button> 
                    </div> -->
            <div class="col-sm-12">
              <button value="btnAgregar" type="submit" <?php echo $accionAgregar ?> class="btn btn-outline-success btn-lg btn-block" name="accion" onclick="reload(3);">Agregar</button>
            </div>





          </div>




        </div>
      </div>
    </div>

  </form>
  <!-- Button trigger modal -->

  <div class="row justify-content-center">
    <div class="col-5">
      <h3 class="m-0 text-dark"><strong><?php echo $info[1] . " " . $info[2] . ",Este es tu inicio."; ?></strong></h1>
    </div>
    <div class="col-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPublicacion">Nueva publicación</button>
    </div>
  </div>
  </br>
  </br>

  <section class="seccionMascotas" id="seccionMascotas">
    <div class="container" id="contenedor">

      <?php
      $styleH = '';

      $id = $_SESSION['id'];
      $sentencia = $pdo->prepare("SELECT * FROM publicaciones WHERE usuario_id='$id' ORDER BY id DESC");
      $sentencia->execute();

      $listaPublicaciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      $conexion = new PDO('mysql:host=localhost;dbname=mascotas', 'root', PASSWORD2);

      if (empty($listaPublicaciones) == true) {

        $styleH = '';
      } else {
        $styleH = 'style="display: none"';
      }




      ?>

      <div class="row">




        <?php foreach ($listaPublicaciones as $publicacion) { ?>

          <!-- template de imagen para publicacion  -->
          <div class="col-md-9">
            <div class="card w-300">

              <div class="card-header">



                <?php
                $statementNombre = $conexion->prepare('SELECT * FROM usuarios WHERE id = :id LIMIT 1');
                $statementNombre->execute(array(':id' => $publicacion['usuario_id']));
                $resultadoNombre = $statementNombre->fetch();
                $usuario_nombre = $resultadoNombre['Nombre']; ?>
                <strong>
                  <p class="card-text" name="Usuario"> <?php echo $usuario_nombre  ?></p>
                </strong>



                <strong> <?php echo $publicacion['titulo']; ?></strong>
              </div>

              <img title="<?php echo $publicacion['titulo']; ?>" alt="<?php echo $publicacion['titulo'];  ?>" class="card-img-top" class="img-thumbnail" width="100px" height="300px" src="../imagenes/<?php echo $publicacion['foto']; ?>" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php echo $publicacion['descripcion'];  ?>" height="317px" />

              <div class="card-body">

                <span>Descripcion: <?php echo $publicacion['descripcion'];  ?></span>
                </br>
                <span>
                  <h5 class="card-title">Nombre: <?php  ?></h5>
                </span>

                <?php
                $statement2 = $conexion->prepare('SELECT Nombre FROM mascota WHERE id = :id LIMIT 1');
                $statement2->execute(array(':id' => $publicacion['mascota_id']));
                $resultado2 = $statement2->fetch();
                $animal_nombre = $resultado2['Nombre']; ?>
                <p class="card-text" name="animal"> <?php echo $animal_nombre  ?></p>

              </div>
            </div>

          </div>
          <!--  fin template de imagen  -->


        <?php } ?>











      </div>



      <div class="row justify-content-center" <?php echo $styleH; ?>>
        <strong>
          <h1>Al parecer No has registrado ninguna publicacion</h1></br>
        </strong>
        <div class="row justify-content-center" <?php echo $styleH; ?>>
          </br>
          <h2>Da click en el boton </h2>
          <img src="../imagenes/icon/btnNueva.png" alt="image" width="200px" height="60px" style="padding: 10px">
          <h2>si deseas agregar una</h2>
        </div>
      </div>

      <div class="row justify-content-center" <?php echo $styleH; ?>>
        <img src="../imagenes/icon/monkey.svg" alt="insertar SVG con la etiqueta image" width="400px" height="400px">
      </div>


    </div>
  </section>

</div>








<?php include("piePagina.php"); ?>