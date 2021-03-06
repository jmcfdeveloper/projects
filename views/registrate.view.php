<?php
include 'templates/cabecera.php';
$Imagen = (isset($_FILES['Imagen']["name"])) ? $_FILES['Imagen']["name"] : "";

?>


<!DOCTYPE html>


<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Registrate</title>
</head>

<body>
	<div>
		<div class="row">

			<div class="col-2">

			</div>

			<div class="col-8">

				<h1 class="titulo">Registrate</h1>




				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login" enctype="multipart/form-data">

					<div class="form-group">
						<input type="text" name="Nombre" class="form-control" placeholder="Nombres">
					</div>

					<div class="form-group">
						<input type="text" name="Apellido" class="form-control" placeholder="Apellido">
					</div>


					<div class="form-group">
						<input id="email" type="email" class="form-control" name="Correo" placeholder="correo">

					</div>

					<div class="form-group">
						<input type="text" name="usuario" class="form-control" placeholder="Usuario">
					</div>

					<div>
						<input type="password" name="password" class="form-control" placeholder="Contraseña">
					</div>

					<div class="form-group">

						<input type="password" name="password2" class="form-control" placeholder="Confirmar Contraseña"><br><br>


						<!--
			<?php /*if($Imagen!=""){*/ ?>
                  <br/>
                  <br/>
                  
                  <img class="img-thumbnail rounded mx-auto d-block" width="200px" src="../imagenes/<?php //echo $txtfoto;
																									?>" alt="Si ves esto es porque salió mal"/>
                  <br/>
                  <br/>
                <?php // }
				?>


			<input class="form-control"  type="file" accept="image/*" REQUIRED name="Imagen" id="Imagen" class="form-control" placeholder="Inserte imagen"> -->



						</br>
						<button type="button" class="btn btn-dark" onclick="login.submit()">Registrate</button>
					</div>





					<!--Mensaje de error -->
					<?php if (!empty($errores)) : ?>
						<div>
							<ul>
								<?php echo $errores; ?>
							</ul>
						</div>
					<?php endif; ?>
				</form>



				<p>
					¿Ya tienes cuenta? <br>
					<a href="./login.php">Iniciar Sesión</a>
				</p>



			</div>

			<div class="col-2">

			</div>
		</div>

	</div>



</body>

</html>