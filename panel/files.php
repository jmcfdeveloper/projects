<?php include("modulos/files.php"); ?>
<?php include("templates_panel/cabecera_colab.php"); ?>

<?php


                $sentenciaSQL_comprobante = $pdo->prepare("SELECT * FROM `trabajadores` WHERE  id=" . $_GET['id']);
                $sentenciaSQL_comprobante->execute();
                $comprobante = $sentenciaSQL_comprobante->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Comprobante de <?php echo $comprobante[0]['primer_nombre']." ".$comprobante[0]['segundo_nombre']." ".$comprobante[0]['primer_apellido']." "?></h1>
                </div><!-- /.col -->
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Comprobante</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 
       
            

                
                 <?php

               // print_r($comprobante[0]['id']);

                if ($comprobante != "") {

                    if ($comprobante[0]['comprobante'] == "") { ?>


                            <div class="container">
                            <div class="row">
                                <div class="col align-self-start">
                                
                                </div>
                                <div class="col align-self-center">
                                <img src="../imagenes/icon/pdf2.svg" alt="imagen de pdf" width="250px" height="300px">
                                 <p style="color:#F91839";><strong>El trabajador no tiene comprobante</strong></p>
                                
                                </div>
                                <div class="col align-self-end">
                               
                                </div>
                            </div>
                            </div>


                    <?php } else { ?>

                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="../docs/<?php echo $comprobante[0]['comprobante']; ?>" allowfullscreen></iframe>
                        </div>



                <?php }
                } ?>

















            
            <!-- /.row -->
       <!-- /.container-fluid -->
  
    <!-- /.content -->

<!-- /.content-wrapper -->

<?php include("footer.php"); ?>