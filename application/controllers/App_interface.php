<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_interface extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');
        
        $this->load->model('model_app_interface');

		
	}
/* *********||*********|******************|*********||********* */	
/* *********||*********|User Login Section|*********||********* */
/* *********||*********|******************|*********||********* */    
     
    public function user_login(){
		if(isset($_POST['user_name']))
         {
	      $user_name =$_POST['user_name'];
	      $password=$_POST['password'];
		 
	      $data["login_status"] = $this->model_app_interface->user_login_model($user_name,$password);
        }
	}
    
    

/* *********||*********|******************|*********||********* */	
/* *********||*********|Table Category Section|*********||********* */
/* *********||*********|******************|*********||********* */
    public function select_table(){
		
		$data["table_category"] = $this->model_app_interface->select_table_category();
		 
		echo json_encode($data);
		
		
	}
    public function select_tables_by_cat(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $table_cate_id = $request->table_cate_id;
        $data["table_list"] = $this->model_app_interface->select_tables_by_cat($table_cate_id);
        echo json_encode($data);
    }
    
   
    
    
	public function select_waiters(){
		
		$data["waiters_list"] = $this->model_app_interface->select_waiters();
			
		echo json_encode($data);
		
		
	}
/* *********||*********|******************|*********||********* */	
/* *********||*********|Item Category Section|*********||********* */
/* *********||*********|******************|*********||********* */
	
	public function select_item(){
		
		$data["item_category"] = $this->model_app_interface->select_item_category();
		$data["item_sub_category"] = $this->model_app_interface->select_item_subcategory();
		
		
		$data["item_data"] = $this->model_app_interface->select_item();
			
		echo json_encode($data);
		
		
	}
    
/* *********||*********|******************|*********||********* */	
/* *********||*********|Item Table Section|*********||********* */
/* *********||*********|******************|*********||********* */ 
    
    public function genrate_kot_for_new_table(){
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $kot_type = $request->kot_type;
        $table_id = $request->table_id;
        $server_id = $request->server_id;
        $table_kot_id = $request->table_kot_id;
        
        
        $item_id = $request->item_id;
        $item_name = $request->item_name;
        
        $item_qty = $request->item_qty;
        $item_price = $request->item_price;
        $total_amount = $request->total_amount;
        $item_remark = $request->item_remark;
        
        $item_sgst = $request->item_sgst;
        $item_cgst = $request->item_cgst;
        
        
        $total_item_qty = $request->total_item_qty;
        $total_discount = $request->total_discount;
        $total_net_amt = $request->total_net_amt;
        $total_gross_amt = $request->total_gross_amt;
       
        $this->model_app_interface->genrate_kot_for_new_table($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst);
        
        
    }
    
    
    
    
    public function update_genrated_kot(){
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $kot_type = $request->kot_type;
        $table_id = $request->table_id;
        $server_id = $request->server_id;
        $table_kot_id = $request->table_kot_id;
        
        
        $item_id = $request->item_id;
        $item_name = $request->item_name;
        
        $item_qty = $request->item_qty;
        $item_price = $request->item_price;
        $total_amount = $request->total_amount;
        $item_remark = $request->item_remark;
        
        $item_sgst = $request->item_sgst;
        $item_cgst = $request->item_cgst;
        
        
        $total_item_qty = $request->total_item_qty;
        $total_discount = $request->total_discount;
        $total_net_amt = $request->total_net_amt;
        $total_gross_amt = $request->total_gross_amt;
       
        $this->model_app_interface->update_genrated_kot($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst);
        
        
    }
    
    public function genrate_kot_for_self_service(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $kot_type = $request->kot_type;
        $table_id = $request->table_id;
        $server_id = $request->server_id;
        $table_kot_id = $request->table_kot_id;
        
        
        $item_id = $request->item_id;
        $item_name = $request->item_name;
        
        $item_qty = $request->item_qty;
        $item_price = $request->item_price;
        $total_amount = $request->total_amount;
        $item_remark = $request->item_remark;
        
        $item_sgst = $request->item_sgst;
        $item_cgst = $request->item_cgst;
        
        
        $total_item_qty = $request->total_item_qty;
        $total_discount = $request->total_discount;
        $total_net_amt = $request->total_net_amt;
        $total_gross_amt = $request->total_gross_amt;
       
        $this->model_app_interface->genrate_kot_for_self_service($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst);
        
        
    }
    
    public function genrate_kot_for_home_delivery(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $kot_type = $request->kot_type;
        $table_id = $request->table_id;
        $server_id = $request->server_id;
        $table_kot_id = $request->table_kot_id;
        $home_delivery_id = $request->home_delivery_id;
        
        
        $item_id = $request->item_id;
        $item_name = $request->item_name;
        
        $item_qty = $request->item_qty;
        $item_price = $request->item_price;
        $total_amount = $request->total_amount;
        $item_remark = $request->item_remark;
        
        $item_sgst = $request->item_sgst;
        $item_cgst = $request->item_cgst;
        
        
        $total_item_qty = $request->total_item_qty;
        $total_discount = $request->total_discount;
        $total_net_amt = $request->total_net_amt;
        $total_gross_amt = $request->total_gross_amt;
       
        $this->model_app_interface->genrate_kot_for_home_delivery($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst,$home_delivery_id);
        
        
    }
    
    public function genrate_kot_for_draft(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $kot_type = $request->kot_type;
        $table_id = $request->table_id;
        $server_id = $request->server_id;
        $table_kot_id = $request->table_kot_id;
        
        
        $item_id = $request->item_id;
        $item_name = $request->item_name;
        
        $item_qty = $request->item_qty;
        $item_price = $request->item_price;
        $total_amount = $request->total_amount;
        $item_remark = $request->item_remark;
        
        $item_sgst = $request->item_sgst;
        $item_cgst = $request->item_cgst;
        
        
        $total_item_qty = $request->total_item_qty;
        $total_discount = $request->total_discount;
        $total_net_amt = $request->total_net_amt;
        $total_gross_amt = $request->total_gross_amt;
       
        $this->model_app_interface->genrate_kot_for_draft($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst);
        
        
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|Genrate Bill Section|*********||********* */
/* *********||*********|******************|*********||********* */ 
     public function genrate_bill_details(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $kot_id = $request->kot_id;
        $bill_type = $request->bill_type; 
        $table_id = $request->table_id;   
        
        if($bill_type == 'home_delivery'){
            $data["item_details"] = $this->model_app_interface->genrate_bill_details_for_home_delivery($kot_id);
       
        }elseif($bill_type == 'self_service'){
           $data["item_details"] = $this->model_app_interface->genrate_bill_details_for_self_service($kot_id); 
            
        }else{
            $data["item_details"] = $this->model_app_interface->genrate_bill_details($table_id);
           
        }
        echo json_encode($data);
    }
    
     public function select_customer(){
         $data["customer_list"] = $this->model_app_interface->select_customer();
			
		 echo json_encode($data);
     }
    
	 public function search_guest(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
         $search_value = $request->search_value;
         $this->model_app_interface->search_guest($search_value);
     }
    
/* *********||*********|******************|*********||********* */	
/* *********||*********|Print Bill Section|*********||********* */
/* *********||*********|******************|*********||********* */  
    public function print_bill(){
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $bill_type = $request->bill_type;
        
         $customer_id = $request->customer_id;
         $kot_id = $request->kot_id;
         $table_id = $request->table_id;
         $home_delivery_id = $request->home_delivery_id;
            
         $customer_type = $request->customer_type;
         $m_status = $request->m_status;
         $guest_name = $request->guest_name;
         $company_name = $request->company_name;
         $gstin = $request->gstin;
         $contact_1 = $request->contact_1;
         $contact_2 = $request->contact_2;
         $address = $request->address;
         $dob = date('Y-m-d',strtotime($request->dob));
         $anniversary = date('Y-m-d',strtotime($request->anniversary));
         $gender = $request->gender;

         $net_amount = $request->net_amount;
         $gross_amount = $request->gross_amount;
         $sgst = $request->sgst;
         $cgst = $request->cgst;
         $service_charge = $request->service_charge;
         $discount = $request->discount;
         $bill_remark = $request->bill_remark;
        
         if($bill_type == "home_delivery"){
             $this->model_app_interface->print_bill_for_home_delivery($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$bill_type,$home_delivery_id);
         }else if($bill_type == "dinning"){
            $this->model_app_interface->print_bill_for_dinning($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type);
         }else if($bill_type == "self_service"){
             
             $this->model_app_interface->print_bill_for_self_service($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type);
         }
    }
    
    public function print_bill_and_cash_payment(){
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $bill_type = $request->bill_type;
        
         $customer_id = $request->customer_id;
         $kot_id = $request->kot_id;
         $table_id = $request->table_id;
         $home_delivery_id = $request->home_delivery_id;
            
         $customer_type = $request->customer_type;
         $m_status = $request->m_status;
         $guest_name = $request->guest_name;
         $company_name = $request->company_name;
         $gstin = $request->gstin;
         $contact_1 = $request->contact_1;
         $contact_2 = $request->contact_2;
         $address = $request->address;
         $dob = $request->dob;
         $dob = date('Y-m-d',strtotime($request->dob));
         $anniversary = date('Y-m-d',strtotime($request->anniversary));
         $gender = $request->gender;
        
         $net_amount = $request->net_amount;
         $gross_amount = $request->gross_amount;
         $sgst = $request->sgst;
         $cgst = $request->cgst;
         $service_charge = $request->service_charge;
         $discount = $request->discount;
         $bill_remark = $request->bill_remark;
        
         if($bill_type == "home_delivery"){
             $this->model_app_interface->print_bill_and_cash_payment_for_home_delivery($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type);
         }else if($bill_type == "dinning"){
             $this->model_app_interface->print_bill_and_cash_payment_for_dinning($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type);
         }else if($bill_type == "self_service"){
             $this->model_app_interface->print_bill_and_cash_payment_for_self_service($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type);
             
         }
         
         
        
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|View Bill Section|*********||********* */
/* *********||*********|******************|*********||********* */     
     public function fetch_bill(){
         
        $data["pending_bill_list"] =  $this->model_app_interface->fetch_bill_pending();
        $data["completed_bill_list"] =  $this->model_app_interface->fetch_bill_completed(); 
        $data["cancel_bill_list"] =  $this->model_app_interface->fetch_bill_cancel(); 
         
        echo json_encode($data);
     }    
    

    
/* *********||*********|******************|*********||********* */	
/* *********||*********|Tender Section|*********||********* */
/* *********||*********|******************|*********||********* */ 
       
    public function bill_tender_details(){
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $bill_id = $request->bill_id;
         $bill_type = $request->bill_type;
         
         if($bill_type == 'home_delivery' || $bill_type == 'self_service'){
             $data["item_details"] = $this->model_app_interface->bill_tender_details($bill_id);
             echo json_encode($data);
         }else if($bill_type == 'dinning'){
             $data["item_details"] = $this->model_app_interface->bill_tender_details_for_dinning($bill_id);
             echo json_encode($data);
         }
        
         
    }    
    
   public function pay_money(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $bill_id = $request->bill_id;   
        $customer_id = $request->customer_id;     
        $kot_id = $request->kot_id;   
        $table_id = $request->table_id;  
        $paid_amount = $request->paid_amount;    
        $bill_amount = $request->bill_amount;    
        
        $this->model_app_interface->pay_money($bill_id,$customer_id,$kot_id,$table_id,$paid_amount,$bill_amount);
       
   }  
    
   public function cancel_bill(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $bill_id = $request->bill_id;   
        $kot_id = $request->kot_id; 
        $table_id = $request->table_id; 
        $this->model_app_interface->cancel_bill($bill_id,$kot_id,$table_id);
   }    
/* *********||*********|******************|*********||********* */	
/* *********||*********|View Kot Section|*********||********* */
/* *********||*********|******************|*********||********* */     
    public function fetch_kot(){
         $data["pending_kot_list"] = $this->model_app_interface->fetch_kot_pending();
         $data["completed_kot_list"] = $this->model_app_interface->fetch_kot_completed();
         $data["cancel_kot_list"] = $this->model_app_interface->fetch_kot_cancel();
         echo json_encode($data); 
    }
    
     public function cancel_kot(){
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $table_id = $request->table_id;
         $table_kot_id = $request->table_kot_id;
         $this->model_app_interface->cancel_kot($table_id,$table_kot_id);
         
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|Fast Bill Section|*********||********* */
/* *********||*********|******************|*********||********* */      

    public function fast_bill(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $kot_type = $request->kot_type;
        $table_id = $request->table_id;
        $server_id = $request->server_id;
        $table_kot_id = $request->table_kot_id;
        $home_delivery_id = $request->home_delivery_id;
        
        $item_id = $request->item_id;
        $item_name = $request->item_name;
        
        $item_qty = $request->item_qty;
        $item_price = $request->item_price;
        $total_amount = $request->total_amount;
        $item_remark = $request->item_remark;
        
        $item_sgst = $request->item_sgst;
        $item_cgst = $request->item_cgst;
        
        
        $total_item_qty = $request->total_item_qty;
        $total_discount = $request->total_discount;
        $total_net_amt = $request->total_net_amt;
        $total_gross_amt = $request->total_gross_amt;
       
       $this->model_app_interface->fast_bill($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst,$home_delivery_id);
       
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|Home Delivery Section|*********||********* */
/* *********||*********|******************|*********||********* */      
    public function next_button_of_home_delivery(){
        $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $customer_id = $request->customer_id;
    
         $customer_type = $request->customer_type;
         $m_status = $request->m_status;
         $guest_name = $request->guest_name;
         $company_name = $request->company_name;
         $gstin = $request->gstin;
         $contact_1 = $request->contact_1;
         $contact_2 = $request->contact_2;
         $address = $request->address;
         $dob = date('Y-m-d',strtotime($request->dob));
         $anniversary = date('Y-m-d',strtotime($request->anniversary));
         $gender = $request->gender;     
        
         $delivery_person = $request->delivery_person;     

         $this->model_app_interface->next_button_of_home_delivery($customer_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$delivery_person);
        
    }
    
/* *********||*********|******************|*********||********* */	
/* *********||*********|Draft Section|*********||********* */
/* *********||*********|******************|*********||********* */     
    
     public function add_to_draft(){
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $table_id = $request->order_table_id;
         $server_id = $request->server_id;
         $this->model_app_interface->add_to_draft($table_id,$server_id);
         
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|Draft Section|*********||********* */
/* *********||*********|******************|*********||********* */ 
    public function select_genrated_kot_items(){ 
        
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $table_kot = $request->table_kot;
         $data["item_details"] = $this->model_app_interface->select_genrated_kot_items($table_kot);
         echo json_encode($data); 
        
        
    }
    
    
    
    
/* *********||*********|******************|*********||********* */	
/* *********||*********|Retail Verify POS |*********||********* */
/* *********||*********|******************|*********||********* */ 

/* *********||*********|******************|*********||********* */	
/* *********||*********|home _section|*********||********* */
/* *********||*********|******************|*********||********* */   
    
    public function select_customer_by_value(){
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $value = $request->value;
         $type = $request->type;
         $data["list"] = $this->model_app_interface->select_customer_by_value($value,$type);
         echo json_encode($data); 
    }
    
    public function select_item_by_value(){
        
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
         $value = $request->value;
         //$type = $request->type;
         $data["list"] = $this->model_app_interface->select_item_by_value($value);
         echo json_encode($data); 
        
    }
    
    public function retail_pay(){
        
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
        
         $item_array = $request->item_array;
         $total_sell =  $request->total_sell;
         $gst =  $request->gst;
         $gross_amt =  $request->gross_amt;
         $discount =  $request->discount;
         $cash =  $request->cash;
        
         //$type = $request->type;
         $data["list"] = $this->model_app_interface->retail_pay($item_array,$total_sell,$gst,$gross_amt,$discount,$cash);
        // echo json_encode($item_array); 
    }
    
    
    public function get_invoice(){
        
         $postdata = file_get_contents("php://input");
         $request = json_decode($postdata);
        
         $invoice_id = $request->invoice_id;
         $data["invoice"] = $this->model_app_interface->get_invoice($invoice_id);
        echo json_encode($data);
    }
}
