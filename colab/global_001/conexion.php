<?php
include('../global/config.php');
$servidor ="mysql:dbname=".BD2.";host=".SERVIDOR2;

try {

   $pdo= new PDO($servidor, USUARIO2,PASSWORD2,
   array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
);
//echo "<script>alert('Conectado..')</script>";
} catch (PDOException $e) {
//echo "<script>alert('Error de conexión..')<script>";
}


?>
