<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/modals.css">
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/select2/select2.min.css">
   <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.print.min.css">
     <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/preloader/preloader-style.css">

    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/notifications/notifications.css">

<style type="text/css">
    .detail_box p label{

        font-weight: 400;
        color: #000000;
        /*color: #525252;*/
        font-size: 15px;
    }
     .message{
            width:100%;
            height:40px;

            padding-top:8px;
            text-align:center; color:red;
            box-shadow: 0px 3px 7px -1px rgba(0,0,0,0.6);
            display: none;

        }
        .message.error{
              color: #ffffff;
             background-color: #e91e63;
             border:1px solid #e91e63;
        }
        .message.success{
             color: #ffffff;
             background-color: #4caf50;
             border:1px solid green;
        }
        .message.card{
             color: #ffffff;
             background-color: #ff9600;
             border:1px solid #ff9600;
        }
</style>
</head>

<body>
    <div class="preloader-single shadow-inner mg-b-30" id="my_loader" style="position:fixed; background: rgba(0,0,0,0.8); width:100%; height:100vh; z-index: 9999; display:none;">
        <div class="ts_preloading_box" style="">
            <div id="ts-preloader-absolute09" style="position:fixed; margin:auto;   border-radius:70px;">
                <div class="tsperloader9" id="tsperloader9_one"></div>
                <div class="tsperloader9" id="tsperloader9_two"></div>
                <div class="tsperloader9" id="tsperloader9_three"></div>
                <div class="tsperloader9" id="tsperloader9_four"></div>
            </div>
        </div>
    </div>
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">

        <?php $this->load->view('common/titlebar'); ?>


            <div class="container-fluid" style="margin-top:15px; " id="action_div">
            <div class="product-status-wrap mycard" style="padding-top:5px; border-top:2px solid #0099cc;">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:7px; margin-bottom: 0px;">
                    <div class="message error" style="display:<?php if(isset($message) && $message === "failed"){ echo "block"; } ?>">
                                                          Process is failed!
                                                          <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                          <br>
                                                          <br>
                                                      </div>
                                                     <div class="message success s_add" style="display:<?php if(isset($message) && $message === "success"){ echo "block"; } ?>">
                                                          Customer profile is successfully added.
                                                         <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                         <br>
                                                          <br>
                                                      </div>
                                                     <div class="message success s_update" style="display:<?php if(isset($message) && $message === "updatesuccess"){ echo "block"; } ?>">
                                                         Customer profile is successfully updated.
                                                          <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                        <br>
                                                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style="margin-bottom:0px; ">
                                <input type="hidden" id="msg_input" value="<?php if(isset($message)){ echo $message; }else{ echo ""; } ?>">
                                Customer <span><i class="ion-android-arrow-dropright" style="color: #0099cc;"></i></span> <span style="color:#44bffd; font-weight:550;">Order Details</span>
                                <ul class="my_quick_bt" style="">
                                    <li>
                                        <a id="loc_home" href="javascript:void(0);">
                                            <i class="ion-ios-home-outline"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="loc_back" href="javascript:void(0);">
                                            <i class="ion-ios-undo-outline"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row" id="my_table_body">
                                <?php foreach($detail as $row){ ?>
							     <div class="col-md-6">
                                     <div class="detail_box first">
                                         <p class="box_title ">Customer Details</p>
                                         <img src="<?php echo base_url('catalogs') ?>/img/customer_img/<?php echo $row->customer_image; ?>" class="thumbnail" alt="" style="width:120px; height:120px; border-radius: 50%;" />
                                         <p style="font-weight:600; color:#0798dc;"><label>Name:&nbsp;</label> <?php echo $row->first_name.' '.$row->last_name; ?></p>
                                         <p><label>Email Address:&nbsp;</label> <?php echo $row->email_address; ?></p>
                                         <p><label>Phone 1:&nbsp;</label> <?php echo $row->contact_1; ?></p>
                                         <p><label>Phone 2:&nbsp;</label> <?php echo $row->contact_2; ?></p>
                                         <p><label>Address1:&nbsp;</label><?php echo $row->address_1; ?></p>
                                         <p><label>Address2:&nbsp;</label> <?php echo $row->address_2; ?></p>

                                         <p style="font-weight:600; color:#0798dc;"><label>Colony Name:&nbsp;</label> <?php echo $row->colony_name; ?></p>
                                         <p><label>City:&nbsp;</label> <?php echo $row->city; ?></p>
                                         <p style="display:none;"><label>Delivery Type:&nbsp;</label> <?php echo $row->d_type; ?></p>
                                         <p><label>Assigned Agent:&nbsp;</label> <?php echo $row->name; ?></p>
                                         <p><label>Password:&nbsp;</label><span><button type="button" class="btn" id="show_cus_pass" style="background-color:transparent; border:none;"><i class="ion-eye"></i></button></span> <input type="password" id="cus_pass" value="<?php echo $row->customer_password; ?>" autocomplete="new-password" style="border:none; background-color:transparent;"> </p>
                                     </div>

                                 </div>

                                <div class="col-md-6">
                                         <div class="detail_box second" style="border-right: 1px solid transparent;">
                                             <input type="hidden" id="current_balance_amount" value="<?php echo $row->balance_amount; ?>" />
                                         <p class="box_title ">Account Details</p>
                                              <p style="font-weight:600; color:#0798dc;"><label>Card No:&nbsp;</label> <?php echo $row->atm_card_no; ?></p>
                                              <p style="font-weight:600; color:#0798dc;"><label>Balance: &nbsp; <i class="fa fa-rupee" style="color:#0798dc;"></i></label> <?php echo number_format($row->balance_amount,1); ?></p>
                                              <p><label>Ragistration Date:&nbsp;</label> <?php echo date('d-M-y', strtotime($row->ragistration_date)); ?></p>
                                              <p><label>Status:&nbsp;</label> <?php echo $row->card_status; ?> </p>
                                              <br>
                                         <p class="box_title ">Order Details</p>
                                               <div class="sparkline15-graph" style="padding-left:15px;">
                                                  <div class="row">
                                                  <?php if(isset($order_item_details)){ foreach(json_decode($order_item_details) as $row){ ?>
                                                            <p style="font-weight:600; color:#0798dc;"><label><?php echo $row->product_name; ?>:&nbsp;</label> <?php echo $row->order_qty; ?> <?php echo $row->unit; ?>  </p>
                                                  <?php }} ?>
                                                   <?php if(isset($detail[0])){if($detail[0]->order_status == '' || $detail[0]->order_status == 'placed' || $detail[0]->order_status == 'canceled' ){ ?>
                                                   <button  class="btn btn-primary action_panel_bt" id="accept_order" data-order_id="<?php if(isset($detail[0])){echo $detail[0]->special_order_id; } ?>" style="background-color:#44bffd; width:120px; text-align:center;">Accept </button>
                                                   <button  class="btn btn-primary action_panel_bt" id="cancel_order" data-order_id="<?php if(isset($detail[0])){echo $detail[0]->special_order_id; } ?>" style="background-color:#f0601b; width:120px; text-align:center;">Cancel </button>
                                                  <?php }} ?>
                                                   </div>
                                               </div>
				                         </div>
				               </div>

                        <?php } ?>
                            </div>
                            <div class="row" >
                                                            <div class="col-md-6" >
                                                                 <div class="detail_box first">
                                                                <div class="asset-inner" >
                                                                 <table id="table" data-toggle="table"    data-key-events="true"   data-cookie="true"
                                                                           class="table-striped">
                                                                     <thead>
					                                 				<tr>
                                                                         <th>Sr No.</th>
					                                 			        <th>Product</th>
                                                                         <th>Unit</th>
                                                                         <th>Unit Price</th>
                                                                         <th>Estimated Product Qty</th>

                                                                         <!--<th>Assign</th>-->
                                                                     </tr>
					                                 			    </thead>
					                                 		    	  <tbody id="tran_table">
                                                                          <?php if(isset($select_product)){ $i = 1; foreach($select_product as $row){ ?>
                                                                              <tr class="product_row" data-product_id="<?php echo $row->product_id; ?>" >
                                                                                  <td><?php echo $i++; ?></td>
                                                                                  <td><?php echo $row->product_name; ?></td>
                                                                                  <td><?php echo $row->unit; ?></td>
                                                                                  <td><?php echo $row->product_price; ?></td>
                                                                                  <td><?php if($row->unit == 'Pkt'){ echo number_format($row->product_qty); }else{ echo $row->product_qty; } ?> <?php echo $row->unit; ?></td>

                                                                             </tr>
                                                                          <?php }} ?>
					                                 		    	  </tbody>

					                                 			</table>
                                                             </div>
                                                                       </div>
                                                            </div>
                                                        </div>
                    </div>
                </div>
            </div>
	    </div>



        <br>
        <br>

                   <div id="success_alert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <!--<div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>-->
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Done!</h2>
                                        <p class="success_model_p"></p>
                                    </div>
                                    <div class="modal-footer">

                                       <button class="btn btn-primary" type="button" id="success_ok" style="width:80px; background-color:#2c6be0;">OK</button>

                                    </div>
                                </div>
                            </div>
                       </div>
			           <div id="failed_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Error!</h2>
                                        <p class="fail_model_p">Sorry opration is failed! Try Again!</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                        <button class="btn btn-primary" type="button" id="error_ok" style="width:80px; background-color:#2c6be0;">OK</button>
									                  </div>
                                </div>
                            </div>
                        </div>


	</div>

   <?php $this->load->view('common/footer_script'); ?>
    <script src="<?php echo base_url('catalogs'); ?>/js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/select2/select2-active.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>

    <!-- notification JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/notifications/Lobibox.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/notifications/notification-active.js"></script>
     <script type="text/javascript">
function validateNumber(evt) {
    var e = evt || window.event;
    var key = e.keyCode || e.which;

    if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
    // numbers
    key >= 48 && key <= 57 ||
    // Numeric keypad
    key >= 96 && key <= 105 ||
    // Backspace and Tab and Enter
    key == 8 || key == 9 || key == 13 ||
    // Home and End
    key == 35 || key == 36 ||
    // left and right arrows
    key == 37 || key == 39 ||
    // Del and Ins
    key == 46 || key == 45) {
        // input is VALID
    }
    else {
        // input is INVALID
        e.returnValue = false;
        if (e.preventDefault) e.preventDefault();
    }
}
</script>
  <script type="text/javascript">
     $(document).ready(function(){
        $(document).on('click','#accept_order',function(){
             var order_id = $(this).data("order_id");
             alert(order_id);
             $.ajax({
 				         type: 'POST',
 				         url: '<?php echo base_url(); ?>orders/accept_orders',
 				         data:{order_id:order_id},
 				         success:function(data){
                   if(data === 'success'){
                     window.location.href = "<?php echo base_url(); ?>orders/orders";
                   }else{
                     alert("Process is failed! Please try again");
                   }
                 }
               });
        });

        $(document).on('click','#cancel_order',function(){
             var order_id = $(this).data("order_id");

             $.ajax({
 				         type: 'POST',
 				         url: '<?php echo base_url(); ?>orders/cancel_orders',
 				         data:{order_id:order_id},
 				         success:function(data){
                       if(data === 'success'){
                         window.location.href = "<?php echo base_url(); ?>orders/orders";
                       }else{
                         alert("Process is failed! Please try again");
                       }
                 }
               });
        });



        $(document).on('click','#recharge_bt',function(){

            $('#my_loader').show();
			var link_id = $(this).data("recharge_id");
            var card_status = $(this).data("status");

            var minimum_limit = $(this).data("minimum_recharge");
			var recharge_value = $('input[id=recharge_input]').val();

            var mobile_no = $(this).data("mobile");

            if(card_status === "blocked"){
                $('#my_loader').hide();
                $('#recharge_msg').text('Recharge is not allowed on blocked customer.');

            }else{

            if(recharge_value < minimum_limit){
                $('#my_loader').hide();
                $('#recharge_msg').text('Minimum '+ minimum_limit +' Rs recharge allowed');
            }else{


            $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>customer/recharge_account',
				 data:{link_id:link_id,recharge_value:recharge_value,mobile_no:mobile_no},
				 success:function(data){
                     $('#my_loader').hide();
                    // alert(data);
				   if(data == "success"){
                        $('p[class=success_model_p]').text("Recharge of "+recharge_value+ "Rs. is successfully done.");
						$('#success_alert').modal("toggle");
					}else{
						$('#failed_alert').modal("toggle");
					}
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

          }
            }
		});

        $(document).on('click','input[id=update_status]',function(){
             $('#block_alert').modal("toggle");
        });

        $(document).on('click','button[id=block_cancel]',function(){
             var url = window.location.href;
            var check_url = url.substring(url.lastIndexOf("/")+1);
            if(check_url === "transaction" || check_url === "recharge" || check_url === "001" || check_url === "002"){
                var trim_url = url.substring(0,url.lastIndexOf("/"));
                window.location.href =  trim_url;

            }else{

                window.location.href = window.location.href;
            }

        });

        $(document).on('click','button[id=error_ok]',function(){
             window.location.href =  window.location.href;
        });

        $(document).on('click','button[id=block_model_bt]',function(){
            $('#block_alert').modal("toggle");
            var link_id = $('input[id=update_status]').data("status_id");

			if($('input[id=update_status]').is(':checked')){
                $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>customer/block_accout',
				 data:{link_id:link_id},
				 success:function(data){

				   if(data == "success"){
                        $('p[class=success_model_p]').text("Atm card is successfully blocked ");
						$('#success_alert').modal("toggle");
					}else{

						$('#failed_alert').modal("toggle");
					}
				 }
			    });

            }else{
                $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>customer/unblock_accout',
				 data:{link_id:link_id},
				 success:function(data){
				   if(data == "success"){
                        $('p[class=success_model_p]').text("Atm card is successfully unblocked ");
						$('#success_alert').modal("toggle");
					}else{
						$('#failed_alert').modal("toggle");
					}
				 }
			    });
            }

		});




		$(document).on('click','#success_ok',function(){
			var url = window.location.href;
            var check_url = url.substring(url.lastIndexOf("/")+1);
            if(check_url === "transaction" || check_url === "recharge" || check_url === "001" || check_url === "002"){
                var trim_url = url.substring(0,url.lastIndexOf("/"));
                window.location.href =  trim_url;

            }else{

                window.location.href = window.location.href;
            }

		});
		$(document).on('click','#fail_ok',function(){

			 window.location.href = window.location.href;

		});


         $(document).on('click','button[id=tran_bt]',function(){
             var link_id = $(this).data("tran_linkid");
				$.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>customer/customer_tran_report/'+link_id,

     				 success:function(noti){
     					$('#tran_tbody').html(noti);
                        $('#tran_table').show();
                        $('#rech_table').hide();
                        $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
     				 }
     			 });
         });

         $(document).on('click','button[id=rech_bt]',function(){
             var link_id = $(this).data("rech_linkid");


				$.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>customer/customer_rech_report/'+link_id,

     				 success:function(noti){
     					$('#rech_tbody').html(noti);
                        $('#rech_table').show();
                        $('#tran_table').hide();
                         $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
     				 }
     			 });
         });

        $(document).on('click','button[title=myrecharge_delete]',function(){
              var current_balance = $('input[id=current_balance_amount]').val();
              var recharge_amount = $(this).data("recharge_amount");
              var recharge_id = $(this).data("recharge_id");
              var customer_id = $(this).data("re_customer_id");
              if(current_balance <= recharge_amount){

                  $('#delete_recharge_failed').modal("toggle");
              }else{
                  var href =  '<?php echo base_url(); ?>customer/delete_recharge/'+recharge_id+'/'+customer_id;
                  $('p[class=fail_model_p]').text('You want to delete this recharge.');
                  $('#del_alert_action').modal("toggle");
                  $('button[id=del_recharge_bt]').data("del_href",href);
              }

        });
         $(document).on('click','button[id=del_recharge_bt]',function(){
               var href = $(this).data("del_href");
               window.location.href = href;
        });

        function scroll(){
              var url = window.location.href;
		      var trim_url = url.substring(url.lastIndexOf("/")+1 );
              if(trim_url === 'transaction' || trim_url === 'recharge'){
                    $('html,body').animate({ scrollTop: 300 }, 'slow');
              }

         }

         scroll();


          function show_alert() {
             var url = window.location.href;
		    var check = url.substring(url.lastIndexOf("/")+1);

            if(check === "001"){
                 $('.s_add').show();
                /* Lobibox.notify('success', {
                    msg: 'Customer Profile Is Successfully Added.'
                });*/

            }else if(check === "002"){
                $('.s_update').show();
            }

        }

        show_alert();

       function myhide_msg(){
            $('.s_add').hide();
           $('.s_update').hide();
        }
        setTimeout(myhide_msg, 2000);


         $(document).on('click','#show_cus_pass',function(){
            var check = $('#cus_pass').attr('type');

             if(check === 'password'){

                 $('#cus_pass').attr('type','text');

             }else if(check === 'text'){

                 $('#cus_pass').attr('type','password');
             }

         });

	 });
 // the balance amount Rs. 200/- has been returned successfully

 // Please refund this amount to customer and continue for the account termination.
   </script>
</body>
</html>
