<?php include("modulos/trabajadores.php"); ?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php


$conexion = new PDO('mysql:host=localhost;dbname=registro', 'root', 'Acdc1004966557');


$idSeleccionado = (isset($_POST['variable1'])) ? $_POST['variable1'] : "";


$varTemp;


$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtIdentificacion = (isset($_POST['txtIdentificacion'])) ? $_POST['txtIdentificacion'] : "";
$txtTipo_identificacion = (isset($_POST['txtTipo_identificacion'])) ? $_POST['txtTipo_identificacion'] : "";
$txtDigito_v = (isset($_POST['txtDigito_v'])) ? $_POST['txtDigito_v'] : "";
$txtPrimer_apellido = (isset($_POST['txtPrimer_apellido'])) ? $_POST['txtPrimer_apellido'] : "";
$txtSegundo_apellido = (isset($_POST['txtSegundo_apellido'])) ? $_POST['txtSegundo_apellido'] : "";
$txtPrimer_nombre = (isset($_POST['txtPrimer_nombre'])) ? $_POST['txtPrimer_nombre'] : "";
$txtSegundo_nombre = (isset($_POST['txtSegundo_nombre'])) ? $_POST['txtSegundo_nombre'] : "";
$txtForma_pago = (isset($_POST['txtForma_pago'])) ? $_POST['txtForma_pago'] : "";
$txtBanco = (isset($_POST['txtBanco'])) ? $_POST['txtBanco'] : "";
$txtTipo_cuenta = (isset($_POST['txtTipo_cuenta'])) ? $_POST['txtTipo_cuenta'] : "";
$txtNo_cuenta = (isset($_POST['txtNo_cuenta'])) ? $_POST['txtNo_cuenta'] : "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";
$txtComprobante = (isset($_FILES['txtComprobante']["name"])) ? $_FILES['txtComprobante'] : "";
$txtPrev = (isset($_POST['txtPrev'])) ? $_POST['txtPrev'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$prev = (isset($_POST['prev'])) ? $_POST['prev'] : "";

$modal = (isset($_POST['modal'])) ? $_POST['modal'] : "";



$accionAgregar = "";
$accionModificar = $accionCancelar = "disabled";
$mostrarModal = false;



switch ($accion) {

	case "btnAgregar":



		$fecha = new DateTime();
		$nombreArchivo = ($txtComprobante != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtComprobante"]["name"] : "default.pdf";

		$tmp_pdf = $_FILES['txtComprobante']['tmp_name'];



		if ($tmp_pdf != "") {
			move_uploaded_file($tmp_pdf, "../docs/" . $nombreArchivo);
		} else {

			$nombreArchivo = "default.pdf";
		}

		$statement = $conexion->prepare('INSERT INTO trabajadores (id , Identificacion, tipo_id, digito_v, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, forma_pago , banco , tipo_cuenta , no_cuenta , correo , comprobante) VALUES (null, :Identificacion,:tipo_id, :digito_v, :primer_apellido, :segundo_apellido, :primer_nombre, :segundo_nombre , :forma_pago , :banco , :tipo_cuenta , :no_cuenta , :correo , :comprobante)');
		$statement->execute(array(
			':Identificacion' => $txtIdentificacion,
			':tipo_id' => $txtTipo_identificacion,
			':digito_v' => $txtDigito_v,
			':primer_apellido' => $txtPrimer_apellido,
			':segundo_apellido' => $txtSegundo_apellido,
			':primer_nombre' => $txtPrimer_nombre,
			':segundo_nombre' => $txtSegundo_nombre,
			':forma_pago' => $txtForma_pago,
			':banco' => $txtBanco,
			':tipo_cuenta' => $txtTipo_cuenta,
			':no_cuenta' => $txtNo_cuenta,
			':correo' => $txtCorreo,
			':comprobante' => $nombreArchivo
		));


		#$tipo = $_FILES['txtComprobante']['type'];
		#$size = $_FILES['txtComprobante']['size'];
		#$ruta = $_FILES['txtComprobante']['tmp_name'];


		$url = 'index.php';
		echo '<meta http-equiv=refresh content="1; ' . $url . '">';


		break;

	case "btnEditar":


		$txtIDE = (isset($_POST['txtIDE'])) ? $_POST['txtIDE'] : "";
		$txtIdentificacionE = (isset($_POST['txtIdentificacionE'])) ? $_POST['txtIdentificacionE'] : "";
		$txtTipo_identificacionE = (isset($_POST['txtTipo_identificacionE'])) ? $_POST['txtTipo_identificacionE'] : "";
		$txtDigito_vE = (isset($_POST['txtDigito_vE'])) ? $_POST['txtDigito_vE'] : "";
		$txtPrimer_apellidoE = (isset($_POST['txtPrimer_apellidoE'])) ? $_POST['txtPrimer_apellidoE'] : "";
		$txtSegundo_apellidoE = (isset($_POST['txtSegundo_apellidoE'])) ? $_POST['txtSegundo_apellidoE'] : "";
		$txtPrimer_nombreE = (isset($_POST['txtPrimer_nombreE'])) ? $_POST['txtPrimer_nombreE'] : "";
		$txtSegundo_nombreE = (isset($_POST['txtSegundo_nombreE'])) ? $_POST['txtSegundo_nombreE'] : "";
		$txtForma_pagoE = (isset($_POST['txtForma_pagoE'])) ? $_POST['txtForma_pagoE'] : "";
		$txtBancoE = (isset($_POST['txtBancoE'])) ? $_POST['txtBancoE'] : "";
		$txtTipo_cuentaE = (isset($_POST['txtTipo_cuentaE'])) ? $_POST['txtTipo_cuentaE'] : "";
		$txtNo_cuentaE = (isset($_POST['txtNo_cuentaE'])) ? $_POST['txtNo_cuentaE'] : "";
		$txtCorreoE = (isset($_POST['txtCorreoE'])) ? $_POST['txtCorreoE'] : "";
		$txtComprobanteE = (isset($_FILES['txtComprobanteE']["name"])) ? $_FILES['txtComprobanteE'] : "";

		/* 	echo "<script>alert('".$txtIDE."-"
		.$txtIdentificacionE.""
		.$txtTipo_identificacionE."-"
		.$txtDigito_vE."-"
		.$txtPrimer_apellidoE."-"
		.$txtSegundo_apellidoE."-"
		.$txtPrimer_nombreE."-"
		.$txtSegundo_nombreE ."-"
		.$txtForma_pagoE ."-"
		.$txtBancoE ."-"
		.$txtTipo_cuentaE."-"
		.$txtNo_cuentaE."-"
		.$txtCorreoE."')</script>"; */


	//	print_r( $_POST);

		$statementEditar = $conexion->prepare('UPDATE trabajadores SET 
      Identificacion=:IdentificacionE, 
      tipo_id=:tipo_idE, 
      digito_v=:digito_vE,
      primer_apellido=:primer_apellidoE, 
      segundo_apellido=:segundo_apellidoE,
      primer_nombre=:primer_nombreE,
      segundo_nombre=:segundo_nombreE,
      forma_pago=:forma_pagoE,
      banco=:bancoE,
      tipo_cuenta=:tipo_cuentaE,
      no_cuenta=:no_cuentaE,
      correo=:correoE WHERE
      id=:idE');



		$statementEditar->execute(array(
			':IdentificacionE' => $txtIdentificacionE,
			':tipo_idE' => $txtTipo_identificacionE,
			':digito_vE' => $txtDigito_vE,
			':primer_apellidoE' => $txtPrimer_apellidoE,
			':segundo_apellidoE' => $txtSegundo_apellidoE,
			':primer_nombreE' => $txtPrimer_nombreE,
			':segundo_nombreE' => $txtSegundo_nombreE,
			':forma_pagoE' => $txtForma_pagoE,
			':bancoE' => $txtBancoE,
			':tipo_cuentaE' => $txtTipo_cuentaE,
			':no_cuentaE' => $txtNo_cuentaE,
			':correoE' => $txtCorreoE,
			':idE' => $txtIDE
		));



		$fecha = new DateTime();
		$nombreArchivo = ($txtComprobanteE != "")?$fecha->getTimestamp()."_". $_FILES["txtComprobanteE"]["name"]:"default.pdf";
	
		$tmp_pdf = $_FILES['txtComprobanteE']['tmp_name'];

	

	
		if ($tmp_pdf != "") {
		  move_uploaded_file($tmp_pdf, "../docs/" . $nombreArchivo);
		  $statement = $conexion->prepare('UPDATE trabajadores SET
		  comprobante=:comprobante WHERE id=:id');
	  
			  $statement->execute(array(':comprobante' => $nombreArchivo, ':id' => $txtID));
			
		}
		   



/* 
		$statementEditarComprobante = $conexion->prepare('UPDATE trabajadores SET 
		comprobante=:comprobanteE WHERE
		id=:idE');

		$statementEditar->execute(array(
			':comprobanteE' => $txtComprobanteE,
			':idE' => $txtIDE
		));
 */




/* 		validación de la foto para editarla */

 

		/**  fin de validación de la foto para editarla*/
		/* 
	 	$url = 'index.php';
		echo '<meta http-equiv=refresh content="1; ' . $url . '">';
 */

		break;


	case "btnCancelar":
		$url = 'index.php';
		echo '<meta http-equiv=refresh content="1; ' . $url . '">';


		break;


	case "Seleccionar":


		break;
}




?>

<div class="content-wrapper">
	<section class="content">

		<div class="row">

			<!-- formulario para agregar usuarios -->
			<form action="" method="post" enctype="multipart/form-data">





				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ingrese los datos para agregar un trabajador</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">


								<div class="form-row">

									<input class="form-control" type="hidden" name="txtID" placeholder="" id="txtID" value="<?php echo $txtID; ?>" require="">



									<div class="form-group col-md-6">
										<label for="">Identificación:</label>
										<input class="form-control" type="number" required name="txtIdentificacion" placeholder="" id="txtIdentificacion" value="<?php echo $txtIdentificacion; ?>" require="" min="11111" max="999999999999">

									</div>

									<div class="form-group col-md-6">
										<label for="">Tipo de Identificación</label>
										<select class="form-control" name="txtTipo_identificacion" id="txtTipo_identificacion">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM identificacion ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>






									<label for="">Digito V:</label>
									<input class="form-control" type="number" name="txtDigito_v" placeholder="" id="txtDigito_v" value="<?php echo $txtDigito_v; ?>">




									<div class="form-group col-md-6">
										<label for="">Primer Apellido:</label>
										<input class="form-control" type="text" required name="txtPrimer_apellido" placeholder="" id="txtPrimer_apellido" value="<?php echo $txtPrimer_apellido; ?>" require="">

									</div>

									<div class="form-group col-md-6">
										<label for="">Segundo Apellido:</label>
										<input class="form-control" type="text" required name="txtSegundo_apellido" placeholder="" id="txtSegundo_apellido" value="<?php echo $txtSegundo_apellido; ?>" require="">

									</div>

									<div class="form-group col-md-6">
										<label for="">Primer Nombre:</label>
										<input class="form-control" type="text" name="txtPrimer_nombre" placeholder="" id="txtPrimer_nombre" required value="<?php echo $txtPrimer_nombre; ?>" require="">


									</div>

									<div class="form-group col-md-6">
										<label for="">Segundo Nombre:</label>
										<input class="form-control" type="text" name="txtSegundo_nombre" placeholder="" id="txtSegundo_nombre" value="<?php echo $txtSegundo_nombre; ?>">

									</div>

									<div class="form-group col-md-6">
										<label for="">Forma de pago</label>
										<select class="form-control" name="txtForma_pago" id="txtSegundo_nombre">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM tipo_pago ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo_pago'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>

									<div class="form-group col-md-6">
										<label for="">Banco</label>
										<select class="form-control" name="txtBanco" id="txtBanco">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM bancos ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['banco'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>


									<div class="form-group col-md-6">
										<label for="">Tipo de Cuenta</label>
										<select class="form-control" name="txtTipo_cuenta" id="txtTipo_cuenta">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM tipo_cuenta ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo_cuenta'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label for="">Numero de Cuenta:</label>
										<input class="form-control" type="number" name="txtNo_cuenta" placeholder="" id="txtNo_cuenta" required value="<?php echo $txtNo_cuenta; ?>" require="">
									</div>









									<label for="">Correo:</label>
									<input class="form-control" type="email" name="txtCorreo" placeholder="micorreo@gmail.com" id="txtCorreo" value="<?php echo $txtCorreo; ?>">

									<label for="">Adjuntar comprobante:</label>
									<input class="form-control" type="file" accept=".pdf" name="txtComprobante" placeholder="comprobante" id="txtComprobante" value="" data-toggle="tooltip" data-placement="top" title="Cargue su Comprobante en Formato PDF" required>





								</div>

								<div class="modal-footer">


									<div class="row">

										<div class="col-4"> <button value="btnCancelar" type="submit" <?php echo $accionCancelar ?> class="btn btn-outline-danger btn-sm" name="accion">Cancelar</button></div>
										<div class="col-4"> <button value="btnModificar" type="submit" <?php echo $accionModificar ?> class="btn btn-outline-primary btn-sm" name="accion">Editar</button></div>
										<div class="col-4"><button value="btnAgregar" type="submit" <?php echo $accionAgregar ?> class="btn btn-outline-success btn-sm" name="accion">Agregar</button></div>






									</div>

								</div>
							</div>
						</div>
					</div>

					<br>
					<br>



			</form>



		</div>


		<div class="row">



			<script>
				$(document).on("click", "#btnModalEditar", function() {
					//var nombre=$(this).data('nom');
					var id = $(this).data('id');
					var identificacion = $(this).data('identificacion');
					var tipo_id = $(this).data('tipo_id');
					var digito_v = $(this).data('digito_v');
					var primer_apellido = $(this).data('primer_apellido');
					var segundo_apellido = $(this).data('segundo_apellido');
					var primer_nombre = $(this).data('primer_nombre');
					var segundo_nombre = $(this).data('segundo_nombre');
					var forma_pago = $(this).data('forma_pago');
					var banco = $(this).data('banco');
					var no_cuenta = $(this).data('no_cuenta');
					var correo = $(this).data('correo');
					var comprobante = $(this).data('comprobante');

					//var apellido=$(this).data('ape');

					$("#txtIDE").val(id);
					$("#txtIdentificacionE").val(identificacion);
					$("#txtTipo_idE").val(tipo_id);
					$("#txtDigito_vE").val(tipo_id);
					$("#txtPrimer_apellidoE").val(primer_apellido);
					$("#txtSegundo_apellidoE").val(segundo_apellido);
					$("#txtPrimer_nombreE").val(primer_nombre);
					$("#txtSegundo_nombreE").val(segundo_nombre);
					$("#txtForma_pagoE").val(forma_pago);
					$("#txtBancoE").val(banco);
					$("#txtNo_cuentaE").val(no_cuenta);
					$("#txtCorreoE").val(correo);
					$("#txtComprobanteE").val(comprobante);

				})
			</script>




			<form action="" method="post" enctype="multipart/form-data">





				<!-- Modal para editar-->
				<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">


								<div class="form-row">

									<input class="form-control" type="hidden" name="txtIDE" placeholder="" id="txtIDE" value="<?php //echo $txtID; ?>" require="">



									<div class="form-group col-md-6">
										<label for="">Identificación:</label>

										<input class="form-control" type="number" required name="txtIdentificacionE" placeholder="" id="txtIdentificacionE" value="<?php //echo $txtIdentificacion; ?>" require="" max="11111" min="99999999999">


									</div>

									<div class="form-group col-md-6">
										<label for="">Tipo de Identificación</label>
										<select class="form-control" name="txtTipo_identificacionE" id="txtTipo_identificacionE">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM identificacion ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>






									<label for="">Digito V:</label>
									<input class="form-control" type="number" name="txtDigito_vE" placeholder="" id="txtDigito_vE" value="<?php //echo $txtDigito_v; ?>">




									<div class="form-group col-md-6">
										<label for="">Primer Apellido:</label>
										<input class="form-control" type="text" required name="txtPrimer_apellidoE" placeholder="" id="txtPrimer_apellidoE" value="<?php //echo $txtPrimer_apellido; ?>" require="">

									</div>

									<div class="form-group col-md-6">
										<label for="">Segundo Apellido:</label>
										<input class="form-control" type="text" required name="txtSegundo_apellidoE" placeholder="" id="txtSegundo_apellidoE" value="<?php //echo $txtSegundo_apellido; ?>" require="">

									</div>

									<div class="form-group col-md-6">
										<label for="">Primer Nombre:</label>
										<input class="form-control" type="text" name="txtPrimer_nombreE" placeholder="" id="txtPrimer_nombreE" required value="<?php //echo $txtPrimer_nombre; ?>" require="">


									</div>

									<div class="form-group col-md-6">
										<label for="">Segundo Nombre:</label>
										<input class="form-control" type="text" name="txtSegundo_nombreE" placeholder="" id="txtSegundo_nombreE" value="<?php //echo $txtSegundo_nombre; ?>">

									</div>

									<div class="form-group col-md-6">
										<label for="">Forma de pago</label>
										<select class="form-control" name="txtForma_pagoE" id="txtSegundo_nombreE">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM tipo_pago ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo_pago'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>

									<div class="form-group col-md-6">
										<label for="">Banco</label>
										<select class="form-control" name="txtBancoE" id="txtBancoE">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM bancos ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['banco'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>


									<div class="form-group col-md-6">
										<label for="">Tipo de Cuenta</label>
										<select class="form-control" name="txtTipo_cuentaE" id="txtTipo_cuentaE">
											<?php include 'global/conexion_trabajadores_select.php';


											$consulta = "SELECT * FROM tipo_cuenta ";
											$ejecutar = mysqli_query($conexion, $consulta);
											mysqli_close($conexion);
											?>
											<?php foreach ($ejecutar as $opciones) : ?>
												<option value="<?php echo $opciones['codigo'] ?>" class="form-control"><?php echo $opciones['tipo_cuenta'] ?> </option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label for="">Numero de Cuenta:</label>
										<input class="form-control" type="number" name="txtNo_cuentaE" placeholder="" id="txtNo_cuentaE" required value="<?php //echo $txtNo_cuenta; ?>" require="">
									</div>









									<label for="">Correo:</label>
									<input class="form-control" type="email" name="txtCorreoE" placeholder="micorreo@gmail.com" id="txtCorreoE" value="<?php //echo $txtCorreo; ?>">




									<label for="">Adjuntar comprobante:</label>
									<input class="form-control" type="file"  accept=".pdf" name="txtComprobanteE" placeholder="comprobante" id="txtComprobanteE" value="" data-toggle="tooltip" data-placement="top" title="Cargue su comprobante en Formato PDF">





								</div>

								<div class="modal-footer">


									<div class="row">


										<div class="col-6"> <button value="btnEditar" type="submit" class="btn btn-outline-primary btn-sm" name="accion">Editar</button></div>


									</div>

								</div>
							</div>
						</div>
					</div>










					<!--  <div class="form-group">
          <div class="row">
            <div class="col-4"><label for="">Comprobante:</label> </div>

            <div class="col-8"> <input class="form-control" type="file" accept=".pdf" name="txtComprobante"  id="txtComprobante" value="<?php echo $txtComprobante; ?>"> </div>
          </div>
          <div class="row">
            <iframe src="../docs/<?php #echo $usuario['comprobante']; 
									?>" frameborder="0"></iframe>
          </div>
        </div>  -->


					<br>
					<br>



			</form>



		</div>







		<div class="container">



			<div class="row">
				<div class="col-1 align-self-start">

				</div>
				<div class="col-8 align-self-center">
					<h1><strong>Busqueda de trabajadores</strong></h1>
				</div>
				<div class="col-3 align-self-end">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						Agregar trabajador +
					</button>

				</div>

			</div>
			<div class="mb-4">

				<!-- Solid divider -->
				<hr class="solid">
			</div>

			<div class="row">
				<div class="col-4"></div>
				<div class="col-8">

					<div class="formulario">
						<label for="caja_busqueda">Buscar</label>
						<input type="text" name="caja_busqueda" id="caja_busqueda"></input>


					</div>
				</div>
			</div>

			<div class="row">


				<div class="col-1"></div>
				<div class="col-11">
					<div id="datos">
					</div>

					<br><br>
					<br><br>
					<br>
				</div>

			</div>










		</div>


	






	</section>







	<!-- Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label for="nombre">Nombre:</label>
					<input type="text" name="" id="nombre">
					<label for="apellido">Apellido</label>
					<input type="text" name="" id="apellido">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>


	<!-- 	modal para previsualizar el pdf -->
	<div class="bs-example">
		<!-- Button HTML (to Trigger Modal) -->
		<!--    <a href="#myModal" class="btn btn-primary btn-lg" data-toggle="modal">Launch Demo Modal</a> -->

		<!-- Modal HTML -->
		<!-- <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">YouTube Video</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
					<label for="">Fuente 1</label>
					<input type="text" value="" id="txtFuente">
					<label for="">Fuente 2</label>
					<input type="text" value="" id="txtFuente2">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="" allowfullscreen></iframe>
                  </div>
                </div>
            </div>
        </div>
    </div> -->
	</div>



	<!-- 	modal para previsualizar el pdf -->





</div>



<script type="text/javascript" src="js2/jquery.min.js"></script>
<script type="text/javascript" src="js2/main.js"></script>
<?php include("footer.php"); ?>