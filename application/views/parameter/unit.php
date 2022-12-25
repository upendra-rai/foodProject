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
														Unit Management
													</h2>
									    </div>
                                      <?php if(isset($_GET['alert'])){ ?>
                                     <div class="alert" style="background-color:#49392c; color:#f6a726; width:100%; padding: 0px 10px; position:relative; margin-bottom:5px;">
                                         
                                         <p class="alert_p" style="padding:0px; margin:0px;"> <?php  echo $_GET['alert']; ?> </p>
                                         
                                         <button class="bt" type="button" name="clear_alert" style="position:absolute; right:5px; top:0px; padding:1px; background-color:transparent; border:none;">X</button>
                                     </div>
                                   <?php } ?>
                                     
								</header>
							  <div class="panel-body " style="padding-top:0px;">
                                   <form action="" method="POST">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
											   <th>Sr no</th>
										       <th>Unit</th>
											   <th>Edit</th>
											   <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        
                                        <?php if(isset($edit_id)){ ?>
    
                                            <tr>
                                                 <td>Edit</td>
                                                 <td><input type="text" name="unit" value="<?php if(isset($selected_item)){ echo $selected_item[0]->unit_name; } ?>" class="form-control" value="" required/></td>
                                                 <td></td>
                                                 <td><input type="submit" name="submit" class="btn btn-primary" value="submit"></td>
                                            </tr>
                                        <?php  }else{ ?>
                                            <tr>
                                                 <td>Add</td>
                                                 <td><input type="text" name="unit" class="form-control" value="" required/></td>
                                                 <td></td>
                                                 <td><input type="submit" name="submit" class="btn btn-primary" value="submit" ></td>
                                            </tr>
                                        <?php } ?>
                                        
                                        
										  <?php $i = 1; foreach($unit_list as $row){ ?>
                                        <tr>                         
                              
                                                         
														  <td><?php echo $i++; ?></td>
														  <td style="width:110px; padding:4px; text-align:center;"><?php echo $row->unit_name; ?></td>
                          	 
                                                           <td style=" text-align:center;"><a href="<?php echo base_url(); ?>parameter/edit_unit/<?php echo $row->unit_id; ?>"><button class="btn btn-primary" type="button"  data-edit_id="<?php echo $row->unit_id; ?>" style="color:#248afd; "><i class="fa fa-pencil"></i></button></a></td>
										      	          <td style="text-align:center;"><button type="button" class="btn btn-primary" id="confirm_del_action" data-confirm_del_id="<?php echo $row->unit_id; ?>" style="color:#ff4747; "><i class="fa  fa-times-circle"></i></button></td>
                          </tr>
										<?php } ?>
									</tbody>
                                    
								</table>
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
    
     $(document).on('click','button[id=confirm_del_action]',function(){
						 var confirm_del_id = $(this).data("confirm_del_id");
						 $('#del_bt').data('del_id',confirm_del_id);
						 $('#del_alert_action').modal("toggle");
		});

		$(document).on('click','button[id=del_bt]',function(){
			   var del_id = $(this).data("del_id");
							$.ajax({
		              url : '<?php echo base_url(); ?>/parameter/del_unit',
								  method: 'POST',
									data:{del_id: del_id},
									success:function(data){
										//alert(data);
										if(data === 'success'){
											window.location.href ='<?php echo base_url(); ?>parameter/add_unit';
										}
									}
							});
	    });
     
});
</script>
</body>
</html>
