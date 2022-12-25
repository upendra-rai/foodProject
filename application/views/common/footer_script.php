        <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/select2/select2.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/tables/examples.datatables.tabletools.js"></script>

    <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/bootstrap-table.js"></script>
        <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/tableExport.js"></script>
         <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/data-table-active.js"></script>
         <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/bootstrap-table-editable.js"></script>
        <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/bootstrap-editable.js"></script>
        <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/bootstrap-table-resizable.js"></script>
        <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/colResizable-1.5.source.js"></script>
        <script src="<?php echo base_url(); ?>/catalogs/assets/vendor/data-table/js/bootstrap-table-export.js"></script>
<script type="text/javascript">

       $(document).ready(function(){
         //get url
      function getUrlVars() {
             var vars = {};
             var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                 vars[key] = value;
             });
             return vars;
       }
     //get url
           function launch_success_msg(){
               var msg = getUrlVars()['msg'];
               if(msg){
                 convert_msg = msg.replace(/%20/g, " ");

                 $('.success_message').text(convert_msg).animate({right: "0px"},1000);
               }
           }
           launch_success_msg();
       
       setTimeout(function(){$('.success_message').animate({right: "-100%"},1000);},4000);
    
     // user permission
    
    function user_permission(){
        
        
         $.ajax({
		    	url: '<?php echo base_url(); ?>/dashboard/init_user',
		    	method:"POST",
		    	contentType:false,
		    	cache:false,
		    	processData:false,
		    	beforeSend:function(){
		    	//	$('#loading_img').text('loading...');
		    	},
		    	success:function(data)
		    	{   
                    
                    
                    var arr = JSON.parse(data);
                    
                    
		    		if(arr[0].dashboard == 'no'){
                        $('li[name=dashboard]').hide();
                    }
                    
                    if(arr[0].create_user == 'no'){
                        alert("s");
                        $('li[name=create_user]').hide();
                    }
                    
                    if(arr[0].restorent == 'no'){
                        $('li[name=restorent]').hide();
                    }
                    
                    if(arr[0].restorent_list == 'no'){
                        $('li[name=restorent_list]').hide();
                    }
                    
                    if(arr[0].add_branch == 'no'){
                        $('li[name=add_branch]').hide();
                    }
                    
                    if(arr[0].add_branch == 'no'){
                        $('li[name=add_branch]').hide();
                    }
                    
                    if(arr[0].orders == 'no'){
                        $('li[name=orders]').hide();
                    }
                    
                    if(arr[0].pending_orders === 'no'){
                       
                        $('li[name=pending_orders]').hide();
                    }
                    
                    if(arr[0].placed_orders === 'no'){
                        $('li[name=placed_orders]').hide();
                    }
                    
                    if(arr[0].dispatch_orders == 'no'){
                        $('li[name=dispatch_orders]').hide();
                    }
                    
                    if(arr[0].delivered_orders == 'no'){
                        $('li[name=delivered_orders]').hide();
                    }
                    
                    if(arr[0].cancel_orders == 'no'){
                        $('li[name=cancel_orders]').hide();
                    }
                    
                    if(arr[0].parameter == 'no'){
                        $('li[name=parameter]').hide();
                    }
                    
                    if(arr[0].notification == 'no'){
                        $('li[name=notification]').hide();
                    }
                    
                    if(arr[0].category == 'no'){
                        $('li[name=category]').hide();
                    }
                    
                    if(arr[0].add_category == 'no'){
                        $('li[name=add_category]').hide();
                    }
                    
                    if(arr[0].add_subcategory == 'no'){
                        $('li[name=add_subcategory]').hide();
                    }
                    
                    if(arr[0].management == 'no'){
                        $('li[name=management]').hide();
                    }
                    if(arr[0].banner_management == 'no'){
                        $('li[name=banner_management]').hide();
                    }
                    
                    if(arr[0].offer_banner == 'no'){
                        $('li[name=offer_banner]').hide();
                    }
                    
                    if(arr[0].product == 'no'){
                        $('li[name=product]').hide();
                    }
                    
                    if(arr[0].add_product == 'no'){
                        $('li[name=add_product]').hide();
                    }
                    
                    if(arr[0].list_product == 'no'){
                        $('li[name=list_product]').hide();
                    }
                    
                    $('#menu').show();
		    	}
		    });
    }
    user_permission();
    
    
    function fetch_outlet(){
        $.ajax({
		    	url: '<?php echo base_url(); ?>/dashboard/fetch_outlet',
		    	method:"POST",
		    	contentType:false,
		    	cache:false,
		    	processData:false,
		    	beforeSend:function(){
		    	//	$('#loading_img').text('loading...');
		    	},
		    	success:function(data)
		    	{   
                     var arr = JSON.parse(data).outlet_list;
                     var base_href = '<?php echo base_url(); ?>'; 
                    
                     for(var i = 0; i < arr.length; i++){
                        $('#append_outlet').append('<li style="background-color:#3d3b50;"><a role="menuitem" tabindex="-1" href="'+base_href+'dashboard/switch_outlet/'+arr[i].outlet_id+'/'+arr[i].outlet_name+'/'+arr[i].outlet_type+'" style="padding-left:5px; padding-right:5px; color:#ffffff;"> '+arr[i].outlet_name+'</a></li>');
                     } 
		    	}
		    });
    }
    fetch_outlet();
    
    
    function check_new_order(){
            
            $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url(); ?>dashboard/new_order',
                 
     		     success:function(noti){
     		     	
                     
                     var count = JSON.parse(noti).list.length;
                     
                     if(count > 0){
                     $('#noti_order_span').html(count);
                     }else{
                         $('#noti_order_span').hide();
                     }
                     //var my_arr = JSON.parse(noti).list;
                     var my_arr = JSON.parse(noti).list;
                    
                     if(my_arr){
                         
                         for(var i = 0; i < my_arr.length; i++){
                             
                             var createdDate = new Date(my_arr[i].online_order_date);
                             var date = createdDate.toLocaleDateString();
                             var day = createdDate.getDate();
                             var month = createdDate.getMonth() + 1; //months are zero based
                             var year = createdDate.getFullYear();
                             
                             var time = createdDate.toLocaleTimeString().replace(/(.*)\D\d+/, '$1');
                             
                             var mydate = day + '-' + month + '-' + year + ' ' + time;
                              
                           
                              var customer = my_arr[i].customer_name; 
                              var customer_id = my_arr[i].customer_id;
                              var href = '<?php echo base_url(); ?>/orders/orders/';
                                  
                                  $('#order_notification').prepend('<a href="'+href+'" style="margin:0px; color:#ffffff;"><li class="noti_li" style=""><div class="notification-content"><p style="margin-bottom:0px; font-size:12px;">'+customer+'</p><span class="notification-date" style="font-style:normal; font-size:11px;">'+mydate+'  <span style="float:right;">New Order</span></span></div></li></a>');
       
                         }
                         
                        
                     }
                     
                     
     		      }
           });
        }
        check_new_order();
    
    
       
         function feedback_notification(){
            
            $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url(); ?>dashboard/feedback_notification',
                 
     		     success:function(noti){
                     
                     
     		     	
                     var count = JSON.parse(noti).list.length;
                     
                     if(count > 0){
                           $('.feedback_noti_span').html(count);
                     }else{
                             $('.feedback_noti_span').hide();
                     }
                   
                     
                     var my_arr = JSON.parse(noti).list;
                     
                     if(my_arr){
                         
                         for(var i = 0; i < my_arr.length; i++){
                             
                             var createdDate = new Date(my_arr[i].time_stamp);
                             var date = createdDate.toLocaleDateString();
                             var day = createdDate.getDate();
                             var month = createdDate.getMonth() + 1; //months are zero based
                             var year = createdDate.getFullYear();
                             
                             var time = createdDate.toLocaleTimeString().replace(/(.*)\D\d+/, '$1');
                             
                             var mydate = day + '-' + month + '-' + year + ' ' + time;
                              
                                  var feedback_id = my_arr[i].feedback_id;
                                  var fname = my_arr[i].customer_name;
                                 
                                 
                                  
                                  var href = '<?php echo base_url(); ?>/dashboard/read_feedback/'+feedback_id;
                                  
                                  $('#feedback_notification').prepend('<a href="'+href+'" style="margin:0px; color:#ffffff;"><li class="noti_li" ><div class="notification-content"><span class="notification-date" style="font-style:normal;"></span><p style="margin-bottom:0px; font-size:12px;"> '+fname+' <br><span style="font-weight:500; font-size:11px;">'+mydate+'</span></p></div></li></a>');
                                  
                           
                             
                              
                         }
                         
                        
                     }
                     
     		      }
           });
        }
       feedback_notification();
           
           
        // count orders
           
         function count_orders(){
            
            $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url(); ?>orders/count_orders',
                 
     		     success:function(noti){
     		     	
                             var new_orders = JSON.parse(noti).list.new_order_count[0].total;
                             var placed_orders = JSON.parse(noti).list.placed_order_count[0].total;
                            var dispatched_orders = JSON.parse(noti).list.dispatched_order_count[0].total;
                           var delivered_orders = JSON.parse(noti).list.completed_order_count[0].total;
                           var cancel_orders = JSON.parse(noti).list.canceled_order_count[0].total;
                     
                         
                     
                            $('#new_order_span').text(new_orders);
                            $('#placed_order_span').text(placed_orders);
                            $('#dispatched_order_span').text(dispatched_orders);
                            $('#delivered_order_span').text(delivered_orders);
                            $('#cancel_order_span').text(cancel_orders);
                           
                         }
                         
                   
           });
        }   
     count_orders();
    
    
      $(document).on('click','button[name=clear_alert]',function(){
      
         $(this).parent('.alert').hide(); 
          
      });
           
           });
</script>
