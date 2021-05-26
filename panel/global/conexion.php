
<?php   include("config.php");  ?>

<?php
$SERVIDOR_REGISTROSIDS="localhost";
$BDATOS="registro";
$USUARIO_REGISTROSIDS="root";
$PASSWORD_REGISTROSIDS="Acdc1004966557";

$servidor ="mysql:dbname=".$BDATOS.";host=".$SERVIDOR_REGISTROSIDS;

try {

   $pdo= new PDO($servidor, $USUARIO_REGISTROSIDS,$PASSWORD_REGISTROSIDS,

   array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")

   //array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET utf8")


);

//echo "<script>alert('Conectado..')</script>";

} catch (PDOException $e) {

//echo "<script>alert('Error de conexión..')<script>";

}

?>

