<?php
include('global/conexion.php');

session_start();


if(!isset($_SESSION['rol'])){
    header('location:../');
}else{
    if($_SESSION['rol'] != 1){  
        header('location: ../login.php');
    }
}

//$a=$_SESSION['nombre'];
$id=$_SESSION['id'];
$arrayInfo=$_SESSION['usuario'];



?>
<?php

$conexion = new PDO('mysql:host=localhost;dbname='.BDATOS, 'root', PASSWORD_REGISTRO);



$sentenciaCuenta=$pdo->prepare("SELECT * FROM `tipo_cuenta` WHERE 1 ");
$sentenciaCuenta->execute();
$registroCuentas=$sentenciaCuenta->fetchAll(PDO::FETCH_ASSOC);




//========================codigo controlador de la vista de Cuentas==============================

$errores = "";


$conexion = new PDO('mysql:host=localhost;dbname=' . BDATOS, 'root', PASSWORD_REGISTRO);

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtTipo_cuenta = (isset($_POST['txtTipo_cuenta'])) ? $_POST['txtTipo_cuenta'] : "";
$txtCodigo = (isset($_POST['txtCodigo'])) ? $_POST['txtCodigo'] : "";

/* 
variables para los botenes */

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$accionAgregar = "";
$accionModificar = $accionCancelar = $accionEliminar = "disabled";

switch ($accion) {

  case "btnAgregar":

    /* echo "<script>alert('".$txtTipo_cuenta."')<script>"; */


    if (empty($txtTipo_cuenta) or empty($txtCodigo)) {
      $errores .= '<hr class="solid"><li><span class="badge badge-warning">Por favor rellena todos los datos</span></li> <hr class="solid">';
    } else {

      //	echo " variables=> ".$nombre."-".$apellido."-".$correo;


      $statement = $conexion->prepare('SELECT * FROM tipo_cuenta WHERE codigo = :codigo LIMIT 1');
      $statement->execute(array(':codigo' => $txtCodigo));
      $resultado = $statement->fetch();


      if ($resultado != false) {
        $errores .= '<h2><li><span class="badge badge-danger">Este codigo ya esta siendo utilizado</span></li></h2>';
      }
    }
    if ($errores  == '') {


      $statement = $conexion->prepare('INSERT INTO tipo_cuenta (id,tipo_cuenta,codigo) VALUES (null, :Tipo_cuenta, :codigo)');
      $statement->execute(array(
        ':Tipo_cuenta' => $txtTipo_cuenta,
        ':codigo' => $txtCodigo
      ));


      $url = 'Vistacuentas.php';
      echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    }


    break;

  case "btnEditar":

    $statementEditar = $conexion->prepare('UPDATE tipo_cuenta SET 
      tipo_cuenta=:Tipo_cuenta, 
      codigo=:Codigo 
      WHERE
      id=:Id');

    $statementEditar->execute(array(
      ':Tipo_cuenta' => $txtTipo_cuenta,
      ':Codigo' => $txtCodigo,
      ':Id' => $txtID
    ));
    $url = 'Vistacuentas.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';

    break;


  case "btnEliminar":

    $statement = $conexion->prepare('DELETE FROM tipo_cuenta WHERE id =:ID');
    $statement->execute(array(
      ':ID' => $txtID
    ));

    $url = 'Vistacuentas.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "btnCancelar":
    $url = 'Vistacuentas.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "Seleccionar":
    $accionAgregar = "disabled";
    $accionModificar = $accionCancelar = $accionEliminar = "";
    //$mostrarModal=true;


    $statement = $conexion->prepare("SELECT * FROM tipo_cuenta WHERE id=:id");
    $statement->execute(array(':id' => $txtID));
    $Cuentas = $statement->fetch(PDO::FETCH_LAZY);

    $txtTipo_cuenta = $Cuentas['tipo_cuenta'];
    $txtCodigo = $Cuentas['codigo'];
    break;
}


//=======================  ===================================================



?>

   

  
  

