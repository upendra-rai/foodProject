<!DOCTYPE html>

<html>

  <head>



    <title>Reset Password | </title>



    <?php $this->load->view('common/inc.inner-head.php'); ?>



  </head>


  <body class="hold-transition login-page">

    <div class="login-box">

      <div class="login-logo">

        <a href="#"><b></b> Admin</a>

      </div>

      <!-- /.login-logo -->

      

      <?php echo @$message; ?>



      <div class="login-box-body">

        <p class="login-box-msg">Please enter your New Password</p>



        <form action="" method="post">



          <div class="form-group" id="valid_pass1">

            <label for="password1">New Password</label>

            <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter here">

            <span style="color:red;display:none;">Field required</span>

          </div> 



          <div class="form-group" id="valid_pass2">

            <label for="password">Re-enter Password</label>

            <input type="password" class="form-control" id="password" name="password" placeholder="Enter here">

            <span style="color:red;display:none;">Field required</span>

          </div>                      



          <div class="row">

            <div class="col-xs-12">

              <button type="button" id="btn-form-submit" style="width:100%;border-radius:0px !important;" class="btn btn-primary">Submit</button>

              <input id="form-submit" style="visibility:hidden;" type="submit" name="submit" value="submit" />

            </div>

            <!-- /.col -->

          </div>



        </form>

        <br>

        <a href="<?php echo base_url('admin/login'); ?>" class="text-center">Go back to login page</a>



      </div>

      <!-- /.login-box-body -->

    </div>

    <!-- /.login-box -->



    <?php $this->load->view('common/inc.inner-script.php'); ?>



    <script type="text/javascript">

      $(document).ready(function(){



        $("#btn-form-submit").click(function(){

          validate_Form();

        });

        

        function validate_Form(){



          var nameReg = /^([A-Za-z]{3,})+$/;

          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

          var numbReg = /^([789][0-9]{9,9})+$/;        

          

          var valid_pass1 = $("#valid_pass1 input").val();

          var valid_pass2 = $("#valid_pass2 input").val();



          if(valid_pass1 == ''){



            $("#valid_pass1 span").text('Field required.');

            $("#valid_pass1 span").css('display', 'block');



          } else {



            $("#valid_pass1 span").css('display', 'none');

            svalid_pass1 = "OK";

          } 



          if(valid_pass2 == ''){



            $("#valid_pass2 span").text('Field required.');

            $("#valid_pass2 span").css('display', 'block');



          } else if(valid_pass1 != valid_pass2) {



            $("#valid_pass2 span").text('Password not matched.');

            $("#valid_pass2 span").css('display', 'block');



          } else {



            $("#valid_pass2 span").css('display', 'none');

            svalid_pass2 = "OK";

          } 

          

          if(svalid_pass1 == 'OK' && svalid_pass2 == 'OK'){

            $("#form-submit").click();

          }      

        }



        $("#notification").delay(3000);

        $("#notification").fadeOut('slow');



      });

    </script>    



    <script src="<?php echo base_url(); ?>catalogs/plugins/iCheck/icheck.min.js"></script>

    <script>

      $(function () {

        $('input').iCheck({

          checkboxClass: 'icheckbox_square-blue',

          radioClass: 'iradio_square-blue',

          increaseArea: '20%' // optional

        });

      });

    </script>

  </body>

</html>