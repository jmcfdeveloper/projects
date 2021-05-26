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

$sentenciaPagos=$pdo->prepare("SELECT * FROM `tipo_pago` WHERE 1 ");
$sentenciaPagos->execute();
$registroPagos=$sentenciaPagos->fetchAll(PDO::FETCH_ASSOC);


?>

   

  
  

