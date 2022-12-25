<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    <style type="text/css">
        .form-control{
            height: 35px;
            text-align: center;
        }
        
        
        .input_rs{
                position: absolute;
    width: 30px;
    height: 30px;
    border: 1px solid #0088cc;
    padding: 9px;
    background-color: #0088cc;

            
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
                  <form class="form-horizontal form-bordered" action="" method="post">
					<div class="col-md-8" style="padding:0px;">
					<section class="section_card">
						 <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; margin-bottom:5px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; ">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
									Manage Points
									</h4>
						         </div>
                        <div class="panel-body " style="padding-top:0px;">
                            
                                 
								   <table class="table mb-none">
									 <thead>
									   	<tr>
											   <th>Task</th>
                                            <th>Points Value</th>
										     <th></th>
											  <th></th>
										    <th></th>
										</tr>
									</thead>
									<tbody>
										 <tr>
                                             <td style="width:180px;">Set 1 Point value</td>  
                                             <td><i class="fa fa-rupee input_rs"></i><input type="number" class="form-control" name="point_value" value="<?php if(isset($mysetting)){ echo $mysetting[0]->point_value; } ?>" name="" required></td>  
                                             <td><input type="submit" class="btn-transparent btn-blue" name="submit" value="submit" /> </td>  
                                              <td><input type="text" class="form-control" value="" name="" style="opacity:0;" readonly></td>  
                                              <td><input type="text" class="form-control" value="" name="" style="opacity:0;" readonly></td>  
                                        </tr>
                                        
                                      
									</tbody>
								</table>
                           
                         
							</div>
                        
						
          </section>
                        
                        
                        
                        <section class="section_card" style="margin-top:10px;">
						 <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; margin-bottom:5px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; ">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
									Manage Loyalty Points
									</h4>
						 </div>
					
                        <div class="panel-body " style="padding-top:0px;">
                          
                            
                                <table class="table mb-none">
									 <thead>
									   	<tr>
											   <th>Task</th>
                                            <th>Insert Point</th>
										     <th>Point Value</th>
											   <th>Sales Figure</th>
										      <th></th>
										</tr>
									</thead>
									<tbody>
										
                                        <tr>
                                             <td style="width:180px;">Loyalty Points</td>  
                                             <td><input type="number" class="form-control" value="<?php if(isset($mysetting)){ echo $mysetting[0]->loyalty_sales_point; } ?>" name="loyal_point" required></td>  
                                             <td><i class="fa fa-rupee input_rs"></i><input type="number" class="form-control" value="<?php if(isset($mysetting)){ echo $mysetting[0]->point_value * $mysetting[0]->loyalty_sales_point; } ?>" name="calculate_value" ></td>  
                                             <td><i class="fa fa-rupee input_rs"></i><input type="number" class="form-control" value="<?php if(isset($mysetting)){ echo $mysetting[0]->loyalty_sales_figure; } ?>" name="loyal_sales_figure" required></td> 
                                              <td><input type="submit" class="btn-transparent btn-blue" name="submit" value="submit" /> </td> 
                                            
                                        </tr>
                                       
									</tbody>
								</table>
                                
                              
                        
							</div>
                        
						
          </section>
                        
                        
                        
                    <section class="section_card" style="margin-top:10px;">
						 
                       <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px;  margin-bottom:5px;">
						      <h4 style="padding:0px; margin:0px; font-size:16px;  ">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
									Manage Reffer Points
									</h4>
						 </div>
					
                        <div class="panel-body " style="padding-top:0px;">
                            
                                <table class="table mb-none">
									 <thead>
									   	<tr>
											   <th>Task</th>
                                            <th>Reffer Point</th>
										     <th></th>
											   <th></th>
										      <th></th>
										</tr>
									</thead>
									<tbody>
										
                                        <tr>
                                             <td style="width:180px;">Reffer Points</td>  
                                             <td><input type="number" class="form-control" value="<?php if(isset($mysetting)){ echo $mysetting[0]->reffer_and_earn; } ?>" name="reffer_point" required></td>  
                                            <td><input type="submit" class="btn-transparent btn-blue" name="submit" value="submit" /> </td> 
                                             <td><input type="text" class="form-control" value="" name="" style="opacity:0;" readonly></td>  
                                              <td><input type="text" class="form-control" value="" name="" style="opacity:0;" readonly></td>  
                                        </tr>
                                       
									</tbody>
                                  
								</table>
                           
							</div>
                        
						
          </section>   
                        
				</div>
		<!-- main section -->
                                           </form>

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
    
    $(document).on('keyup','input[name=loyal_point]',function(){
        
        
         var point_value = $('input[name=point_value]').val();
         var insert_point = $(this).val();
         
         var cal = Math.abs(point_value) * Math.abs(insert_point);
          
         $('input[name=calculate_value]').val(cal);
         
    });
             
});
</script>
</body>
</html>
