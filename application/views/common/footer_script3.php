 <!-- jquery
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/metisMenu/metisMenu-active.js"></script>
   
    <script src="<?php echo base_url('catalogs'); ?>/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/calendar/moment.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/calendar/fullcalendar-active.js"></script>
	
	
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
   
	
	<!-- data table JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/tableExport.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/data-table-active.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table-export.js"></script>
<script type="text/javascript">
$(document).ready(function(){
       $('#profile_div_bt').click(function(){
           window.location.href = '<?php echo base_url(); ?>/dashboard/profile';
        })   
         $('#logout_div_bt').click(function(){
           window.location.href = '<?php echo base_url(); ?>/dashboard/logout';
        }) 
         
         $('#loc_home').click(function(){
             window.location.href = '<?php echo base_url() ?>dashboard';
         });
         $('#loc_back').click(function(){
            window.history.back();
         });   
           
        $('#my_nav').click(function(){
		var sidemenu_width = $('.mobo_menu').width();
		if(sidemenu_width == "0"){
			$('.mobo_menu').show().animate({
                width: 250,
            });
		}else if(sidemenu_width == "220"){
			 $('.mobo_menu').hide(0).animate({
                width: 0,
            });
		}
	   });
           
});
</script>   