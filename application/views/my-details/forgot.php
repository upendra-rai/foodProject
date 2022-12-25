<!DOCTYPE html>

<html>

<head>



  <title>Forgot | </title>



  <?php $this->load->view('common/inc.inner-head.php'); ?>



</head>



<body class="hold-transition login-page" style="background: rgba(210, 214, 222, 0.51) !important;">

  <div class="login-box" style="margin:5% auto !important;">

    <div class="login-logo">

      <a href="#"><b></b> Admin</a>

    </div>

    <!-- /.login-logo -->

    

    <?php echo @$message; ?>



    <div class="login-box-body">

      <p class="login-box-msg">Please enter your E-mail Id</p>



      <form action="" method="post">



        <div class="form-group" id="valid_email">

          <label for="email">Email</label>

          <input type="text" class="form-control" id="email" name="email" placeholder="Enter here">

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

        

        var valid_email = $("#valid_email input").val();



        if(valid_email == ''){



          $("#valid_email span").text('Field required.');

          $("#valid_email span").css('display', 'block');



        } else if(!emailReg.test(valid_email)) {



          $("#valid_email span").text('Please enter valid Email.');

          $("#valid_email span").css('display', 'block');

        } else {



          $("#valid_email span").css('display', 'none');

          svalid_email = "OK";

        }      

        

        if(svalid_email == 'OK'){

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