<?php
header('Cache-Control: max-age=900');
?>
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
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/form/all-type-forms.css">
    <style type="text/css">
        .form-control{
            height:32px;
        }
        
        #customer_table tr:hover{
        cursor: pointer;
         }
        
        label{
            
            font-weight: 500;
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
           <div class="container-fluid" style="margin-top:15px;">
            <div class="product-status-wrap mycard" style="padding-top:0px; border-top:2px solid #0099cc;">
                <div class="row" style="background-color:#f7f7f7; ">
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
                                           
                                           <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="background-color:#ffffff; height:140px; border: 1px solid #ececec; padding:10px;">
                                               <div >
                                                <!-- <div class="form-group" id="data_5" style="margin-bottom:0px;">
												        
                                                        <div class="i-checks pull-left">
                                                        <label>
														<input type="checkbox" id="" name="check" value=""> <i></i> Option one </label>
                                                        </div>
                                                 </div>--->
                                                 <div class="form-group" id="data_5" style="margin-bottom:5px;">
                                                       <div class="i-checks pull-left">
                                                            <label><input type="radio" checked="" value="sms" name="sms_type"><i></i> Send Sms </label>
                                                       </div>
                                                </div> 
                                                <div class="form-group" id="data_5" style="margin-bottom:5px;">   
                                                      <div class="i-checks pull-left">
                                                            <label><input type="radio" checked="" value="notification" name="sms_type"><i></i> Send Notification </label>
                                                       </div>
                                                   </div>
                                                   <div class="form-group" id="data_5" style="margin-bottom:5px;"> 
                                                      <div class="i-checks pull-left">
                                                            <label><input type="radio" checked="" value="both" name="sms_type"><i></i>Both </label>
                                                       </div>
												       
                                                       
                                                 </div>
                                               
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                    
                                                      <input type="button" id="submit_notification" name="submit_notification" class="btn" value="Send" style="background-color: #46c7fe; color:#ffffff; width: 100%;"/>
                                                     
                                                  </div>
                                               </div>
                                                
                                           </div>
                                    </form>
                                </div>
                             </div>
				          </div>	
                    <div id="my_noti_msg" style="width:100%; height:auto; color:red; padding:5px 18px; line-height:10px;"></div>
				 </div>
                
                 <div class="row" style="background-color:#ffffff; ">
				        <div class="search_engine" style="height:auto; min-height:60px; padding-top:15px;">
                            <div class="breadcome-heading" style="">
                                <div class="input-group"  style=" width:100%;">
                                        <input type="hidden" id="return_colony" value="<?php if(isset($return_colony)){ echo $return_colony; } ?>">
                                        <input type="hidden" id="return_status" value="<?php if(isset($return_status)){ echo $return_status; } ?>">
                                    
                                        <form action=""  method="post" id="myformsearch">
                                           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >   
                                                <div class="form-group" id="data_5" style=" height:28px;">
                                                   <input type="text" name="name_search" id="name_search" value="<?php if(isset($return_name)){ echo $return_name; } ?>" class="form-control" placeholder="Search By Customer Name" style="background-color:#ffffff; width:100%;">
                                                </div>
                                           </div>
                                           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                                             <div class="form-group" id="data_5" style=" height:28px;">
                                                  <select name="colony_search" class="form-control" style="width:100%;">
                                                      <option value="">Colony Name</option>
                                                      <?php foreach($select_colony as $row){ ?>
                                                      <option value="<?php echo $row->colony_id; ?>"><?php echo $row->colony_name ?></option>
                                                      <?php } ?>
                                                 </select>
                                             </div>
                                            </div>
                                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                      <select name="status_search" class="form-control" style="width:100%;">
                                                           <option value="">Status</option>
                                                           <option value="active">Active</option>
                                                           <option value="blocked">Blocked</option>
                                                      </select>
                                                  </div>
                                           </div>  
                                             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                     <input type="text" name="mobile_no" id="mobile_no" value="<?php if(isset($return_mobile_no)){ echo $return_mobile_no; } ?>" class="form-control" placeholder="Search By Mobile No." style="background-color:#ffffff; width:100%;">
                                                  </div>
                                           </div>
                                           <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                     <input type="submit" name="submit" class="btn" value="Search" style="background-color: #46c7fe; color:#ffffff; width: calc(100% - 48px);"/>
                                                      
                                                      <span><button type="button" id="tbl_refresh" class="btn" style="width:40px; border:1px solid #e8e8e8"><i class="ion-android-sync" style="color:#46c7fe; "></i></button></span>
                                                  </div>
                                           </div>
                                    </form>
                                </div>
                             </div>
				          </div>		
				 </div>
                
                
         
                <div class="row">
                    <div class="col-md-12">
						    <div id="myheadtitle" style=" height:52px; border-bottom:none; padding-top:15px; font-size: 15.1px; margin:0px;">
                                Customer List
                                   
                            </div>
                            <div class="asset-inner">
							      
                                <table id="" data-toggle="table" data-pagination="true" data-show-columns="true" data-show-pagination-switch="true" >
                                     <thead>
									<tr>
                                        <th>Sr. No.</th>
                                        <th><input type="checkbox" id="check_all" name=""> Check </th>
                                        <th>Customer Name</th>
								        <th>Colony</th>
                                        <th>Atm Card No.</th>
                                        <th>Phone 1</th>
                                        <th>Phone 2</th>
                                        <th>Balance</th>
                                        <th>Delivery Type</th>
                                        <th>Status</th>
										
                                    </tr>
									 </thead>
									 <tbody id="customer_table">
                                    <?php $i = 1; if(isset($all_customer)){ foreach($all_customer as $row){ ?>     
                                        
                                      <tr data-customer_id="<?php echo $row->customer_id; ?>">
                                          
                                       <td><?php echo $i++; ?></td> 
                                       <td> <input type="checkbox" name="check" value="<?php echo $row->customer_id; ?>" data-cus_no="<?php echo $row->contact_1; ?>">
                                       </td>       
                                       <td><?php echo $row->first_name.' '.$row->last_name; ?></td> 
                                       <td><?php echo $row->colony_name; ?></td>
                                       <td><?php echo $row->atm_card_no; ?></td>
                                          
                                       <td><?php echo $row->contact_1; ?></td>
                                       <td><?php echo $row->contact_2; ?></td>
                                       <td><?php echo $row->balance_amount; ?></td>    
                                       <td><?php echo $row->d_type; ?></td>  
                                       <td><?php echo $row->card_status; ?></td>  
                                       </tr>
									<?php }} ?>
									</tbody>
								</table>
                            </div>
                        
							</div>
                </div>
            </div>
	    </div>
        
        
	  
			
                   <div id="success_alert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <!--<div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>-->
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Awesome!</h2>
                                        <p class="success_model_p"></p>
                                    </div>
                                    <div class="modal-footer">
                                        
                                       <button class="btn btn-primary" type="button" id="success_ok" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
                                    </div>
                                </div>
                            </div>
                       </div>
			           <div id="failed_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Error!</h2>
                                        <p class="fail_model_p">Sorry Opration Is failed ! Try Again</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                       
                                        <button class="btn btn-primary" type="button" data-dismiss="modal" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
									</div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="del_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Are You Sure!</h2>
                                        <p class="fail_model_p">You want to delete this account.</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal" style="width:80px; background-color:#2c6be0;">No</button>
                                        <button data-delete_id="" id="del_model_bt" class="btn btn-primary" type="button"  style="width:80px; background-color:#39ae60;">Yes</button>
                                    
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
    
    <script src="<?php echo base_url('catalogs'); ?>/js/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/icheck/icheck-active.js"></script>
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
                     
                     $('input[name=msg_title]').css('border','1px solid red');
                 }else{
                     $('input[name=msg_title]').css('border','1px solid #e5e6e7');
                 }
                 
                 if(msg === ''){
                     
                     $('textarea[name=text_msg]').css('border','1px solid red');
                 }else{
                     
                     $('textarea[name=text_msg]').css('border','1px solid #e5e6e7');
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
                            $('input[name=msg_title]').css('border','1px solid #e5e6e7').val('');
                            $('textarea[name=text_msg]').css('border','1px solid #e5e6e7').val('');
                            //alert(data);
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