<?php

include("global/config.php");
$SERVIDOR_REGISTROSIDS="localhost";
$BDATOS="registro";
$USUARIO_REGISTROSIDS="root";
$PASSWORD_REGISTROSIDS="Acdc1004966557";
$conexion = new PDO('mysql:host='.$SERVIDOR_REGISTROSIDS.';dbname='.$BDATOS, $USUARIO_REGISTROSIDS, $PASSWORD_REGISTROSIDS);

$conexion->exec("SET CHARACTER SET utf8");

?>