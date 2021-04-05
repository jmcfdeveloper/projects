<?php
include('global/conexion.php');

session_start();


if(!isset($_SESSION['rol'])){
    header('location:../');
}else{
    if($_SESSION['rol'] != 2){  
        header('location: ../../index.php');
    }
}



//$a=$_SESSION['nombre'];
$id=$_SESSION['id'];
$arrayInfo=$_SESSION['usuario'];


$conexion = new PDO('mysql:host=localhost;dbname='.BDATOS, 'root', PASSWORD_REGISTRO);

$sentenciaSQL_comprobante=$pdo->prepare("SELECT * FROM `trabajadores` WHERE  id=".$_GET['id']);
$sentenciaSQL_comprobante->execute();
$comprobante=$sentenciaSQL_comprobante->fetchAll(PDO::FETCH_ASSOC);






?>






