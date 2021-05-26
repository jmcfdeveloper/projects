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

*/



$SQLTrabajadores=$pdo->prepare("SELECT count(*) total FROM `trabajadores`");
$SQLTrabajadores->execute();
$trabajadores=$SQLTrabajadores->fetch(PDO::FETCH_ASSOC);

$SQLBancos=$pdo->prepare("SELECT count(*) total FROM `bancos`");
$SQLBancos->execute();
$bancos=$SQLBancos->fetch(PDO::FETCH_ASSOC);

$SQLId=$pdo->prepare("SELECT count(*) total FROM `identificacion`");
$SQLId->execute();
$identificacion=$SQLId->fetch(PDO::FETCH_ASSOC);

$SQLCuentas=$pdo->prepare("SELECT count(*) total FROM `tipo_cuenta`");
$SQLCuentas->execute();
$Cuentas=$SQLCuentas->fetch(PDO::FETCH_ASSOC);

$SQLPagos=$pdo->prepare("SELECT count(*) total FROM `tipo_pago`");
$SQLPagos->execute();
$Pagos=$SQLPagos->fetch(PDO::FETCH_ASSOC);

$SQLUsuarios=$pdo->prepare("SELECT count(*) total FROM `usuarios`");
$SQLUsuarios->execute();
$Usuarios=$SQLUsuarios->fetch(PDO::FETCH_ASSOC);





?>

   

  
  

