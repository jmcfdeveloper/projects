<?php
//este archivo se invocará desde la vista del login, para separar el codigo html del codigo php


include_once 'database.php';
//include 'templates/cabecera.php';
$f;


session_start(); 

if (isset($_GET['cerrar_sesion'])) {
    session_unset();

    // destroy the session 
    session_destroy();
}

if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('location: panel/Vistatrabajadores.php');
            break;

        case 2:
            header('location: panel/index.php');
            break;

        default:
    }
}

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    //$clave = hash('sha512', $clave);


    $db = new Database();
    $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE username = :usuario AND password = :clave');
    $query->execute(['usuario' => $usuario, 'clave' => $clave]);

    //row contine las columnas de la tabla usuario
    $row = $query->fetch(PDO::FETCH_NUM);


    if ($row == true) {
        $arrayInfo = array('id' => $row[0],'username' => $row[1], 'rol_id' => $row[3],'foto' => $row[4],);
        $rol = $row[3]; //fila de la tabla usuarios que representa el campo rol_id// esto puede ir cambiando a medida que se modifique la tabla
        $nombre = $row[1];
        $id = $row[0];
        $_SESSION['rol'] = $rol;
        $_SESSION['rol2'] = $row;
        $_SESSION['usuario'] = $row;



        $_SESSION['usuario'] =$arrayInfo;
        $_SESSION['id'] = $id;
      // crearemos un array donde guardaremos los datos del usuario en la sesion, para evitar estar haciendo consultas a la BD innecesarias
      
     
        switch ($rol) {
            case 1:
                header('location: panel/Vistatrabajadores.php');
                break;

            case 2:
                header('location: panel/index.php');
                
                break;

            default:
        }
    } else {
        // no existe el usuario
        echo "<script>alert('Usuario o contraseña incorrectos..')</script>";
    }
}







?>