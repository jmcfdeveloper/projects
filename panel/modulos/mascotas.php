<?php

echo "hola soy ventas desde modulos";


session_start();


if(!isset($_SESSION['rol'])){
    header('location:../index.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: ../home.php');
    }
}

$a=$_SESSION['nombre'];
$id=$_SESSION['id'];




?>