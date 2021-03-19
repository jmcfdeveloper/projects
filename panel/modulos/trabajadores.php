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

/*
$sentenciaSQL=$pdo->prepare("SELECT count(*) totalUsuarios FROM `usuarios`");

$sentenciaSQL2=$pdo->prepare("SELECT count(*) totalMascotas FROM `mascota`");

$sentenciaSQLRazas=$pdo->prepare("SELECT count(*) totalRazas FROM `raza`");
    
    $sentenciaSQL->execute();
    $sentenciaSQL2->execute();
    $sentenciaSQLRazas->execute();

 $registro=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
 $registro2=$sentenciaSQL2->fetch(PDO::FETCH_ASSOC);
 $registroRazas=$sentenciaSQLRazas->fetch(PDO::FETCH_ASSOC);

 */


?>

<?php


$sentenciaSQL3=$pdo->prepare("SELECT * FROM `trabajadores` WHERE 1 ");
$sentenciaSQL3->execute();
$registro3=$sentenciaSQL3->fetchAll(PDO::FETCH_ASSOC);

/*


$sentenciaSQLMascotas=$pdo->prepare("SELECT * FROM `mascota` WHERE 1 ");
$sentenciaSQLMascotas->execute();
$registroMascotas=$sentenciaSQLMascotas->fetchAll(PDO::FETCH_ASSOC);

*/


?>

   

  
  

