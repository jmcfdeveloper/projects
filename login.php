<?php
include_once 'database.php';
include 'templates/cabecera.php';
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
            header('location: admin/Vistapanel.php');
            break;

        case 2:
            header('location: colab/Vistacolab.php');
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

    $row = $query->fetch(PDO::FETCH_NUM);


    if ($row == true) {
        $rol = $row[3]; //fila de la tabla usuarios que representa el campo rol_id// esto puede ir cambiando a medida que se modifique la tabla
        $nombre = $row[1];
        $id = $row[0];
        $_SESSION['rol'] = $rol;
        $_SESSION['rol2'] = $row;



        $_SESSION['nombre'] = $nombre;
        $_SESSION['id'] = $id;
        switch ($rol) {
            case 1:
                header('location: adminpet/Vistapanel.php');
                break;

            case 2:
                header('location: colab/Vistacolab.php');
                break;

            default:
        }
    } else {
        // no existe el usuario
        echo "<script>alert('Usuario o contraseña incorrectos..')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>

<div>

  



    <div class="row">
        <div class="col-2">

        </div>
        
        <div class="col-8">
         
        <div class="form-group">
        <form action="#" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Ingresa tu usuario">

            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" name="clave" id="pass" placeholder="Tu contraseña">
            </div>

            <input type="submit" value="Iniciar sesión" class="btn btn-dark">

        </form>

        <div>

            <p>
                ¿Aun no tienes cuenta? <br>
                <a href="registrate.php">Registrate</a>
            </p>

        </div>

        <div class="container">

        </div>
    </div>

        </div>
        
        <div class="col-2">

        </div>
    </div>

    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>






    <?php include('templates/pie.php'); ?>