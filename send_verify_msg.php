<?php 

  error_reporting(0);
ini_set('display_errors', 0);

  $name = $_GET["name"];
  $card_no = $_GET["card_no"];
  $recharge_amount = $_GET["recharge_amount"];
  $transaction_amount = $_GET["transaction_amount"];
  $avl_balance = $_GET["avl_balance"];
  $source = $_GET["source"];
  $otp_number = $_GET["otp_number"];
  $mobile = $_GET["mobile_no"]; 
  $template = $_GET["template"]; 
  $product_name = $_GET["product_name"]; 
  
  $company = "Ackko Tech";
  $ending_line = "Team Vivek";
  
  $msg = '';
  
  
  
  
  if($template == 'ragistration'){
	  
	 $msg = "Dear ".$name.", Welcome to ".$company." Your Membership card No. is ".$card_no." Best Wishes. ".$ending_line;
  }
  
  if($template == 'recharge'){
	  
	 $msg = "Dear ".$name.", Your account has been recharged with Rs. ".$recharge_amount." Avl Bal is Rs. ".$avl_balance." Thanks, ".$ending_line;
  }
  
  if($template == 'transaction'){
	  
	 $date = date("d-M-Y"); 
	 $msg = "Dear ".$name.", Rs. ".$transaction_amount." debited on ".$date." for ".$product_name." Avl. Bal. is Rs. ".$avl_balance." Thank You, ".$ending_line;
  }
  
  
  
  if($template == 'terminate'){
	  
	  $msg = "Dear ".$name.", Service discontinued. Please return your card to collect the Bal. Amt. of Rs. ".$avl_balance." Best wishes, ".$ending_line;
  }
  
   if($template == 'change_card'){
	   
	  $msg = "Dear ".$name.", It's sad that your card has Lost/Broken. Please pay Rs. 50 for New Card No. ".$card_number." Regards, ".$ending_line;
  }
  
  if($template == 'otp'){
	  
	  $msg = "OTP for make Transaction on ".$company." is ".$otp_number." & valid till 3 minut Don't share it.";
	  
  }
        $user = "ackkotechnosoft";
        $password = "Ackko@123";
        $msisdn = '91'.$mobile;
        $sid = "AKKOTS";
        $name = "vivek";
        $OTP = "6765R";
        $msg = urlencode($msg);
        $fl = "0";
        $gwid = "2";
        $type = "txt";
        $cSession = curl_init(); 
        curl_setopt($cSession,CURLOPT_URL,"http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=".$user."&password=".$password."&msisdn=".$msisdn."&sid=".$sid."&msg=".$msg."&fl=0&gwid=2"); 
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false); 
        $result=curl_exec($cSession);
		//echo json_encode($result);
        curl_close($cSession);
        print_r($result);

 ?>
