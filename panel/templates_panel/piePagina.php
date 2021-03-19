<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>




  
  <script>
  /*  $('#exampleModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})                */
  </script>


<?php   /* if($mostrarModal){ ?>

<script>
  $('#exampleModal').modal('show');
</script>

<?php }    */?>



  <script>
  /*  $('#exampleModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})            */
  </script> 




  <script>
  /*  $('#modal-registro').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})   */
  </script> 

  
<?php   /* if($mostrarModal){ ?>

<script>
  //$('#modal-registro').modal('show');
   $('#exampleModal').modal('show');
</script>

<?php }    */?>




<script>
  /*  $('#modalPublicacion').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})   */
  </script> 

  
<?php   /* if($mostrarModal){ ?>

<script>
  $('#modalPublicacion').modal('show');
</script>

<?php }    */?>






 


<script >
  $(function(){

$('.validanumericos').keypress(function(e) {
if(isNaN(this.value + String.fromCharCode(e.charCode))) 
   return false;
})
.on("cut copy paste",function(e){
e.preventDefault();
});

});
</script>






<script src="plugins/jquery/jquery.min.js">$('.collapse').collapse() </script>

<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    $('.dropdown-toggle').dropdown()
</script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
