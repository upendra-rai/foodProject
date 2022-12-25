<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
</head>
<body>
		<section class="body">
			<!-- success message -->
			<div class="success_message">Kot Genrated Successfully</div>
			<!-- success message -->
      <?php $this->load->view("common/titlebar"); ?>

			<div class="inner-wrapper">
			  <?php $this->load->view('common/sidemenu'); ?>

          <section role="main" class="content-body" >

					<div class="col-md-12" style="padding:0px; padding-right:15px;">
					<section class="section_card">
						  <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; text-transform:uppercase;">
								<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
								Order Details
				              </h4>
                              
                              <div style="display:inline-block; margin-top:-26px; float:right;">
                                 
                                 <!-- <div class="form-group" style="display:inline-block; margin-bottom:0px;">
                                      <select class="form-control" style="height:36px; border:1px solid #999999; ">
                                          <option>Delivery Person</option>
                                          <option>Agent 1</option>
                                          <option>Agent 2</option>
                                          <option>Agent 3</option>
                                      </select>
                                  </div>
                                  -->
                                  <!--   
                                  <div class="form-group" style="display:inline-block; margin-bottom:0px;">
                                      <a href="<?php echo base_url(); ?>orders/order_details/<?php echo $detail[0]->online_order_id; ?>/placed"><input type="submit" class="btn-transparent btn-green" value="Accept"></a>
                                  </div>
                                  
                                   <div class="form-group" style="display:inline-block; margin-bottom:0px;">
                                       <a href="<?php echo base_url(); ?>orders/order_details/<?php echo $detail[0]->online_order_id; ?>/canceled">
                                       <button type="button" class="btn-transparent btn-red" >Cancel</button>
                                        </a>
                                  </div> -->
                                 
                              </div>      
						 </div>
						 <div class="panel-body" style=" background-color:#27293d; padding-top:15px; padding-bottom:0px;">
                             
                             <?php if(isset($detail[0])){ ?>
                             <div class="col-md-6" style="padding:15px; border:1px solid #383d58; color:#ffffff;">
                                 <div class="row" style="padding:2px 10px; border:1px solid #383d58;  background-color:#5d568a;">
                                 Customer Details:  
                                 </div>
                                 <div class="row" style="padding:10px; border:1px solid #383d58; margin-bottom:5px;">
                                 
                                 <p><label> Name:</label> <?php echo $detail[0]->customer_name; ?></p>
                                 <p><label> Mobile No.:</label> <?php echo $detail[0]->contact_1; ?></p>
                                 <p><label> Mobile No 2.:</label> <?php echo $detail[0]->contact_2; ?></p>
                                 <p><label> Address:</label> <?php echo $detail[0]->address; ?></p>
                                 </div>
                                 <div class="row" style="padding:2px 10px; border:1px solid #383d58;  background-color:#5d568a;">
                                  Order Details :
                                 </div>
                                 <div class="row" style="padding:10px; border:1px solid #383d58; margin-bottom:5px;">
                                   
                                     <p><label> Order Date:</label> <?php echo date('d-M-Y',strtotime($detail[0]->online_order_date)); ?></p>
                                      <p><label> Delivery Date:</label> <?php echo date('d-M-Y',strtotime($detail[0]->delivery_date)); ?></p>
                                     
                                      <p><label> Sub Total:</label> <?php echo $detail[0]->cart_total; ?></p>
                                      <p><label> Tax:</label> <?php echo $detail[0]->order_tax; ?></p>
                                      <p><label> Packing Charge:</label> <?php echo $detail[0]->packing_charge; ?></p>
                                     
                                     <?php if($detail[0]->point_discount > 0){ ?>
                                      <p><label> Point Discount:</label> <?php echo $detail[0]->point_discount; ?></p>
                                     <?php } ?>
                                     
                                     <?php if($detail[0]->coupan_discount > 0){ ?>
                                     <p><label> Coupan Discount:</label> <?php echo $detail[0]->coupan_discount; ?></p>
                                      <?php } ?>
                                     <p><label> Total Sell:</label> <?php echo $detail[0]->total_order_price; ?></p>
                                     
                                      <p><label> Paid Amount:</label> <?php echo $detail[0]->paid_amount; ?></p>
                                     
                                     
                                     <p><label> Order Status:</label> <?php if($detail[0]->order_status == ''){ echo 'Pending'; }else{ echo $detail[0]->order_status;} ?> </p>
                                 </div>
                                 
                                 <div class="row" style="padding:2px 10px; border:1px solid #383d58;  background-color:#5d568a;">
                                  Delivery Details :
                                 </div>
                                 <div class="row" style="padding:10px; border:1px solid #383d58; margin-bottom:5px;">
                                   
                                     <p><label> Receiver_name:</label> <?php echo json_decode($detail[0]->delivery_details)[0]->name; ?></p>
                                      <p><label> Reciiver Mobile No.:</label> <?php echo json_decode($detail[0]->delivery_details)[0]->mobile_no; ?></p>
                                      <p><label> City.:</label> <?php echo json_decode($detail[0]->delivery_details)[0]->city; ?></p>
                                     <p><label> Street:</label> <?php echo json_decode($detail[0]->delivery_details)[0]->colony; ?></p>
                                     <p><label> Delivery Address:</label> <?php echo json_decode($detail[0]->delivery_details)[0]->address; ?></p>
                                     <p><label> Delivery Time:</label> <?php if(json_decode($detail[0]->delivery_details)[0]->delivery_type == 'now'){ echo 'Now'; }else{echo json_decode($detail[0]->delivery_details)[0]->time_slot;} ?></p>
                                    
                                 </div>
                             </div>
                             
                             <div class="col-md-6" style="padding:15px; border:1px solid #383d58; color:#ffffff;">
                                 <div class="row" style="padding:2px 10px; border:1px solid #383d58;  background-color:#5d568a;">
                                 Item Details
                                 </div>
                                 <?php foreach(json_decode($detail[0]->online_order_details) as $items){ ?>
								<div class="row" style="padding:10px; border:1px solid #383d58; margin-bottom:5px;">
                                    <div class="col-md-6" style="width:120px;">
                                        <img src="<?php echo base_url(); ?>uploads/product_image/<?php echo $items->item_img; ?>"  style="width:100px; ">
                                    </div>   
                                    
                                    <div class="col-md-6">
                                        <p style="margin-bottom:2px; color:#ffffff;">Item Name: <?php echo $items->item_name;  ?></p>
                                        <p style="margin-bottom:2px; color:#ffffff;">Quantity: <?php echo $items->item_qty;  ?></p>
                                        <p style="margin-bottom:2px; color:#ffffff;">Total Price: <?php echo $items->item_price;  ?></p>
                                        
                                    </div>
                                 </div>    
                                 
                                 <?php } ?>
                             </div>
                             <?php } ?>
						</div>
                     </section>
				</div>
		  <!-- main section -->
          </section>
	 <!-- inner wrapper -->
		</div>
		<?php $this->load->view('common/sidebar_right'); ?>
		<!-- Body section -->
		</section>
		<!-- Delete confimation model -->
		          <div id="del_alert_action" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
										 <div class="modal-dialog" style="width:90%;">
												 <div class="modal-content">
														 <div class="modal-close-area modal-close-df">
																 <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
														 </div>
														 <div class="modal-body" style="padding: 30px 30px; background-color:#363956; text-align:center; color:#ffffff;">
																 <span class="ion-ios-flame-outline" style="font-size:50px; color:#ff4747;"></span>
																 <h2 style="margin-top:6px;">Are You Sure!</h2>
																 <p class="fail_model_p">Do you want to delete this account?</p>
														 </div>
														 <div class="modal-footer danger-md" style=" background-color:#363956; border-top:none;">
																 <button class="btn-transparent btn-red" type="button" data-dismiss="modal" style="width:80px;">No</button>
																 <button data-del_id="" id="del_bt" class="btn-transparent btn-green" type="button"  style="width:80px; ">Yes</button>
					                   </div>
												 </div>
										 </div>
								 </div>

<?php $this->load->view('common/footer_script'); ?>
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/image-compressor.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
		 $(document).ready(function(){
     // set scroll position
		 function set_scroll_position(){

			 var url = window.location.href;
			 var segments = url.split( '/' );
       var scroll_position = segments[7];
			 if(scroll_position){
					 $('html').scrollTop(scroll_position);
			 }
		 }
		 set_scroll_position();
    // set scroll position

	  // upload image to server section
    document.getElementById('file').addEventListener('change', (e) => {
        const file = e.target.files[0];
         if (!file) {
         return;
        }
        var img_folder_name = $('input[id=file]').data("img_folder_name");
        new ImageCompressor(file, {
        quality: .2,
        success(result) {
           const formData = new FormData();
           formData.append('file', result, result.name);
           formData.append('img_folder_name', img_folder_name);
            $.ajax({
		    	url: '<?php echo base_url(); ?>/category/upload_image',
		    	method:"POST",
		    	data:formData,
		    	contentType:false,
		    	cache:false,
		    	processData:false,
		    	beforeSend:function(){
		    	//	$('#loading_img').text('loading...');
		    	},
		    	success:function(data)
		    	{
		    		$('#img_label').html(data);
		    		//$('#loading_img').text('');
		    	}
		    });
        },
         error(e) {console.log(e.message); },
      });
    });

    $(document).on('click','button[id=inlink_img_bt]',function(){
			  alert("s");
          var unlink_img_src = $(this).data("unlink_img_src");

				  $.ajax({
              url : '<?php echo base_url(); ?>/category/unlink_image',
						  method: 'POST',
							data:{unlink_img_src: unlink_img_src},
							success:function(data){
								alert(data);
								if(data === 'success'){
										$('#img_label').html('<i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px;">Browse</span>');
								}
							}
					});
	   });

    $(document).on('click','button[id=temprory_remove_image]',function(){
          $('#img_label').html('<i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px;">Browse</span>');
		});

// rediren for update section
    $(document).on('click','button[id=edit_bt]',function(){
              var edit_id = $(this).data("edit_id");
							var scroll_position = $('html').scrollTop();
              var redirect_link  = '<?php echo base_url(); ?>category/edit_category/'+scroll_position+'/'+edit_id;

							window.location.href = redirect_link;

		});
// delete functionality
    $(document).on('click','button[id=confirm_del_action]',function(){
						 var confirm_del_id = $(this).data("confirm_del_id");
						 $('#del_bt').data('del_id',confirm_del_id);
						 $('#del_alert_action').modal("toggle");
		});

		$(document).on('click','button[id=del_bt]',function(){
			   var del_id = $(this).data("del_id");
							$.ajax({
		              url : '<?php echo base_url(); ?>/category/del_product_category',
								  method: 'POST',
									data:{del_id: del_id},
									success:function(data){
										//alert(data);
										if(data === 'success'){
											window.location.href = window.location.href;
										}
									}
							});
	    });
});
</script>
</body>
</html>
