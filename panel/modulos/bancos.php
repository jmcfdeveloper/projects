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


$sentenciaBancos=$pdo->prepare("SELECT * FROM `bancos` WHERE 1 ORDER BY banco ASC ");
$sentenciaBancos->execute();
$registroBancos=$sentenciaBancos->fetchAll(PDO::FETCH_ASSOC);



//========================codigo controlador de la vista de BANCOS==============================

$errores="";


$conexion = new PDO('mysql:host=localhost;dbname=' . BDATOS, 'root', PASSWORD_REGISTRO);

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtBanco = (isset($_POST['txtBanco'])) ? $_POST['txtBanco'] : "";
$txtCodigo = (isset($_POST['txtCodigo'])) ? $_POST['txtCodigo'] : "";

/* 
variables para los botenes */

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$modal = (isset($_POST['modal'])) ? $_POST['modal'] : "";



$accionAgregar = "";
$accionModificar = $accionCancelar= $accionEliminar = "disabled";
$mostrarModal = false;



switch ($accion) {

  case "btnAgregar":


    if (empty($txtBanco) or empty($txtCodigo)) {
      $errores .= '<hr class="solid"><li><span class="badge badge-warning">Por favor rellena todos los datos</span></li> <hr class="solid">';
    } else {
      
    //	echo " variables=> ".$nombre."-".$apellido."-".$correo;
    
    
      $statement = $conexion->prepare('SELECT * FROM bancos WHERE codigo = :codigo LIMIT 1');
      $statement->execute(array(':codigo' => $txtCodigo));
      $resultado = $statement->fetch();
  
  
      if ($resultado != false) {
        $errores .= '<h2><li><span class="badge badge-danger">Este codigo ya esta siendo utilizado</span></li></h2>';
      }
     
    }
    if($errores  == ''){

      
    $statement = $conexion->prepare('INSERT INTO bancos (id,banco,codigo) VALUES (null, :banco, :codigo)');
    $statement->execute(array(
      ':banco' => $txtBanco,
      ':codigo' => $txtCodigo
    ));


    $url = 'Vistabancos.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';



    }




    break;

  case "btnEditar":

    $statementEditar = $conexion->prepare('UPDATE bancos SET 
      banco=:Banco, 
      codigo=:Codigo 
      WHERE
      id=:Id');

    $statementEditar->execute(array(
      ':Banco' => $txtBanco,
      ':Codigo' => $txtCodigo, 
      ':Id' => $txtID
    ));
    $url = 'Vistabancos.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">'; 

    break;


    case "btnEliminar":

      $statement = $conexion->prepare('DELETE FROM bancos WHERE id =:ID');
      $statement->execute(array(
        ':ID' => $txtID
      ));
  
  
    
     $url = 'Vistabancos.php';
      echo '<meta http-equiv=refresh content="1; ' . $url . '">'; 
  
  
      break;


  case "btnCancelar":
    $url = 'VIstabancos.php';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';


    break;


  case "Seleccionar":
    $accionAgregar="disabled";
    $accionModificar=$accionCancelar=$accionEliminar="";
    //$mostrarModal=true;
  
  
    $statement =$conexion->prepare("SELECT * FROM bancos WHERE id=:id");
    $statement->execute(array(':id'=>$txtID));
    $Banco=$statement->fetch(PDO::FETCH_LAZY);
  
    $txtBanco=$Banco['banco'];
    $txtCodigo=$Banco['codigo'];
    break;
}


//=======================  ===================================================






?>

   

  
  

