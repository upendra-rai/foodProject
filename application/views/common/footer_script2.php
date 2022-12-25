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
	
	<!-- Charts JS
		============================================ -->
    
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
    
         $(document).on('click','input[name=start]',function(){
             $('.match_result').hide();
         });
         $(document).on('click','input[name=end]',function(){
             $('.match_result').hide();
         });
         $(document).on('click','input[name=search_section]',function(){
             $('.match_result').hide();
         });    
    
		 $(document).on('click','button[id=search_bt]',function(){
             $('#my_loader').show();
             var search_by  = $('select[id=select_search]').val();
             var linked_id = $('input[name=search_section]').val();
			 if(search_by === "linked_no"){
                         $.ajax({
     		         		 type: 'POST',
     		         		 url: '<?php echo base_url(); ?>search_data/searchbar_card_no',
         
              				 data:{search_by:search_by,linked_id:linked_id},
         
              				 success:function(noti){
         						 $('#my_loader').hide();
              					 $('#match_result1').html(noti).show();
                                 
              				 },
                             error: function(XMLHttpRequest, textStatus, errorThrown) {
                             $('#my_loader').hide();
                             if (XMLHttpRequest.readyState == 4) {
                                
                                 $('#failed_alert').modal("toggle");
                                
                                 // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                             }
                             else if (XMLHttpRequest.readyState == 0) {
                                 $('#failed_alert').modal("toggle");
                                 
                                 // Network error (i.e. connection refused, access denied due to CORS, etc.)
                             }
                             else {
                                 
                                 $('#failed_alert').modal("toggle");
                                 // something weird is happening
                             }
                           }
              			 });
                    
                }else{
                    $('#my_loader').hide();
                }
         });
	   
	   
	   $(document).on('click','button[id=search_date_bt]',function(){
         $('#my_loader').show();   
         var from_date  = $('input[name=start]').val();
         var to_date  = $('input[name=end]').val();
		    $.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>search_data/search_by_date',
     				 data:{from_date:from_date,to_date:to_date},
     				 success:function(noti){
     					 $('#match_result_date').html(noti).show();
                          $('#my_loader').hide();
                         
     				 },
                     error: function(XMLHttpRequest, textStatus, errorThrown) {
                     $('#my_loader').hide();
                     if (XMLHttpRequest.readyState == 4) {
                        
                         $('#failed_alert').modal("toggle");
                        
                         // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                     }
                     else if (XMLHttpRequest.readyState == 0) {
                         $('#failed_alert').modal("toggle");
                         
                         // Network error (i.e. connection refused, access denied due to CORS, etc.)
                     }
                     else {
                         
                         $('#failed_alert').modal("toggle");
                         // something weird is happening
                     }
                   }
                    
     	    });
	   });

         
        $(document).on('change','#select_search',function(){
			 var val = $('#select_search').val();
			 $('input[name=search_section]').val('');
             $('.match_result').hide();
            if(val === "name" || val === "colony_name" || val === "mobile_no"){
                
                $('input[name=search_section]').attr('id','search_name_input');
                if(val === "name"){
                    $('input[name=search_section]').attr('placeholder','Search by Customer Name');
                }else if(val === "colony_name"){
                     $('input[name=search_section]').attr('placeholder','Search by Colony Name');
                }else if(val === "mobile_no"){
                    $('input[name=search_section]').attr('placeholder','Search by Contact no.');
                }
                
            }else{
                $('input[name=search_section]').attr('id','search_input');
                $('input[name=search_section]').attr('placeholder','Search by ATM No.');
            }
		}); 
         
        $(document).on('keyup','#search_name_input',function(){
                var search_by  = $('select[id=select_search]').val();
			    var search_for = $('input[id=search_name_input]').val();
                if(search_by === "name"){
                       
                        var fullname = search_for.split(" ");
			        	var firstname = fullname[0];
			        	if(fullname[1] === undefined || fullname[1] === null){
			        		var lastname  = "";
			        	}else{
			        		var lastname  = fullname[1];
			        	}
                        if(search_for.length >= 3){
			        	 $.ajax({
     		         		 type: 'POST',
     		         		 url: '<?php echo base_url(); ?>search_data/searchbar_list',
         
              				 data:{search_by:search_by,firstname:firstname,lastname:lastname},
         
              				 success:function(noti){
         						 
              					 $('#match_result1').html(noti).show();
                                 
              				 }
              			 });
                    
                       }
                }else if(search_by === "colony_name"){
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_data/searchbar_like_list',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                
     		        		 }
     		        	 });
                    }
                }else if(search_by === "mobile_no"){
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_data/searchbar_like_list_number',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                 
     		        		 }
     		        	 });
                    }
                }
            
        });
         
        $(document).on('keydown','#search_name_input',function(){
                var search_by  = $('select[id=select_search]').val();
			    var search_for = $('input[id=search_name_input]').val();
                if(search_by === "name"){
                        var fullname = search_for.split(" ");
			        	var firstname = fullname[0];
			        	if(fullname[1] === undefined || fullname[1] === null){
			        		var lastname  = "";
			        	}else{
			        		var lastname  = fullname[1];
			        	}
                        if(search_for.length >= 3){
			        	 $.ajax({
     		         		 type: 'POST',
     		         		 url: '<?php echo base_url(); ?>search_data/searchbar_list',
         
              				 data:{search_by:search_by,firstname:firstname,lastname:lastname},
         
              				 success:function(noti){
         						 
              					 $('#match_result1').html(noti).show();
                                 
              				 }
              			 });
                    
                       }else{
                         
                         $('#match_result1').html("").hide();
                                
                      }
                }else if(search_by === "colonyname"){
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_data/searchbar_like_list',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                
     		        		 }
     		        	 });
                    }else{
                    
                    $('#match_result1').html("").hide();
                   }
                }else if(search_by === "mobile_no"){
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_data/searchbar_like_list_number',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                 
     		        		 }
     		        	 });
                    }else{
                    
                    $('#match_result1').html("").hide();
                    }
                }
        }); 
         
         
         $(document).on('click','.search_li',function(){
            $('#my_loader').show();
             var linked_id = $(this).data("li_link");
             window.location.href = '<?php echo base_url() ?>report/customer_report/'+linked_id;
		 });
         
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