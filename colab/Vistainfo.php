
<?php include("cabecera.php"); ?>
<?php include("sidebar.php"); ?>
<?php 
include '../global/config.php';
include '../global/conexion.php';
?>






<?php
$mostrarModal = false;


if (!isset($_SESSION['rol'])) {
    header('location: ../login.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: ../login.php');
    }
}
$id = $_SESSION['id'];
$a = $_SESSION['nombre'];
 
?>




  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <strong> <h1 class="m-0 text-dark">Nuestras mascotas</h1></strong>
            <h4 class="m-0 text-dark">Aquí podrás ver las mascotas registradas y su información</h4>
            <h5 class="m-0 text-dark">Como sus Vacunas y demás</h5>
           
          </div>

          <div class="col-sm-2" <?php ?> >
          <a class="btn btn-outline-success btn-lg" href="Vistaregistrarmascota.php" role="button">Agregar una mascota  + </a>
          </div>
          
          
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              <li class="breadcrumb-item active">Pets life v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content : aquí se mostrarán las mascotas de cada usuario-->
    <section class="content" >
   



<section class="seccionMascotas" id="seccionMascotas">
  

<div class="container" id="contenedor">





<?php


$styleH='';

$sentencia = $pdo->prepare("SELECT * FROM mascota ORDER BY id DESC");
$sentencia->execute();

$listaMascotas = $sentencia->fetchAll(PDO::FETCH_ASSOC);



if(empty($listaMascotas)==true){

  $styleH='';


}
else{
  $styleH='style="display: none"';

}

$conexion = new PDO('mysql:host=localhost;dbname=mascotas', 'root', '');

?>


        <div class="row">

        


            <?php foreach ($listaMascotas as $mascota) { ?>

            
              <?php //consulta de la hoja de vida
                  $statementHoja = $conexion->prepare('SELECT * FROM datosmascota WHERE mascota_id = :id LIMIT 1');
                  $statementHoja->execute(array(':id' => $mascota['id']));
                  $datosMascota = $statementHoja->fetch();
                  //print_r( $datosMascota);
                  ?>

                <!-- template de imagen para mascota  -->
                <div class="col-md-9 justify-content-center">
                
                    <div class="card w-200">

                        <img  title="<?php echo $mascota['Nombre']; ?>" 
                            alt="<?php echo $mascota['Nombre'];  ?>" 
                            class="card-img-top"
                            class="img-thumbnail" width="100px"  height="300px" src="../imagenes/<?php echo $mascota['foto'];?>" 
                            data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php echo $mascota['Raza'];  ?>" height="317px"
                         />

                     
                         <div class="card-body w-200">

                                      <span>Raza: <?php echo $mascota['Raza'];  ?></span>
                                    </br>
                                    <span><h5 class="card-title">Nombre: <?php echo $mascota['Nombre'];  ?></h5></span>  

                                <?php     


                                  $statement2 = $conexion->prepare('SELECT Nombre FROM animal WHERE id = :id LIMIT 1');
                                  $statement2->execute(array(':id' => $mascota['animal_id']));
                                  $resultado2 = $statement2->fetch();
                              
                                  $animal_nombre=$resultado2['Nombre']; ?>
                                      <p class="card-text" name="animal"> <?php echo $animal_nombre  ?></p>

                
                        </div>
                    </div>




                    

              <div class="row justify-content-center" id="formSelected">

<div class="col">
  <p> <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Desplegar datos
    </button></p>
</div>
</div>


<div class="collapse" id="collapseExample">
<div class="card card-header">
  <h3 class="titulo">Otros Datos importantes de <?php echo $mascota['Nombre'];  ?>!!</h3>
</div>

<div class="card card-body">


  <!-- Datos para desplegar-->

<table class="table">
<thead>
<tr>  
<th colspan="3" >Información Basica</th>
</tr>
<tr>

<th scope="col">Sexo</th>
<th scope="col">Peso</th>
<th scope="col">Alergias</th>
</tr>
</thead>
<tbody>
<tr>

<td><?php if(empty($datosMascota['sexo'])){echo "No registra"; } else{ echo $datosMascota['sexo'];}?></td>
<td><?php if(empty($datosMascota['peso'])){echo "No registra"; } else{ echo $datosMascota['peso'];}?></td>
<td><?php if(empty($datosMascota['alergias'])){echo "Ninguna"; } else{ echo $datosMascota['alergias'];}?></td>
</tr>


<tr>  
<th colspan="3" >Su salud</th>
</tr>
<tr>
<th scope="col">Ultima visita al veterinario</th>
<th scope="col">Proxima visita al veterinario</th>
</tr>
<tr>
<td><?php if(empty($datosMascota['ultimaVisita'])){echo "No registra"; } else{ echo $datosMascota['ultimaVisita'];}?></td>
<td><?php if(empty($datosMascota['proximaVisita'])){echo "No registra"; } else{ echo $datosMascota['proximaVisita'];}?></td>
</tr>


<tr>  
<th colspan="2" >Tratamientos</th>
</tr>
<tr>
<th scope="col">Tratamiento 1</th>
<td><?php if(empty($datosMascota['tratamiento1'])){echo "No registra"; } else{ echo $datosMascota['tratamiento1'];}?></td>
</tr>
<tr>
<th scope="col">Tratamiento 2</th>
<td><?php if(empty($datosMascota['tratamiento2'])){echo "No registra"; } else{ echo $datosMascota['tratamiento2'];}?></td>
</tr>


<tr>  
<th colspan="2" >Vacunas</th>
</tr>
<tr>
<th scope="col">Vacuna 1</th>
<td><?php if(empty($datosMascota['vacuna1'])){echo "No registra"; } else{ echo $datosMascota['vacuna1']." "."<strong>Fecha</strong>".$datosMascota['fechaVacuna1'];}?></td>
</tr>
<tr>
<th scope="col">Vacuna 2</th>
<td><?php if(empty($datosMascota['vacuna2'])){echo "No registra"; } else{ echo $datosMascota['vacuna2']." "."<strong>Fecha</strong>".$datosMascota['fechaVacuna2'];}?></td>
</tr>

<tr>
<th scope="col">Observaciones</th>
<td><?php if(empty($datosMascota['observaciones'])){echo "No registra"; } else{ echo $datosMascota['observaciones'];}?></td>
</tr>

          






</tbody>
</table>
</div>
            </div>


             
           
                  
                </div>
                <!--  fin template de imagen  -->


            <?php } ?>











        </div>


        <div class="row justify-content-center" <?php echo $styleH;?> >
        <strong><h1>Al parecer No has ocurrido un error</h1></strong>
     
 
        </div>

        <div class="row justify-content-center" <?php echo $styleH;?>>
     <img src="../imagenes/icon/person_error.svg" alt="erro image" width="500px" height="500px"  >
        </div>
       

        


    </div>
</section>




    </section>
    <!-- /.content -->
  </div>





  <!-- /.content-wrapper -->
 



  <?php include("piePagina.php");?>