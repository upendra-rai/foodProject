<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    <style type="text/css">
        label{
              
           color: #ffffff;
            
        }
        
        .form-control{
            width: 100%;
            
        }
    </style>    
</head>
<body>
		<section class="body">
			<!-- success message -->
			<div class="success_message"></div>
			<!-- success message -->
      <?php $this->load->view("common/titlebar"); ?>

			<div class="inner-wrapper">
			  <?php $this->load->view('common/sidemenu'); ?>

				<section role="main" class="content-body" >

					<div class="col-md-12" style="padding:0px;">
					<section class="section_card">
						  <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; text-transform:uppercase;">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
									  Add Promo Code
									</h4>
						 </div>
						 <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#27293d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="post">
                    <div class="col-md-6" style="padding:0px;">
											 <div class="col-md-12">
											   <div class="form-group">
												  <div class="col-md-12">
                                                      <label> Promo Code</label>
													   <input type="text" class="form-control" name="promocode" placeholder="Promo Code" value="<?php if(isset($selected_row[0])){ echo $selected_row[0]->promo_code; } ?>" required>
												  </div>
											   </div>
										   </div>
											 <div class="col-md-12">
		 										<div class="form-group">
		 											<div class="col-md-12">
                                                        <label> Detail</label>
		 												<input type="text" class="form-control" name="detail" placeholder="Detail" value="<?php if(isset($selected_row[0])){ echo $selected_row[0]->promo_detail; } ?>" required>
		 											</div>
		 										</div>
		 								 </div>
											 <div class="col-md-12">
												 <div class="form-group">
													 <div class="col-md-12">
                                                         <label> Discount Type</label>
                                                         <select name="discount_type" class="form-control" >
                                                             <option value="percent" <?php if(isset($selected_row[0])){ if(json_decode($selected_row[0]->promo_discount)->type == 'percent'){ echo 'selected'; }} ?> >%</option>
                                                             <option value="rupee" <?php if(isset($selected_row[0])){ if(json_decode($selected_row[0]->promo_discount)->type == 'rupee' ){ echo 'selected'; }} ?>>RS</option>   
                                                         </select>
														 
													 </div>
												 </div>
											</div>
                        
                                            <div class="col-md-12">
												 <div class="form-group">
													 <div class="col-md-12">
                                                         <label> Discount Value</label>
                                                         
														 <input type="text" class="form-control" name="disocunt" placeholder="Discount" value="<?php if(isset($selected_row[0])){ echo json_decode($selected_row[0]->promo_discount)->value; } ?>" >
													 </div>
												 </div>
											</div>
                                             
											
										</div>
                    <div class="col-md-6" style="padding:0px;">
											
                                  <div class="col-md-12">
												 <div class="form-group">
													 <div class="col-md-12">
                                                        <label> Validate From</label>
														 <input type="date" class="form-control" name="validate_from" placeholder="Validate From" value="<?php if(isset($selected_row[0])){ echo $selected_row[0]->validate_from; } ?>" >
													 </div>
												 </div>
											</div> 
                        
                                            <div class="col-md-12">
												 <div class="form-group">
													 <div class="col-md-12">
                                                         <label>Validate To</label>
														 <input type="date" class="form-control" name="validate_to" placeholder="Validate To" value="<?php if(isset($selected_row[0])){ echo $selected_row[0]->validate_to; } ?>" >
													 </div>
												 </div>
											</div>
                                             <div class="col-md-12">
												 <div class="form-group">
													 <div class="col-md-12">
                                                         <label> Terms / Condition</label>
														 <input type="text" class="form-control" name="terms" placeholder="Terms and Condition" value="<?php if(isset($selected_row[0])){ echo $selected_row[0]->term_condition; } ?>" >
													 </div>
												 </div>
											</div>
                                            
                                             <div class="col-md-12">
												 <div class="form-group">
                                                     <label style="margin-left:15px;"> Apply On</label>
													 <div class="col-md-12">
                                                         
														 <select class="form-control" name="product_category" style="width:150px; display:inline-block; float:left;" id="product_category">
                                                             <option value="all">All</option>
                                                             <option value="category">Category</option>
                                                             <option value="subcategory">Subcategory</option>
                                                             <option value="product">Product</option>
                                                           
                                                         </select> 
                                                         <div style="width: calc(100% - 155px);  display:inline-block;">
								                					<select data-plugin-selectTwo class="form-control populate" id="product_list" name="product_list">
								                						
								                							
								                					</select>
								                        </div>
													 </div>
												 </div>
                                                 
                                                 
											</div>
                  </div>



									<div class="col-md-6">
											<div class="form-group">
												<div class="col-md-12">
													<a href="<?php echo base_url(); ?>category/add_category">	<button type="button" class="btn-transparent btn-red"  style=" width:80px;">Cancel</button></a>
													<input type="submit" class="btn btn-primary" name="submit" value="submit" style="">
												</div>
											</div>
						      </div>
									<div class="col-md-6">
											<div class="form-group">
												<div class="col-md-12">

												</div>
											</div>
						      </div>
									</form>
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
		 $(document).on('change','select[id=product_category]', function(){
            
               var val = $(this).val();
             	$.ajax({
		              url : '<?php echo base_url(); ?>/promo_code/select_product_by_option',
								  method: 'POST',
									data:{val: val},
									success:function(data){
										
                                        $('#product_list').html(data);
					
									}
				});
             
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
