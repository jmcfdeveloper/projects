<?php 

include 'global/config.php';
include 'global/conexion.php';

session_start();


if (isset($_SESSION['nombre'])) {
	header('Location: admin/admin.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$nombre= $_POST['Nombre'];
	$apellido= $_POST['Apellido'];
	$correo= $_POST['Correo'];

	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	//$Imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name'])); 
	$Imagen=(isset($_FILES['Imagen']["name"]))?$_FILES['Imagen']["name"]:"";
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	
	//echo " variables=> ".$usuario."-".$password."-".$password2;

	$errores = '';

	if (empty($usuario) or empty($password) or empty($password2) /*or empty($nombre) or empty($apellido) or empty($correo) */ ) {
		$errores .= '<li>Por favor rellena todos los datos</li>';
	} else {
		
	//	echo " variables=> ".$nombre."-".$apellido."-".$correo;
	
		$conexion = new PDO('mysql:host=localhost;dbname=registro', 'root', 'Acdc1004966557');
	

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE username = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();




		
		if ($resultado != false) {
			$errores .= '<li>El nombre de usuario ya existe</li>';
		}
		//HASh DE LA CONTRASEñA (encriptar)
	/*	$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);*/

		if ($password != $password2) {
			$errores .= '<li>Las contraseñas no son iguales</li>';
		}
	}
	if ($errores == '') {
		$rol_id=2;// 2 es el rol de usuario normal sin permisos. Este comentario me deja recordar que
		//despues debo codificar los valores para elevar el nivel de seguridad 
	   //echo " variables=> ".$nombre."-".$apellido."-".$correo."-".$usuario."-".$password."-".$rol_id;

	/*	$fecha=new DateTime();
		$nombreArchivo=($Imagen!="")?$fecha->getTimestamp()."_".$_FILES['Imagen']["name"]:"imagen.jpg";
		$tmpFoto=$_FILES['Imagen']["tmp_name"];
	  
		if($tmpFoto!=""){
	  
			
		  move_uploaded_file($tmpFoto,"imagenes/".$nombreArchivo);

		}  */
	
		/*$statement = $conexion->prepare('INSERT INTO usuarios (id,Nombre, Apellido, Correo, usuario, clave, rol_id, foto) VALUES (null,:Nombre,:Apellido,:Correo, :usuario, :clave, :rol_id,:foto)');
		$statement->execute(array(':Nombre' => $nombre,':Apellido' => $apellido,':Correo' => $correo,':usuario' => $usuario, ':clave' => $password,':rol_id' => $rol_id, ':foto' => $nombreArchivo));*/
		echo " variables=> ".$usuario."-".$password;
		$statement = $conexion->prepare('INSERT INTO usuarios (id,username, password,rol_id) VALUES (null,:username, :clave, :rol_id)');
		$statement->execute(array(':username' => $usuario, ':clave' => $password,':rol_id' => $rol_id));

		header('Location: login.php');
	}
}



require 'views/registrate.view.php';
?>