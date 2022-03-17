<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

   	<!-- jQuery Version 1.11.1 -->

  <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="float-right d-none d-sm-block">
    <!--  <b>Version</b> 3.0.1  -->
    </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    <font color="#a7a7a7" style="font-size: 16px">Copyright &copy; <?php echo date("Y"); ?> </font><a href="https://anrt.ma/" style="font-size: 16px">ANRT</a>.
  </div>
  <!-- Copyright -->
</footer>
<!-- ./wrapper -->

<!-- jQuery -->
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootbox.min.js"></script>
     <script src="../dist/js/bs-stepper.min.js"></script>
<!--
 <script>
  $(document).ready(function(){
  $('.delete_vol_cp').click(function(e){
   e.preventDefault();
   var Insid = $(this).attr('data-id');
   var idf = $(this).attr('href').replace('#','');
   var data = "idf="+ idf;

    bootbox.dialog({
    title: "<i class='fa fa-user-minus'></i> Retirer votre candidature !",
    message: "<p>Voulez-vous retirer votre candidature ?</p><p class='text-right'>هل أنتم متأكدون من إلغاء ترشيحكم؟</p>" ,
    //size: 'small',
    onEscape: true,
    backdrop: true,
    buttons: {
        fum: {
            label: 'Annuler',
            className: 'btn-success',
            callback: function(){
            }
        },
        fo: {
            label: 'Supprimer',
            className: 'btn-danger',
            callback: function(){
             $.ajax({

            type: 'POST',
            url: 'handler/delete-participation.php',
            data: data,

           })
           .done(function(response){

            bootbox.alert(response);
           })
           .fail(function(){

            bootbox.alert("Une erreur s'est produite. Veuillez réessayer ..");

           })
           }
        }
    }
})
});
});
 </script>  -->

<script src="../js/bootstrap.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- FullCalendar -->
<script src='../js/moment.min.js'></script>
<script src='../js/fullcalendar.min.js'></script>


<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- page script DataTables -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
//   $(document).bind("contextmenu",function(e) {
//  e.preventDefault();
// });

$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});
</script>

<!-- <script type="text/javascript">
document.addEventListener('keydown', function() {
  if (event.keyCode == 123) {
    alert("This function has been disabled to prevent you from stealing my code!");
    return false;
  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
    alert("This function has been disabled to prevent you from stealing my code!");
    return false;
  } else if (event.ctrlKey && event.keyCode == 85) {
    alert("This function has been disabled to prevent you from stealing my code!");
    return false;
  }
}, false);

if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("This function has been disabled to prevent you from stealing my code!");
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("This function has been disabled to prevent you from stealing my code!");
    window.event.returnValue = false;
  });
}

</script> -->



<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

  <!-- Bootstrap Validator -->
    <script src="../plugins/bootstrap-validator/js/bootstrapValidator.min.js"></script>
</html>
