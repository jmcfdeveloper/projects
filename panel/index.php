<?php include("modulos/index.php");?>
<?php include("templates_panel/cabecera_colab.php"); ?>
<?php //include("templates_panel/sidebar_colab.php"); ?>

<section class="principal">

	<h1>BUSQUEDA DE JUGADORES</h1>


	
	<div class="col-sm-12">
                  <button value="btnCancelar" type="submit" class="btn btn-outline-danger btn-lg btn-block" name="accion">Cancelar</button>
 	</div>



	<div class="formulario">
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>

		
	</div>


	<div class="row">

	<div class="col-1"></div>
	<div class="col-10"><div id="datos"  class="card-body table-responsive p-0"></div>
	  </div>
	<div class="col-1"></div>


	</div>
	
	
</section>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>




<?php include("templates_panel/piePagina.php"); ?>


