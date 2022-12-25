<!-- jQuery 2.2.3 -->

<script src="<?php echo base_url(); ?>catalogs/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>catalogs/bootstrap/js/bootstrap.min.js"></script>



<script src="<?php echo base_url(); ?>catalogs/plugins/datatables/jquery.dataTables.min.js"></script>



<script src="<?php echo base_url(); ?>catalogs/plugins/datatables/dataTables.bootstrap.min.js"></script> 



<script src="<?php echo base_url(); ?>catalogs/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url(); ?>catalogs/dist/js/app.min.js"></script>



<script>

  $(function () {

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": true,

      "searching": true,

      "ordering": true,

      "info": true,

      "autoWidth": true

    });

  });

  $('[data-toggle="tooltip"]').tooltip(); 

</script>



