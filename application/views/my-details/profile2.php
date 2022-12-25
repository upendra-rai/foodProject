<!DOCTYPE html>

<html>

  <head>



    <title>Profile | </title>



    <?php $this->load->view('common/inc.inner-head.php'); ?>



  </head>



  <body class="hold-transition skin-blue sidebar-mini fixed">



    <div class="wrapper">



      <?php $this->load->view('common/sidemenu.php'); ?>



      <div class="content-wrapper">        



        <!-- Content Header (Page header) -->

        <section class="content-header">        



          <?php echo @$message; ?>



          <h1>

            My Profile

          </h1>

        </section>



        <!-- Main content -->

        <section class="content">



          <div class="row">

            <div class="col-md-3">



              <!-- Profile Image -->

              <div class="box box-primary">

                <div class="box-body box-profile">

                  <img class="profile-user-img img-responsive img-circle" src="<?php if($user_data[0]->profile_pic == '') { echo base_url().'catalogs/img/default.png'; } else { echo base_url(); ?>uploads/profile/thumbnail/<?php echo $user_data[0]->profile_pic; } ?>" alt="User profile picture">



                  <h3 class="profile-username text-center"><?php echo $user_data[0]->fname.' '.$user_data[0]->lname; ?></h3>



                  <p class="text-muted text-center">Administrator</p>



                  <?php echo form_open_multipart('dashboard/profile'); ?>

                    <input style="height: 0;width: 0;" type="file" name="userfile" id="pic" onchange="$('#profile-pic-submit').click()">                

                    <button class="btn btn-primary btn-block" type="button" onclick="$('#pic').click()">Change Profile Picture</button>

                    <input type="submit" name="submit" value="update-pic" id="profile-pic-submit" style="visibility:hidden;">

                  </form>



                </div>

                <!-- /.box-body -->

              </div>



            </div>

            <!-- /.col -->

            <div class="col-md-9">

              <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">

                  <li class="active"><a href="#profile" data-toggle="tab">My Profile</a></li>

                  <li><a href="#edit-profile" data-toggle="tab">Update Profile</a></li>

                  <li><a href="#update-pass" data-toggle="tab">Update Password</a></li>

                </ul>

                <div class="tab-content">

                  <div class="active tab-pane" id="profile">

                    <form class="form-horizontal">

                      <div class="form-group">

                        <label class="col-sm-2 control-label">Name</label>



                        <div class="col-sm-10">

                          <h5><?php echo $user_data[0]->fname.' '.$user_data[0]->lname; ?></h5>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="col-sm-2 control-label">Role</label>



                        <div class="col-sm-10">

                          <h5>Administrator</h5>

                        </div>

                      </div>                  

                      <div class="form-group">

                        <label class="col-sm-2 control-label">Email</label>



                        <div class="col-sm-10">

                          <h5><?php echo $user_data[0]->email; ?></h5>

                        </div>

                      </div>

                    </form>

                  </div>

                  <div class="tab-pane" id="edit-profile">

                    <form class="form-horizontal" method="post" action="">

                      <div class="form-group">

                        <label class="col-sm-2 control-label">First Name</label>



                        <div class="col-sm-10" id="valid_fname">

                          <input type="text" class="form-control" value="<?php echo $user_data[0]->fname; ?>" placeholder="Enter here" name="fname" >

                          <span style="color:red;"></span>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="col-sm-2 control-label">Last Name</label>



                        <div class="col-sm-10" id="valid_lname">

                          <input type="text" class="form-control" value="<?php echo $user_data[0]->lname; ?>" placeholder="Enter here" name="lname" >

                          <span style="color:red;"></span>

                        </div>

                      </div>                  

                      <div class="form-group">

                        <label class="col-sm-2 control-label">Email</label>



                        <div class="col-sm-10" id="valid_email">

                          <input type="email" class="form-control" value="<?php echo $user_data[0]->email; ?>" placeholder="Enter here" name="email" >

                          <span style="color:red;"></span>

                        </div>

                      </div>



                      <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">

                          <button type="button" id="btn-update" class="btn btn-danger">Submit</button>

                          <input type="submit" name="submit" value="update-info" id="submit-btn-update" style="visibility:hidden;">

                        </div>

                      </div>

                    </form>

                  </div>



                  <div class="tab-pane" id="update-pass">

                    <form class="form-horizontal" method="post" action="">

                      <div class="form-group">

                        <label class="col-sm-2 control-label">New Password</label>



                        <div class="col-sm-10" id="valid_pass1">

                          <input type="password" class="form-control" placeholder="Enter Password" >

                          <span style="color:red;"></span>

                        </div>

                      </div>



                      <div class="form-group">

                        <label class="col-sm-2 control-label">Re-enter Password</label>



                        <div class="col-sm-10" id="valid_pass">

                          <input type="password" class="form-control" name="password" placeholder="Re-enter Password" >

                          <span style="color:red;"></span>

                        </div>

                      </div>                  



                      <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">

                          <button type="button" id="btn-update-pass" class="btn btn-danger">Submit</button>

                          <input type="submit" name="submit" value="update-pass" id="submit-btn-update-pass" style="visibility:hidden;">

                        </div>

                      </div>

                    </form>

                  </div>              

                  <!-- /.tab-pane -->

                </div>

                <!-- /.tab-content -->

              </div>

              <!-- /.nav-tabs-custom -->

            </div>

            <!-- /.col -->

          </div>

          <!-- /.row -->



        </section>

        <!-- /.content -->

      </div>



      <?php $this->load->view('common/footer.php'); ?>



    </div>

    <!-- ./wrapper -->



    <?php $this->load->view('common/inc.inner-script.php'); ?>



  <script type="text/javascript">



    $(document).ready(function(){



      $("#btn-update").click(function(){

        validate_update_form();

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

