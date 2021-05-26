<?php

//echo "hola soy usuarios desde modulos";


/* Este documento controla la vista de los Trabajadores
para usuarios con solo permisos de visualización
 */

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