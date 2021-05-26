
<?php   //include("config.php");  ?>
<?php


$servidor ="mysql:dbname=".BDATOS.";host=".SERVIDOR_REGISTRO;

try {

   $pdo= new PDO($servidor, USUARIO_REGISTRO,PASSWORD_REGISTRO,
   array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
);
echo "<script>alert('Conectado..')</script>";
} catch (PDOException $e) {
echo "<script>alert('Error de conexión..')<script>";
}





?>
