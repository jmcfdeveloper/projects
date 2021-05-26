<?php
include('global/conexion.php');

session_start();


if(!isset($_SESSION['rol'])){
    header('location:../');
}else{
    if($_SESSION['rol'] != 2){  
        header('location: ../');
    }
}

//$a=$_SESSION['nombre'];
$id=$_SESSION['id'];
$arrayInfo=$_SESSION['usuario'];



?>
<?php

$conexion = new PDO('mysql:host=localhost;dbname='.BDATOS, 'root', PASSWORD_REGISTRO);




$sentenciaSQL3=$pdo->prepare("SELECT * FROM `trabajadores` WHERE 1 ");
$sentenciaSQL3->execute();
$registro3=$sentenciaSQL3->fetchAll(PDO::FETCH_ASSOC);





?>

   

  
  
