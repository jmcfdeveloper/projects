<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$n = $_POST['Nombre'];
}


$n = (isset($_POST['Nombre'])) ? $_POST['Nombre'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin</title>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h1 class="titulo">Registra una a tu mascota!!</h1>

			<h5 class="titulo">Información basica</h5>

			<form class="form align-items-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login" enctype="multipart/form-data">

				<div class="form-group">
					<input type="text" REQUIRED name="Nombre" class="form-control" placeholder="Nombre">
				</div>

				<div class="form-group">
					<input type="text" REQUIRED name="Raza" class="form-control" placeholder="Raza">
				</div>

				<div>
					<select class="custom-select" data-style="btn-primary" REQUIRED name="Animal">
						<?php include 'conexion_animales.php';

						$consulta = "SELECT * FROM animal ";
						$ejecutar = mysqli_query($conexion, $consulta);
						?>
						<?php foreach ($ejecutar as $opciones) : ?>
							<option value="<?php echo $opciones['Nombre'] ?>" class="form-control"><?php echo $opciones['Nombre'] ?> </option>
						<?php endforeach ?>
					</select>
				</div>
				</br>

				<div class="form-group">
					<input class="form-control" type="file" accept="image/*" name="Imagen" id="Imagen" class="form-control" placeholder="Inserte imagen">
				</div>




				<!--Pidiendo el despligue del reso de la hoja de vida de la mascota-->
				<div class="row justify-content-center" id="formSelected">

					<div class="col-md-3">
						<p> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								Desplegar formulario
							</button></p>
					</div>
				</div>

				<div class="collapse" id="collapseExample">
					<div class="card card-header">
						<h3 class="titulo">Ayudanos a completar la información de detu mascota!!</h3>
					</div>

					<div class="card card-body">



						<label for="">Sexo</label>

						<div class="form-check">
							<input class="form-check-input" type="radio" REQUIRED name="genero" id="exampleRadios1" value="masculino" checked>
							<label class="form-check-label" for="exampleRadios1">
								Masculino
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" REQUIRED name="genero" id="exampleRadios2" value="femenino">
							<label class="form-check-label" for="exampleRadios2">
								Femenino
							</label>
						</div>



						<label for="">Otros datos</label>


						<div class="form-group">
							<input type="text"  name="Alergias" class="form-control" placeholder="Alergias">
						</div>
						<div class="form-group">


							<div class="input-group mb-3">
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
								<input type="text"  name="Peso" class="validanumericos"  placeholder="Peso">
								<div class="input-group-prepend">
									<span class="input-group-text">kg</span>

								</div>

							</div>

						</div>
						<label for="">Ultima visita al veterinario</label>
						<div class="form-group">
							<input type="date" name="Ultimavisita" class="form-control" placeholder="Ultima visita al veterinario" value="2020-01-01" min="2000-01-01" max="2022-12-31">
						</div>
						<label for="">Proxima visita al veterinario</label>
						<div class="form-group">
							<input type="date" name="Proximavisita" class="form-control" placeholder="Proxima visita al veterinario" value="2020-01-01" min="2020-5-26" max="2025-12-31">
						</div>

						<label for="">Tratamientos</label>
						<div class="form-group">
							<input type="text" name="Tratamiento1" class="form-control" placeholder="Tratamiento 1">
						</div>
						<div class="form-group">
							<input type="text" name="Tratamiento2" class="form-control" placeholder="Tratatamiento 2">
						</div>



						<label for="">Vacunas</label>
						<div class="form-group">
							<input type="text" name="Vacuna1" class="form-control" placeholder="Vacuna 1">
							<input type="date" name="Fechavacuna1" class="form-control" value="2020-01-01" min="2000-01-01" max="2022-12-31">
						</div>
						<div class="form-group">
							<input type="text"  name="Vacuna2" class="form-control" placeholder="Vacuna 2">
							<input type="date" name="Fechavacuna2" class="form-control" value="2020-01-01" min="2000-01-01" max="2022-12-31">
						</div>
						<label for="">Observaciones</label>
						<div class="form-group">
							<textarea type="textarea" name="Observaciones" class="form-control" placeholder="¿Alguna información adicional?"></textarea>
						</div>


						<div class="container">

							<div class="row justify-content-md-center">

								<div class class="col-md-6">
									<button type="button" alignment="center" class="btn btn-success" onclick="login.submit()" data-toggle="modal" data-target="#modal-added" name="accion" value="btnRegistrar">Registra tu mascota</button>
								</div>

								<div class class="col-md-6">
									<a href="./Vistamismascotas.php"><button type="button" alignment="center" class="btn btn-danger">Descartar</button></a>

								</div>

								<div class="w-100"></div>


							</div>

						</div>




					</div>
				</div>

				<!--fin de: Pidiendo el despligue del reso de la hoja de vida de la mascota-->




























				<!--Mensaje de error -->
				<?php if (!empty($errores)) : ?>
					<div>
						<ul>
							<?php echo $errores; ?>
						</ul>
					</div>
				<?php endif; ?>
			</form>


			<div class="modal fade" id="modal-registro">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Su mascota ha sido registrada</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="row mb-6">
								<div class="col-sm-6">
									<img src="../imagenes/icon/cat-add.svg" alt="insertar SVG con la etiqueta image" width="450px" height="200px">
								</div>
							</div>



						</div>
						<div class="modal-footer justify-content-between">




							<div class="col-sm-12">
								<button type="button" class="btn btn-success btn-lg btn-block"><a href="Vistamismascotas.php" style="color: #FFFFFF;">Entendido!!</a> </button>
							</div>



						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>






			<p>
				<br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>



			</p>
		</div>
	</div>
</body>

</html>