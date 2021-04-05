
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


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

<script>
$(document).ready(function (e) {
  $('#myModal').on('show.bs.modal', function(e) {    
     var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#lista').val(id);
  });
});
</script>






<!-- evitar que se reevie el formulario -->
<script  type="text/javascript" src="js/evitar_reenvio.js"></script>
<script  type="text/javascript" src="js2/modal-data.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
