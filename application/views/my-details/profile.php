<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.print.min.css">
    
   <!-- touchspin CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/touchspin/jquery.bootstrap-touchspin.min.css">	
</head>

<body>
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">
        
        <?php $this->load->view('common/titlebar'); ?>
		<div class="container-fluid" style="margin-top:35px;">
		   <div class="col-md-4">
		        <div class="courses-inner res-mg-b-30" style="text-align: center;">
                            <div class="courses-title">
                                <a href="#"><img src="<?php echo base_url('catalogs'); ?>/img/logo.png" alt=""></a>
                                <h2>Sharma Dairy</h2>
								<p>Administrator</p>
                            </div>
                            
                            <div class="product-buttons">
                                <button type="button" class="button-default cart-btn" style="width:100%; background-color:#0099cc;">Admin</button>
                            </div>
                        </div>
		   </div>
		   <div class="col-md-8">
		        <div class="product-status-wrap mycard">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                  		<ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Profile</a></li>
                                <li><a href="#reviews"> Update Information</a></li>
                                <li><a href="#INFORMATION">Change Password</a></li>
                            </ul>	
                        <div id="myTabContent" class="tab-content custom-product-edit" style="border:1px solid #e5e5e5; margin-top:10px; padding:30px;">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                      <form action="#">
									         <div class="input-group">
											    <span class="input-group-addon">Name</span>
                                                <input name="" type="text" class="form-control" value="<?php echo $user_data[0]->name; ?>" placeholder="Name" readonly="readonly">
                                             </div>
                                             <div class="input-group">
											    <span class="input-group-addon">Role &nbsp </span>
                                                <input name="" type="text" class="form-control" value="Administrator" placeholder="Role" readonly="readonly">
                                             </div>
											 <div class="input-group">
											    <span class="input-group-addon">Email</span>
                                                <input name="" type="text" class="form-control" value="<?php echo $user_data[0]->email; ?>" placeholder="Email ID" readonly="readonly">
                                             </div>
											
											 
									   </form>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <form method="post" action="">
										    <div class="input-group">
											    <span class="input-group-addon">Name</span>
                                                <input type="text" class="form-control form-line" value="<?php echo $user_data[0]->name; ?>" placeholder="Enter here" name="fname" >
                                                <span style="color:red;"></span>
                                             </div>
                                           
											<div class="input-group">
											    <span class="input-group-addon">Email Id</span>
                                                <input type="email" class="form-control form-line" value="<?php echo $user_data[0]->email; ?>" placeholder="Enter here" name="email" >
                                      
                                                <span style="color:red;"></span>
                                            </div>
										</form>	
                                           <div class="input-group">
											    <button type="button" id="btn-update" class="btn btn-primary waves-effect waves-light" style="background-color:#0099cc;">Submit</button>
                                            </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                       <form action="#">
                                           <div class="input-group">
											    <span class="input-group-addon"></span>
                                                <input type="password" class="form-control form-line" value="" placeholder="Previos Password" name="o_pass" />
                                              
                                                <span style="color:red;"></span>
                                             </div>
                                           <div class="input-group">
											    <span class="input-group-addon"></span>
                                                <input type="password" class="form-control form-line" value="" placeholder="New Password" name="n_pass" >
                                                <span style="color:red;"></span>
                                             </div>
                                           <div class="input-group">
											    <span class="input-group-addon"></span>
                                                <input type="password" class="form-control form-line" value="" placeholder="Retype Password" name="r_pass" >
                                                <span id="pass_span" style="color:red;"></span>
                                             </div>
                                            <input type="hidden" id="o_pass" value="<?php echo $user_data[0]->password; ?>" />
										</form>
                                           <div class="input-group">
											    <button type="button" id="btn-change_pass" class="btn btn-primary waves-effect waves-light" style="background-color:#0099cc;">Submit</button>
                                            </div>
                                    </div>
                                </div>
                        </div>
						
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
		
		
	</div>

   <?php $this->load->view('common/footer_script'); ?>
    
	 <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
	<!-- touchspin JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/touchspin-active.js"></script>	
 <script type="text/javascript">



    $(document).ready(function(){



      $("#btn-update").click(function(){

          var first_name = $('input[name=fname]').val();
         
          var email  = $('input[name=email]').val();
          
          $.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>dashboard/update_my_profile',
     				 data:{first_name:first_name,email:email},
     				 success:function(noti){
     					 if(noti == "success"){
                             $('.success_model_p').text('Profile Successfully Updated');
                             $('#success_alert').modal('toggle');
                         }
     				 }
     	    });

      });
        
       $("#btn-change_pass").click(function(){
          var o_pass = $('input[name=o_pass]').val();
          var n_pass = $('input[name=n_pass]').val();
          var r_pass = $('input[name=r_pass]').val();
          var check_pass = $('input[id=o_pass]').val();
           if(check_pass == o_pass){
           
           if(n_pass == r_pass){
               
               $.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>dashboard/change_pass',
     				 data:{n_pass:n_pass,r_pass:r_pass},
     				 success:function(noti){
     					 if(noti == "success"){
                             $('.success_model_p').text('Password Successfully Changed');
                             $('#success_alert').modal('toggle');
                         }else{
                             
                              $('#failed_alert').modal('toggle');
                         }
     				 }
     	      });
               
           }else{
               
               $('#pass_span').text('password is not match');
           }
          
           }else{
               $('#pass_span').text('wrong previos password');
               
           }

      });    
        
        

      $(document).on('click','#success_ok',function(){
			
		  window.location.href = window.location.href;
			
		});
		$(document).on('click','#failed_alert',function(){
			
			 window.location.href = window.location.href;
			
		});
         

      function validate_update_form(){



        var nameReg = /^([A-Za-z]{3,})+$/;

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        var numbReg = /^([789][0-9]{9,9})+$/;        

        

        var valid_fname = $("#valid_fname input").val();

        var valid_lname = $("#valid_lname input").val();

        var valid_email = $("#valid_email input").val();



        if(valid_fname == ''){

          $("#valid_fname span").text('Field required.');

          $("#valid_fname span").css('display', 'block');

          svalid_fname = "not";

        } else if(!nameReg.test(valid_fname)){

          $("#valid_fname span").text('Invalid Name');

          $("#valid_fname span").css('display', 'block');

          svalid_fname = "not";

        } else {

          $("#valid_fname span").text('');

          $("#valid_fname span").css('display', 'none');

          svalid_fname = "OK";

        }



        if(valid_lname == ''){

          $("#valid_lname span").text('Field required.');

          $("#valid_lname span").css('display', 'block');

          svalid_lname = "not";

        } else if(!nameReg.test(valid_lname)){

          $("#valid_lname span").text('Invalid Name');

          $("#valid_lname span").css('display', 'block');

          svalid_lname = "not";

        } else {

          $("#valid_lname span").text('');

          $("#valid_lname span").css('display', 'none');

          svalid_lname = "OK";

        }      



        if(valid_email == ''){

          $("#valid_email span").text('Field required.');

          $("#valid_email span").css('display', 'block');

          svalid_email = "not";

        } else if(!emailReg.test(valid_email)) {

          $("#valid_email span").text('Please enter valid Email.');

          $("#valid_email span").css('display', 'block');

          svalid_email = "not";

        } else {

          $("#valid_email span").text('');

          $("#valid_email span").css('display', 'none');

          svalid_email = "OK";

        }



        if(svalid_fname == 'OK' && svalid_lname == 'OK' && svalid_email == 'OK'){

          $("#submit-btn-update").click();

        }      

      }



      $("#btn-update-pass").click(function(){

        validate_password_form();

      });



      function validate_password_form(){



        valid_pass1 = $("#valid_pass1 input").val();

        valid_pass = $("#valid_pass input").val();



        if(valid_pass1 == ''){

          $("#valid_pass1 span").text('Field required.');

          $("#valid_pass1 span").css('display', 'block');

          svalid_pass1 = "not";

        } else {

          $("#valid_pass1 span").text('');

          $("#valid_pass1 span").css('display', 'none');

          svalid_pass1 = "OK";

        }



        if(valid_pass == ''){

          $("#valid_pass span").text('Field required.');

          $("#valid_pass span").css('display', 'block');

          svalid_pass = "not";

        } else if(valid_pass1 != valid_pass) {

          $("#valid_pass span").text('Pasword not matched.');

          $("#valid_pass span").css('display', 'block');

          svalid_pass = "not";

        } else {

          $("#valid_pass span").text('');

          $("#valid_pass span").css('display', 'none');

          svalid_pass = "OK";

        }



        if(svalid_pass1 == "OK" && svalid_pass == "OK"){

          $("#submit-btn-update-pass").click();

        }



      }



      $("#notification").delay(3000);

      $("#notification").fadeOut('slow', function(){

        window.location.href = window.location.href;

      });



    });
   
     
  </script> 
    
</body>
</html>