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
						<div class="col-md-8" style="padding:0px; padding-right:15px; margin-bottom:15px;">
						<section class="section_card" id="table_section">
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
													 Sub Category List <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i> <?php  if(isset($product_subcategory[0])){ echo $product_subcategory[0]->product_category_name;  } ?>
													</h2>
									    </div>
								</header>
							  <div class="panel-body " style="padding-top:0px;">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
											   <th>Sr no</th>
											   <th>Sub Category</th>
											   <th class="hidden-phone">Status</th>
											   <th>Edit</th>
											   <th>Action</th>
										</tr>
									</thead>
									<tbody>
										  <?php $i = 1; foreach($product_subcategory as $row){ ?>
                          <tr>
														  <td><?php echo $i++; ?></td>
                          	  <td><?php echo $row->product_sub_category_name; ?></td>
														  <td><?php echo $row->product_subcategory_status; ?></td>
														  <td style=" text-align:center;"><button class="btn btn-primary" id="edit_bt"  data-edit_id="<?php echo $row->product_sub_category_id; ?>" style="color:#248afd; "><i class="fa fa-pencil"></i></button></td>
										      	  <td style="text-align:center;"><button type="button" class="btn btn-primary" id="confirm_del_action" data-confirm_del_id="<?php echo $row->product_sub_category_id; ?>" style="color:#ff4747; "><i class="fa  fa-times-circle"></i></button></td>
                          </tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</section>
					</div>
					<div class="col-md-4" style="padding:0px; padding-right:15px;">
					<section class="section_card floating_form">
						  <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; text-transform:uppercase;">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
											<?php if(isset($selected_subcategory[0])){ echo 'Edit Category'; }else{ echo 'Add Category'; } ?>
									</h4>
						 </div>
						 <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#27293d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="post">
											<div class="col-md-12">
												<div class="form-group">
													<div class="col-md-12">
														<select class="form-control" name="category" id="category" required>
															<option value="">Category</option>
															<?php foreach($category_list as $row){ ?>
															<option value="<?php echo $row->product_category_id ?>" <?php if(isset($selected_category)){ if($selected_category == $row->product_category_id){ echo 'selected'; }} ?>  ><?php echo $row->product_category_name; ?></option>
														 <?php } ?>
														</select>
													</div>
												</div>
							       </div>
										<div class="col-md-12">
											<div class="form-group">
												<div class="col-md-12">
													<input type="text" class="form-control" name="subcategory_name" placeholder="Category Name" value="<?php if(isset($selected_subcategory[0])){ echo $selected_subcategory[0]->product_sub_category_name; } ?>" required>
												</div>
											</div>
						       </div>
									 <div class="col-md-12">
											 <div class="form-group">
												 <div class="col-md-12">
													<select class="form-control" name="status">
														<option value="active" <?php if(isset($selected_subcategory[0])){ if($selected_subcategory[0]->product_subcategory_status == 'active'){ echo 'selected'; }} ?> >Active</option>
														<option value="inactive" <?php if(isset($selected_subcategory[0])){ if($selected_subcategory[0]->product_subcategory_status == 'inactive'){ echo 'selected'; }} ?> >Inactive</option>
													</select>
												</div>
											</div>
						       </div>
									<div class="col-md-6">
											<div class="form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary" name="submit" value="submit" style=" width:100%;">
												</div>
											</div>
						      </div>
									<div class="col-md-6">
											<div class="form-group">
												<div class="col-md-12">
												<a href="<?php echo base_url(); ?>subcategory/add_subcategory">	<button type="button" class="btn-transparent btn-red"  style=" width:100%;">Cancel</button></a>
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
                   <div id="failed_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
										 <div class="modal-dialog" style="width:90%;">
												 <div class="modal-content">
														 <div class="modal-close-area modal-close-df">
																 <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
														 </div>
														 <div class="modal-body" style="padding: 30px 30px; background-color:#363956; text-align:center; color:#ffffff;">
																 <span class="ion-ios-flame-outline" style="font-size:50px; color:#ff4747;"></span>
																
																 <p class="fail_model_p">Before deleting this category, delete its subcategory and its product.</p>
														 </div>
														 <div class="modal-footer danger-md" style=" background-color:#363956; border-top:none;">
																 <button class="btn-transparent btn-red" type="button" data-dismiss="modal" style="width:80px;">OK</button>
																
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


		// category and subcategory change event
		$(document).on('change','select[name=category]',function(){
					var category_id = $('select[name=category]').val();
					if(category_id === ''){
						category_id = 0;
					}

		     var redirect_link = '<?php echo base_url(); ?>subcategory/add_subcategory/'+category_id;
					window.location.href = redirect_link;
				//	alert(sub_category_id);
		});

// rediren for update section
    $(document).on('click','button[id=edit_bt]',function(){
              var edit_id = $(this).data("edit_id");
							var scroll_position = $('html').scrollTop();

              // get category id
							var url = window.location.href;
			 			  var segments = url.split( '/' );
			        var category_id = segments[7];

              var redirect_link  = '<?php echo base_url(); ?>subcategory/edit_subcategory/'+category_id+'/'+edit_id+'/'+scroll_position;

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
		              url : '<?php echo base_url(); ?>/subcategory/del_subcategory',
								  method: 'POST',
									data:{del_id: del_id},
									success:function(data){
										if(data === 'success'){
											window.location.href = window.location.href;
										}else{
                                            $('#del_alert_action').modal("toggle");
                                            $('#failed_alert').modal("toggle");
                                        }
									}
							});
	    });
});
</script>
</body>
</html>
