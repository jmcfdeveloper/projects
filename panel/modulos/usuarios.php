<?php

echo "hola soy productos desde modulos";


session_start();


if(!isset($_SESSION['rol'])){
    header('location:../home.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: ../home.php');
    }
}

$a=$_SESSION['nombre'];
$id=$_SESSION['id'];


?>