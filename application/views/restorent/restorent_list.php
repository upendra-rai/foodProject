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
						<div class="col-md-12" style="padding:0px; margin-bottom:15px;">
						<section class="section_card" id="table_section">
								 <header class="panel-heading" style="padding:10px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Outlet List
													</h2>

													<a href="<?Php echo base_url(); ?>restorent/add"><button type="btn" class="btn-transparent btn-green" style="position:absolute; right:12px; top:8px;">Add Outlet</button></a>
									    </div>
								</header>
							  <div class="panel-body " style="padding-top:0px;">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
											   <th>Sr no</th>
										     <th>Restorent Name</th>
											   <th>Address</th>
										     <th>Landmark</th>
												 <th>City</th>
												 <th>Outlet Status</th>
											   <th>Edit</th>
                                            <th>Delete</th>

										</tr>
									</thead>
									<tbody>
										  <?php $i = 1; foreach($list as $row){ ?>
                          <tr>
														  <td><?php echo $i++; ?></td>
                                                            
														  <td><?php echo $row->outlet_name; ?></td>
                          	  <td><?php echo $row->outlet_address; ?></td>
														  <td><?php echo $row->land_mark; ?></td>
														  <td><?php echo $row->city; ?></td>

															<td><?php echo $row->outlet_status; ?></td>
														  <td style=" text-align:center;"><a href="<?php echo base_url(); ?>restorent/edit/<?php echo $row->outlet_id; ?>"><button class="btn btn-primary" id=""  data-edit_id="" style="color:#248afd; "><i class="fa fa-pencil"></i></button></a></td>
                                                             <td style="text-align:center;"><button type="button" class="btn btn-primary" name="confirm_del_action" data-confirm_del_id="<?php echo $row->outlet_id; ?>" style="color:#ff4747; "><i class="fa  fa-times-circle"></i></button></td>
                          </tr>
										<?php } ?>
									</tbody>
								</table>
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
																
																 <p class="fail_model_p"></p>
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
		
    // set scroll position

	

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
    $(document).on('click','button[name=confirm_del_action]',function(){
       
						 var confirm_del_id = $(this).data("confirm_del_id");
						 $('#del_bt').data('del_id',confirm_del_id);
						 $('#del_alert_action').modal("toggle");
		});

		$(document).on('click','button[id=del_bt]',function(){
			   var del_id = $(this).data("del_id");
							$.ajax({
		              url : '<?php echo base_url(); ?>/restorent/delete_outlet',
								  method: 'POST',
									data:{del_id: del_id},
									success:function(data){
										
										if(data === 'success'){
											window.location.href = window.location.href;
										}else if(data === 'staff_member_exist'){
                                            
                                            $('.fail_model_p').text('Before deleting this outlet, delete all the users and delivery person related to it.');
                                            $('#del_alert_action').modal("toggle");
                                            $('#failed_alert').modal("toggle");
                                        }else if(data === 'product_category_exist'){
                                            
                                            $('.fail_model_p').text('Before deleting this outlet, delete all the product category related to it.');
                                            $('#del_alert_action').modal("toggle");
                                            $('#failed_alert').modal("toggle");
                                        }else{
                                            window.location.href = window.location.href;
                                        }
                                        
									}
							});
	    });
});
</script>
</body>
</html>
