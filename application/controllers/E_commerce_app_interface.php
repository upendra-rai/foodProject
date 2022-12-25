<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e_commerce_app_interface extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');

        $this->load->model('model_e_commerce_app_interface');


	}
/* *********||*********|******************|*********||********* */
/* *********||*********|User Login and ragistration Section|*********||********* */
/* *********||*********|******************|*********||********* */

    public function user_login(){
		if(isset($_POST['user_name']))
         {
	      $user_name =$_POST['user_name'];
	      $password=$_POST['password'];

	      $data["login_status"] = $this->model_e_commerce_app_interface->user_login_model($user_name,$password);
        }
	}

  public function user_ragistration_submit()
  {
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $customer_name = $request->customer_Name;
    $mobile_no = $request->mobile_no;
    $address = $request->address;  
    $lat = $request->lat;   
    $lng = $request->lng;   
      
    $data["ragistration_status"] = $this->model_e_commerce_app_interface->user_ragistration_submit($customer_name,$mobile_no,$address,$lat,$lng);

		echo json_encode($data);
  }

	public function submit_login()
  {
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $mobile_no = $request->mobile_no;
    $data["ragistration_status"] = $this->model_e_commerce_app_interface->submit_login($mobile_no);

		echo json_encode($data);
  }

	public function customer_profile_data()
	{
		$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $customer_id = $request->customer_id;
    $data["user_data"] = $this->model_e_commerce_app_interface->customer_profile_data($customer_id);

		echo json_encode($data);
	}
    
    
    public function agent_profile_data()
	{
		$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $user_id = $request->customer_id;
    $data["user_data"] = $this->model_e_commerce_app_interface->agent_profile_data($user_id);

		echo json_encode($data);
	}
    
    
     public function send_otp_to_customer(){
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
	    $mobile_no = $request->mobile_no;
        $otp = $request->otp;

    	//***************************//
                                    // ******** send sms *******//
									//**************************//
					
									$url = base_url()."send_verify_msg.php?mobile_no=".$mobile_no."&otp_number=".$otp."&template=otp"; 
		                            $cSession = curl_init(); 
                                    curl_setopt($cSession,CURLOPT_URL,$url); 
                                    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                                    curl_setopt($cSession,CURLOPT_HEADER, false); 
                                    $result=curl_exec($cSession);
                                    curl_close($cSession);
		                            //print_r($result);
							        //***************************//
                                    // ******** send sms *******//
									//**************************//

    }
   
     
    public function update_customer_profile(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $linked_id = $request->customer_id;
		   $customer_name = $request->customer_name;
		   $email_id = $request->email_id;
		   $mobile_no = $request->mobile_no;
		   $address = $request->address;
        
		   $this->model_e_commerce_app_interface->update_customer_profile($linked_id,$customer_name,$email_id,$mobile_no,$address);
	}
 /* *********||*********|******************|*********||********* */
/* *********||*********|Agent Section|*********||********* */
/* *********||*********|******************|*********||********* */    
    
    public function team_login(){

           $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $email = $request->email;
            $password =  $request->password;

	      $data["login_status"] = $this->model_e_commerce_app_interface->team_login($email,$password);
        
	}
    
    public function select_pending_order(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $user_id = $request->user_id;
        $data["list"] = $this->model_e_commerce_app_interface->select_pending_order($user_id);
         echo json_encode($data);
    }
    
    public function filter_orders(){

			$user_id = $this->uri->segment(3);
			$status = $this->uri->segment(4);
			$colony_id = $this->uri->segment(5);
			
			if(!$colony_id){
				$colony_id = '';
			}
			
			$data["list"] = $this->model_e_commerce_app_interface->filter_orders($user_id,$status,$colony_id);
		  echo json_encode($data);

		}
		
		public function count_pending_customers(){
			$user_id = $this->uri->segment(3);
			$status = $this->uri->segment(4);
			$colony_id = $this->uri->segment(5);
			
			if(!$colony_id){
				$colony_id = '';
			}
			
			$data["count_pending"] = $this->model_e_commerce_app_interface->count_pending_customers($user_id,$status,$colony_id);
		    echo json_encode($data);
			
		}
		
		public function count_completed_customers(){
			$user_id = $this->uri->segment(3);
			$status = $this->uri->segment(4);
			$colony_id = $this->uri->segment(5);
			
			if(!$colony_id){
				$colony_id = '';
			}
			
			$data["count_completed"] = $this->model_e_commerce_app_interface->count_completed_customers($user_id,$status,$colony_id);
		    echo json_encode($data);
		}
    
    
       public function selected_order(){
           
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $order_id = $request->order_id;
        $data["list"] = $this->model_e_commerce_app_interface->selected_order($order_id);
         echo json_encode($data);
           
           
       }
    
       public function make_complete_order(){
           
           $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $order_id = $request->order_id;
           $collected_cash = $request->collected_cash;
        $data["list"] = $this->model_e_commerce_app_interface->make_complete_order($order_id,$collected_cash);
           
       }
    
/* *********||*********|******************|*********||********* */
/* *********||*********|Merchant List Section|*********||********* */
/* *********||*********|******************|*********||********* */
    
    public function select_outlet(){
        $data["outlet_list"] = $this->model_e_commerce_app_interface->select_outlet();
          echo json_encode($data);
        
    }
/* *********||*********|******************|*********||********* */
/* *********||*********|Customer product Section|*********||********* */
/* *********||*********|******************|*********||********* */  

     public function banner_list(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $merchant_id = $request->merchant_id;
	      $data["banner_list"] = $this->model_e_commerce_app_interface->banner_list($merchant_id);
          echo json_encode($data);

	}
    
	 public function popup_offer(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $merchant_id = $request->merchant_id;
	      $data["popup_offer"] = $this->model_e_commerce_app_interface->popup_offer($merchant_id);
          echo json_encode($data);

	}
    public function select_offer_banner(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $merchant_id = $request->merchant_id;
        $data["offer_banner"] = $this->model_e_commerce_app_interface->select_offer_banner($merchant_id);
        echo json_encode($data);
    }

     public function product_category_list(){
			 $postdata = file_get_contents("php://input");
			 $request = json_decode($postdata);
			 $merchant_id = $request->merchant_id;
	      $data["product_category_list"] = $this->model_e_commerce_app_interface->product_category_list($merchant_id);
          echo json_encode($data);

	}
    
    
     public function app_background_img(){
        
	      $data["list"] = $this->model_e_commerce_app_interface->app_background_img();
          echo json_encode($data);

	}

/* *********||*********|******************|*********||********* */
/* *********||*********|Customer Item Details Section|*********||********* */
/* *********||*********|******************|*********||********* */



    public function select_subcategory_by_category($category_id){
        $data["product_details"] = $this->model_e_commerce_app_interface->select_subcategory_by_category($category_id);
       
        echo json_encode($data);
    }

    public function select_product_by_subcategory(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $subcategory_id = $request->subcategory_id;
          $data["product_list"] = $this->model_e_commerce_app_interface->select_product_by_subcategory($subcategory_id);
        
         $data["product_details_without_group"] = $this->model_e_commerce_app_interface->select_subcategory_by_category_without_group($subcategory_id);

          echo json_encode($data);
    }

    public function count_cart_items(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $customer_id = $request->customer_id;
          $data["cart_item_list"] = $this->model_e_commerce_app_interface->count_cart_items($customer_id);
          echo json_encode($data);

    }

    public function select_cart(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $customer_id = $request->customer_id;
          $data["cart_item_list"] = $this->model_e_commerce_app_interface->select_cart($customer_id);
          echo json_encode($data);
    }


   public function add_item_to_cart(){
       if(isset($_POST['customer_id'],$_POST['item_id'])){
          $customer_id = $_POST['customer_id'];
          $product_id =$_POST['item_id'];
          $product_qty = $_POST['item_qty'];
          $product_price =$_POST['item_price'];
					$action = $_POST['action'];
        // echo $customer_id.$product_id.$product_qty.$product_price;
         $this->model_e_commerce_app_interface->add_item_to_cart($customer_id,$product_id,$product_qty,$product_price,$action);
       }

   }

    
   public function drom_down_selected_item_data(){
       
       $postdata = file_get_contents("php://input");
 		 $request = json_decode($postdata);
 		 $item_id = $request->item_id;
		 $data["item_data"] = $this->model_e_commerce_app_interface->drom_down_selected_item_data($item_id);
       
        $data["product_details_without_group"] = $this->model_e_commerce_app_interface->drom_down_selected_item_option($item_id);
     echo json_encode($data);
       
   }     

/* *********||*********|******************|*********||********* */
/* *********||*********|cart Section|*********||********* */
/* *********||*********|******************|*********||********* */

  public function select_cart_data(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $customer_id = 11;//$request->customer_id;

        $data["cart_data"] = $this->model_e_commerce_app_interface->select_cart_data($customer_id);
      echo json_encode($data);

  }

	public function submit_online_orders()
	{
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$customer_id = $request->customer_id;
		$cart_item_array = $request->cart_item_array;
		$cart_total_price = $request->cart_total_price;
		$cart_total_qty = $request->cart_total_qty;
        
        $payment_id = $request->payment_id;
        $type = $request->type;
        
        $tax_amount = $request->tax_amount;
        $packing_charge = $request->packing_charge;
        $delivery_charge = $request->delivery_charge;
        $total = $request->total;
        $point_discount = $request->point_discount;
        $coupan_discount = $request->coupan_discount;
        $pay_amount = $request->pay_amount;
        $delivery_details = $request->delivery_details;
        
        $outlet_id = $request->outlet_id;
        
        $applied_coupan = $request->applied_coupan;
        
        
		$data["cart_data"] = $this->model_e_commerce_app_interface->submit_online_orders($customer_id,$cart_item_array,$cart_total_price,$cart_total_qty,$payment_id,$type,$tax_amount,$packing_charge,$delivery_charge,$total,$point_discount,$coupan_discount,$pay_amount,$delivery_details,$outlet_id,$applied_coupan);

	}
    
    public function mark_paid_order(){
        
        $postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$order_id = $request->order_id;
        $payment_id = $request->payment_id;
        
        $data["list"] = $this->model_e_commerce_app_interface->mark_paid_order($order_id,$payment_id);
    }
    
    public function delete_cancel_order(){
        $postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$order_id = $request->order_id;
        
        $data["list"] = $this->model_e_commerce_app_interface->delete_cancel_order($order_id);
        
        
    }

/* *********||*********|******************|*********||********* */
/* *********||*********|Search Items Section|*********||********* */
/* *********||*********|******************|*********||********* */
  public function search_items()
  {
     $postdata = file_get_contents("php://input");
     $request = json_decode($postdata);
     $val = $request->val;
     $data["item_data"] = $this->model_e_commerce_app_interface->search_items($val);
       echo json_encode($data);
   }

	 public function fetch_selected_item_details()
	 {
		 $postdata = file_get_contents("php://input");
 		 $request = json_decode($postdata);
 		 $item_id = $request->item_id;
		 $data["item_data"] = $this->model_e_commerce_app_interface->fetch_selected_item_details($item_id);
     echo json_encode($data);
	 }

//=========********===========********========******========//
// ************  orders history section ***********//
//=========********===========********========******========//

	 	 public function order_history()
	 	 {
	 		 $postdata = file_get_contents("php://input");
	 		 $request = json_decode($postdata);
	 		 $customer_id = $request->user_id;
	 		 $data['order_history'] = $this->model_e_commerce_app_interface->order_history($customer_id);
	 		 echo json_encode($data);
	 	 }

	 	 public function order_history_filter()
	 	 {
	 		 $customer_id = $this->uri->segment(3);
	 		 $date = $this->uri->segment(4);
	      if($customer_id && $date){
	 			  $data['order_history'] = $this->model_e_commerce_app_interface->order_history_filter($customer_id,$date);
	 				echo json_encode($data);
	 		 }

	 	 }

	 	 public function order_details()
	 	 {
	 		 $postdata = file_get_contents("php://input");
	 		 $request = json_decode($postdata);
	 		 $order_id = $request->order_id;
	 		 $data['order_details'] = $this->model_e_commerce_app_interface->order_details($order_id);
	 		 //$data{'item_details'} = $this->model_e_commerce_app_interface->order_item_details($order_id);
	 		 echo json_encode($data);
	 	 }
// //-----//////------/////--------/////////------///////
// //======= Notification Section ======//////
// //-----//////------/////--------/////////-------//////

		 	public function user_notification(){
		            $postdata = file_get_contents("php://input");
		            $request = json_decode($postdata);
		 	       $user_id = $request->user_id;
		 		   $data["noti"] = $this->model_e_commerce_app_interface->user_notification($user_id);
		 		   echo json_encode($data);


		     }

		     public function read_notification($id){

		 		   $data["noti"] = $this->model_e_commerce_app_interface->read_notification($id);
		            $this->model_e_commerce_app_interface->change_notification_status($id);
		 		   echo json_encode($data);


		     }

		     public function count_notification(){

		 		   $postdata = file_get_contents("php://input");
		            $request = json_decode($postdata);
		 	       $user_id = $request->user_id;
		 		   $data["noti"] = $this->model_e_commerce_app_interface->count_notification($user_id);
		 		   echo json_encode($data);


		     }
// //-----//////------/////--------/////////------///////
// //======= delivery app Setting ======//////
// //-----//////------/////--------/////////-------//////    
    
     public function select_app_setting(){
         
        $data["app_setting"] = $this->model_e_commerce_app_interface->select_app_setting();
      echo json_encode($data);

  }
 // //-----//////------/////--------/////////------///////
// //======= Point Section ======//////
// //-----//////------/////--------/////////-------//////     
    
    public function user_point(){
        
           $postdata = file_get_contents("php://input");
		   $request = json_decode($postdata);
           $user_id = $request->user_id;
          $data["points"] = $this->model_e_commerce_app_interface->user_point($user_id);
          echo json_encode($data);
        
    }
// //-----//////------/////--------/////////------///////
// //======= Feedback Section ======//////
// //-----//////------/////--------/////////-------//////      
    
    public function feedback(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           
           $customer_id = $request->customer_id;
            $quality_rank = $request->quality_rank;
           $service_rank = $request->service_rank;
           $suggestion = $request->suggestion;
		   $this->model_e_commerce_app_interface->feedback($customer_id,$quality_rank,$service_rank,$suggestion);
           
        
        
    }
        
    public function select_feedback(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
		   $data["feedback"] = $this->model_e_commerce_app_interface->select_feedback($customer_id);
		   echo json_encode($data);
        
        
    }  
// //-----//////------/////--------/////////------///////
// //======= Wallet Section ======//////
// //-----//////------/////--------/////////-------//////       
   public function add_money(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
           $recharge_amount = $request->recharge_amount;
           $payment_id = $request->payment_id;
           $type = $request->type;
 				
		   $data["feedback"] = $this->model_e_commerce_app_interface->add_money($customer_id,$recharge_amount,$payment_id,$type);
		   
        
        
    }
    
// //-----//////------/////--------/////////------///////
// //======= Promo Code Section ======//////
// //-----//////------/////--------/////////-------//////   
    public function select_customer_promo_code(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
           
		   $data["list"] = $this->model_e_commerce_app_interface->select_customer_promo_code($customer_id);
		    echo json_encode($data);
        
        
    }
    
    public function check_apply_coupan(){
        $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $apply_type = $request->apply_type;
           $apply_id = $request->apply_id;
           
		   $data["list"] = $this->model_e_commerce_app_interface->check_apply_coupan($apply_type,$apply_id);
		    echo json_encode($data);
        
    }
// //-----//////------/////--------/////////------///////
// //======= Ckeck app version number======//////
// //-----//////------/////--------/////////-------//////
	     public function check_app_version(){

	             $data["data"] =  $this->model_e_commerce_app_interface->check_app_version();
                 echo json_encode($data);
	     } 
    
// //-----//////------/////--------/////////------///////
	 // //======= Location Tracking======//////
	 // //-----//////------/////--------/////////-------//////

	 // agent section

	 	public function location_tracking(){

	         if(isset($_POST["lat"],$_POST["lng"],$_POST["agent_id"])){
	 		    $lat = $_POST["lat"];
	 			$lng = $_POST["lng"];
	 			$agent_id = $_POST["agent_id"];
	 		    $this->model_e_commerce_app_interface->location_tracking($lat,$lng,$agent_id);
	 		}

	     }

	 	public function agent_customers_location(){
	           $postdata = file_get_contents("php://input");
	           $request = json_decode($postdata);


	 	       $login_email = $request->login_email;
	 		   $role = $request->role;

	 		   if($role == "agent"){
	 			   $data["user"] = $this->model_e_commerce_app_interface->agent_customers_location($login_email);

	 		   }

	 		  echo json_encode($data);
	 	}

	 	public function update_location(){
	 		$postdata = file_get_contents("php://input");
	         $request = json_decode($postdata);
	 	    $agent_id = 2;//$request->agent_id;
	 		$data["position"] = $this->model_e_commerce_app_interface->update_location($agent_id);
	 		echo json_encode($data);

	 	}
	 // customer section

	 	public function customer_data_for_location(){
	           $postdata = file_get_contents("php://input");
	           $request = json_decode($postdata);


	 	       $login_email = $request->login_email;
	 		   $role = $request->role;

	 		   if($role == "customers"){
	 			   $data["user"] = $this->model_e_commerce_app_interface->customer_data_for_location($login_email);
					 $data["user_role"] = 'customers';

	 		   }

	 		  echo json_encode($data);
	 	}


	 	public function customer_data_for_add_marker(){
	 		 $postdata = file_get_contents("php://input");
	           $request = json_decode($postdata);


	 	       $login_email = $request->login_email;
	 		   $role = $request->role;

	 		   if($role == "customers"){
	 			   $data["user"] = $this->model_e_commerce_app_interface->customer_data_for_add_marker($login_email);

	 		   }

	 		  echo json_encode($data);


	 	}

	 	public function customer_add_locations(){

	 		$postdata = file_get_contents("php://input");
	         $request = json_decode($postdata);
	 	    $customer_id = $request->user_id;
	 		$customer_lat = $request->user_lat;
	 		$customer_lng = $request->user_lng;

	 		$this->model_e_commerce_app_interface->customer_add_locations($customer_id,$customer_lat,$customer_lng);
	 	}    
// //-----//////------/////--------/////////------///////
// //=======  Payment Gateway Details ======//////
// //-----//////------/////--------/////////-------//////     
    public function payment_gateway_details(){
        
         $data["my_data"] = $this->model_e_commerce_app_interface->payment_gateway_details();
		   echo json_encode($data);
        
    }
    
// //-----//////------/////--------/////////------///////
// //=======  Select App Content ======//////
// //-----//////------/////--------/////////-------//////       
    public function app_content(){
        
         $data["my_data"] = $this->model_e_commerce_app_interface->app_content();
		   echo json_encode($data);
        
    }    
    
}
