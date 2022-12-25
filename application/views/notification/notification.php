<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    <style type="text/css">
        .form-group{
            padding: 0px;
        }    
        
       .form-group .form-control{
           
         width: 100%;  
         padding-left: 30px;
         border:1px solid #43444a;
           background-color: transparent;
       }
        .form-group .form-control:option{
            padding: 10px;
        }
        
        .form-group .form-control:focus{
            border:1px solid #0088cc;
        }
        
        .status{
            margin-bottom: 0px;
        }
        
        .form-group .search_input_i{
            width:30px;
            height: 35px;
            position: absolute;
            color: #0088cc;
            padding: 5px 9px;
        }
    </style>
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
                            <div class="" >
				        <div class="search_engine" style="height:auto; min-height:60px; padding-top:15px;">
                            <div class="breadcome-heading" style="">
                                <div class="input-group"  style=" width:100%;">
                                       
                                        <form action=""  method="post" >
                                           <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" >
                                                <p style="width:100%; height:30px; color:#ffffff; background-color:#4caf50; padding: 3px 10px; text-align:center; display:none; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.6);" id="success_noti">
                                                    Message is successfuly sended.
                                               </p>
                                                <p style="width:100%; height:30px; color:#ffffff; background-color:#fa0c23; padding: 3px 10px; text-align:center; display:none;" id="success_noti">
                                                   Process is failed!
                                               </p> 
                                               <!-- 
                                               <div class="form-group" id="data_5" style=" height:28px;">
                                                    <select class="form-control">
                                                        <option>one</option>
                                                        <option>one</option>
                                                        <option>one</option>
                                                    </select>   
                                                </div>
                                                -->
                                                <div class="form-group" id="data_5" style=" height:28px;">
                                                    
                                                    <input type="text" name="msg_title" value="" class="form-control" placeholder="Title"/>
                                                       
                                                </div>
                                               
                                               <div class="form-group" id="data_5" style=" height:28px;">
                                                    <textarea name="text_msg" style="width:100%; height:100px;" class="form-control" placeholder="Type Message Here"></textarea>
                                                       
                                                </div>
                                               <input type="hidden" value="" name="all_customer_id" />
                                               <input type="hidden" value="" name="all_customer_mobile" />
                                           </div>
                                           
                                           <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" >
                                               <div style=" height:140px; border: 1px solid #51557d; padding:10px;" >
                                                <!-- <div class="form-group" id="data_5" style="margin-bottom:0px;">
												        
                                                        <div class="i-checks pull-left">
                                                        <label>
														<input type="checkbox" id="" name="check" value=""> <i></i> Option one </label>
                                                        </div>
                                                 </div>--->
                                                <!--
                                                 <div class="form-group" id="data_5" style="margin-bottom:5px;">
                                                       <div class="i-checks pull-left">
                                                            <label><input type="radio" checked="" value="sms" name="sms_type"><i></i> Send Sms </label>
                                                       </div>
                                                </div> 
                                               -->
                                                <div class="form-group" id="data_5" style="margin-bottom:5px; display:none;">   
                                                      <div class="i-checks pull-left">
                                                            <label><input type="radio" checked="" value="notification" name="sms_type"><i></i> Send Notification </label>
                                                       </div>
                                                   </div>
                                                    <!--
                                                   <div class="form-group" id="data_5" style="margin-bottom:5px;"> 
                                                      <div class="i-checks pull-left">
                                                            <label><input type="radio" checked="" value="both" name="sms_type"><i></i>Both </label>
                                                       </div>
												       
                                                       
                                                 </div>
                                                -->
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                    
                                                      <input type="button" id="submit_notification" name="submit_notification" class="btn" value="Send" style="background-color: #0088cc; border:1px solid #0088cc;  color:#ffffff; width: 100%;"/>
                                                     
                                                  </div>
                                               </div>
                                                
                                           </div>
                                    </form>
                                </div>
                             </div>
				          </div>	
                    <div id="my_noti_msg" style="width:100%; height:auto; color:red; padding:5px 18px; line-height:10px;"></div>
				 </div>  
                <div class="row" style="padding:0px 14px;">
				        <div class="search_engine" style="height:auto; min-height:60px; padding-top:15px;">
                            <div class="breadcome-heading" style="">
                                <div class="input-group"  style=" width:100%;">
                                        <input type="hidden" id="return_colony" value="<?php if(isset($return_colony)){ echo $return_colony; } ?>">
                                        <input type="hidden" id="return_status" value="<?php if(isset($return_status)){ echo $return_status; } ?>">
                                    
                                        <form action=""  method="post" id="myformsearch">
                                           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >   
                                                <div class="form-group" id="data_5" style=" height:28px;">
                                                     <span class="search_input_i"><i class="fa fa-search"></i></span>
                                                   <input type="text" name="name_search" id="name_search" value="<?php if(isset($return_name)){ echo $return_name; } ?>" class="form-control" placeholder="Customer Name" style="width:100%;">
                                                </div>
                                           </div>
                                          
                                             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                       <span class="search_input_i"><i class="fa fa-search"></i></span>
                                                     <input type="text" name="mobile_no" id="mobile_no" value="<?php if(isset($return_mobile_no)){ echo $return_mobile_no; } ?>" class="form-control" placeholder="Mobile No." style=" width:100%;">
                                                  </div>
                                           </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >   
                                                <div class="form-group" id="data_5" style=" height:28px;">
                                                     <span class="search_input_i"><i class="fa fa-search"></i></span>
                                                   <input type="email" name="email_search" id="email_search" value="<?php if(isset($return_email)){ echo $return_email; } ?>" class="form-control" placeholder="Email Address" style="width:100%;">
                                                </div>
                                           </div>
                                          
                                           <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                     <input type="submit" name="submit" class="btn" value="Search" style="background-color: #0088cc; color:#ffffff; width: calc(100% - 48px);"/>
                                                      
                                                      <span><button type="button" id="tbl_refresh" class="btn" style="width:40px; border:1px solid #0088cc; background-color:transparent;"><i class="ion-android-sync" style="color:#46c7fe; "></i></button></span>
                                                  </div>
                                           </div>
                                    </form>
                                </div>
                             </div>
				          </div>		
				 </div>            
                            
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Send Notification
													</h2>
									    </div>
								</header>
							  <div class="panel-body " style="padding-top:0px;">
                                  <table id="" data-toggle="table" data-pagination="true" data-show-columns="true" data-show-pagination-switch="true" style="border-bottom:1px solid transparent;">
                                     <thead>
									<tr>
                                        <th>Sr. No.</th>
                                        <th><input type="checkbox" id="check_all" name=""> Check </th>
                                        <th>Customer Name</th>
								        
                                        <th>Phone 1</th>
                                        <th>Phone 2</th>
                                        <th>Balance</th>
                                       
                                    </tr>
									 </thead>
									 <tbody id="customer_table">
                                    <?php $i = 1; if(isset($all_customer)){ foreach($all_customer as $row){ ?>     
                                        
                                      <tr data-customer_id="<?php echo $row->customer_id; ?>">
                                          
                                       <td><?php echo $i++; ?></td> 
                                       <td> <input type="checkbox" name="check" value="<?php echo $row->customer_id; ?>" data-cus_no="<?php echo $row->contact_1; ?>">
                                       </td>       
                                       <td><?php echo $row->customer_name; ?></td> 
                                       
                                       <td><?php echo $row->contact_1; ?></td>
                                       <td><?php echo $row->email_id; ?></td>
                                       <td><?php echo $row->balance_amount; ?></td>    
                                        
                                       </tr>
									<?php }} ?>
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

<?php $this->load->view('common/footer_script'); ?>
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/image-compressor.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
	 $(document).ready(function(){
        
        $('input[name=all_customer_mobile]').val('');
        $('input[name=all_customer_id]').val('');
        
        function select_take(){ 
             var select_colony = $('input[id=return_colony]').val();
             
             var select_status = $('input[id=return_status]').val();                 
             
            $('select[name=colony_search]').val(select_colony);
            
            $('select[name=status_search]').val(select_status);
      
        } 
        select_take();
        
        $(document).on('click', '#tbl_refresh',function(){
            
           window.location.href =   window.location.href;
            
        });
        
       $(document).on('click', 'input[name=check]',function(){
            var all_customer_id = [];
            var all_customer_no = [];
           var checked = $('input[name=check]:checked').each(function(){
               var id = $(this).val();
               var no = $(this).data('cus_no');
               all_customer_id.push(id);
               all_customer_no.push(no);
           });
          $('input[name=all_customer_id]').val(all_customer_id);
           $('input[name=all_customer_mobile]').val(all_customer_no); 
        });
        
        
        
         $(document).on('click', '#submit_notification',function(){
               $('#my_noti_msg').text('');
             
               var send_type = $('input[name=sms_type]:checked').val();
               var title = $('input[name=msg_title]').val();
               var msg  = $('textarea[name=text_msg]').val();
               var customer_id = $('input[name=all_customer_id]').val();
               var mobile_no = $('input[name=all_customer_mobile]').val();
             if(mobile_no === '' || customer_id === '' || title === '' || msg === ''){
                   
                 if(mobile_no === '' || customer_id === ''){
                     
                     $('#my_noti_msg').text('Plese check customer list.');
                 }
                 
                 if(title === '' ){
                     
                     $('input[name=msg_title]').css('border','1px solid #ff4748');
                 }else{
                     $('input[name=msg_title]').css('border','1px solid #3d415f');
                 }
                 
                 if(msg === ''){
                     
                     $('textarea[name=text_msg]').css('border','1px solid #ff4748');
                 }else{
                     
                     $('textarea[name=text_msg]').css('border','1px solid #3d415f');
                 }
                   
             }else{
                 
                 
             
                  $.ajax({
                      
                        type: 'POST',
						url: '<?php echo base_url(); ?>notification/send_notification',
						data: {title:title,msg:msg, customer_id:customer_id,mobile_no:mobile_no,send_type:send_type},
						beforeSend: function(){

							$('#submit_notification').val('Processing...');

						},

						success: function(data){
                            $('input[name=msg_title]').css('border','1px solid #3d415f').val('');
                            $('textarea[name=text_msg]').css('border','1px solid #3d415f').val('');
                           // alert(data);
                             $('#success_noti').slideDown("1000");
                            $('#submit_notification').val('Send');
                            setTimeout(function(){  $('#success_noti').slideUp("1000"); }, 2000);
                            

                       }
                      
                  });
                 
             }
          });
        
         $(document).on('click', '#check_all',function(){
             if($('input[id=check_all]').is(':checked')){
                      $('input[name=check]').prop("checked",true);
                 
                       var all_customer_id = [];
                       var all_customer_no = [];
                       var checked = $('input[name=check]:checked').each(function(){
                          var id = $(this).val();
                          var no = $(this).data('cus_no');
                          all_customer_id.push(id);
                          all_customer_no.push(no);
                       });
                     $('input[name=all_customer_id]').val(all_customer_id);
                     $('input[name=all_customer_mobile]').val(all_customer_no); 
             }else{
                 $('input[name=check]').prop("checked",false);
                 
                 var all_customer_id = [];
                       var all_customer_no = [];
                       var checked = $('input[name=check]:checked').each(function(){
                          var id = $(this).val();
                          var no = $(this).data('cus_no');
                          all_customer_id.push(id);
                          all_customer_no.push(no);
                       });
                     $('input[name=all_customer_id]').val(all_customer_id);
                     $('input[name=all_customer_mobile]').val(all_customer_no); 
             }
         });     
    });
    
</script>
</body>
</html>
