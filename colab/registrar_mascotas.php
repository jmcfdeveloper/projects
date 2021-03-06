
<?php 

include '../global/config.php';
include '../global/conexion.php';

if(!isset($_SESSION['rol'])){
    header('location: ../login.php');
}else{ 
    if($_SESSION['rol'] != 2){
        header('location: ../login.php');
    }
}

$a=$_SESSION['nombre'];
$id=$_SESSION['id'];


$mostrarModal=false;
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){

	case "btnRegistrar":
		$mostrarModal=true;
	break;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$conexion = new PDO('mysql:host=localhost;dbname=mascotas', 'root', '');
	
	$nombre= $_POST['Nombre'];
	$raza= $_POST['Raza'];
    $animal= $_POST['Animal'];
    $Usuario_mascota=$id;//este dato se obtiene con la variable de sesión, no aparece en el formulario
	//$Imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name'])); 
	$Imagen=(isset($_FILES['Imagen']["name"]))?$_FILES['Imagen']["name"]:"";

    



	


	$errores = '';

	if (empty($nombre) or empty($raza) or empty($animal) or empty($Usuario_mascota) ) {
		$errores .= '<li>Por favor rellena todos los datos</li>';
	} else {
		
		
		$conexion = new PDO('mysql:host=localhost;dbname=mascotas', 'root', '');
	

		$statement = $conexion->prepare('SELECT * FROM mascota WHERE Nombre = :nombre LIMIT 1');
		$statement->execute(array(':nombre' => $nombre));
        $resultado = $statement->fetch();
        
        //este sql es para obtener el id del animal
		$statement2 = $conexion->prepare('SELECT id FROM animal WHERE Nombre = :nombre LIMIT 1');
		$statement2->execute(array(':nombre' => $animal));
  

        $resultado2 = $statement2->fetch();

        $animal_id=$resultado2['id'];

        
     



		
		if ($resultado != false) {
			$errores .= '<li>El nombre de tu mascota ya existe</li>';
		}
		//HASS DE LA CONTRASEñA (encriptar)
	
	}
	if ($errores == '') {
	
		//despues debo codificar los valores para elevar el nivel de seguridad 

		
		$fecha=new DateTime();
		$nombreArchivo=($Imagen!="")?$fecha->getTimestamp()."_".$_FILES['Imagen']["name"]:"mascota.jpg";
		
	  
		$tmpFoto=$_FILES['Imagen']["tmp_name"];
	  
		if($tmpFoto!=""){
		  move_uploaded_file($tmpFoto,"../imagenes/".$nombreArchivo);
		}
        
	$statement = $conexion->prepare('INSERT INTO mascota (id,Nombre, Raza, Usuario_mascota, animal_id,foto) VALUES (null,:Nombre,:Raza,:Usuario_mascota, :animal_id, :foto)');
	$statement->execute(array(':Nombre' => $nombre,':Raza' => $raza,':Usuario_mascota' => $Usuario_mascota,':animal_id' => $animal_id, ':foto' => $nombreArchivo));
        
	
	$statement3 = $conexion->prepare("SELECT * FROM mascota WHERE mascota.Nombre='$nombre' AND mascota.Usuario_mascota=$id");
	$statement3->execute(array(':nombre' => $nombre,':usuario' => $Usuario_mascota));
	$resultadoInfo = $statement3->fetch();
	$mascota_id=$resultadoInfo[0];
	//echo "imprimiendo el id de la mascota->  ";
	//print_r($mascota_id);


	//recepcionando datos de la hoja de vida
	
	$sexo=(isset($_POST['genero']))?$_POST['genero']:"";
	$alergias=(isset($_POST['alergias']))?$_POST['alergias']:"";
	$peso=(isset($_POST['Peso']))?$_POST['Peso']:"";
	$ultimavisita=(isset($_POST['ultimavisita']))?$_POST['ultimavisita']:"";
	$proximavisita =(isset($_POST['proximavisita']))?$_POST['proximavisita']:"";
	$tratamiento1 =(isset($_POST['Tratamiento1']))?$_POST['Tratamiento1']:"";
	$tratamiento2 =(isset($_POST['Tratamiento2']))?$_POST['Tratamiento2']:"";
	$vacuna1 =(isset($_POST['Vacuna1']))?$_POST['Vacuna1']:"";
	$fechavacuna1 =(isset($_POST['Fechavacuna1']))?$_POST['Fechavacuna1']:"";
	$vacuna2 =(isset($_POST['Vacuna2']))?$_POST['Vacuna2']:"";
	$fechavacuna2 =(isset($_POST['Fechavacuna2']))?$_POST['Fechavacuna2']:"";
	$observaciones =(isset($_POST['Observaciones']))?$_POST['Observaciones']:"";




	




$a="example";
	$statementDatos = $conexion->prepare('INSERT INTO datosmascota (id,sexo, alergias, peso, ultimaVisita,proximaVisita,tratamiento1,tratamiento2,vacuna1,fechaVacuna1,vacuna2,fechaVacuna2,observaciones, mascota_id)
	 VALUES (null, 
	 :sexo, 
	 :alergias, 
	 :peso, 
	 :ultimaVisita,
	 :proximaVisita,
	 :tratamiento1,
	 :tratamiento2,
	 :vacuna1,
	 :fechaVacuna1,
	 :vacuna2,
	 :fechaVacuna2,
	 :observaciones,
	 :mascota_id)');
	$statementDatos->execute(array(':sexo' => $sexo,
	':alergias' => $alergias,
	':peso' => $peso,
	':ultimaVisita' => $ultimavisita,
	':proximaVisita' => $proximavisita,
	':tratamiento1' => $tratamiento1,
	':tratamiento2' => $tratamiento2,
	':vacuna1' => $vacuna1,
	':fechaVacuna1' => $fechavacuna1,
	':vacuna2' => $vacuna2,
	':fechaVacuna2' => $fechavacuna2,
	':observaciones' => $observaciones,
	':mascota_id' => $mascota_id));
	$resultadoDatos = $statementDatos->fetch();
	print_r($resultadoDatos);
	

}
}



require 'views/registrar_mascota.view.php';
?>