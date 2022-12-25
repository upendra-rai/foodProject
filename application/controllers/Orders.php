<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orders extends CI_Controller {

	function __construct(){

		parent::__construct();



		$this->load->library('session');
         $this->load->helper('form');

        $this->load->model('model_dashboard');
        $this->load->model('model_orders');
        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			           redirect('./admin/login');
         }
         

	}

	public function init($active_menu){

		$uid = $this->session->userdata('uid');
		$data['user_data'] = $this->model_dashboard->user_data($uid);
		$data['active_menu'] = $active_menu;
		return $data;
	}

	public function init_user(){
       $user_id = $this->session->userdata('uid');
       $data["user_data"] = $this->model_dashboard->select_userdata($user_id);
       return $data;
	}

	public function index(){
	}

  public function orders(){
       $data = $this->init_user(); 
   $data['active_menu'] = "orders";
	  $data['active_submenu'] = "pending_orders";
   
    if($this->input->post('submit')){
        
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $status = $this->input->post('status');
        
   
        $data["r_status"] =  $status;
        $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
        $count_order = $this->model_orders->count_orders();
        $this->load->view('orders/orders',$data);
    }else{
        
        $start = '';
        $end = '';
        $name = '';
        $mobile_no = '';
        $status = '';
      
     $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
      $count_order = $this->model_orders->count_orders();
      $this->load->view('orders/orders',$data);
    }
    }

    public function order_details($order_id){
       
        $order_id = $this->uri->segment(3);
        $action = $this->uri->segment(4); 
            
        if($action && $action == 'placed' || $action == 'canceled'){
             $data["detail"] = $this->model_orders->order_accept_or_reject($order_id,$action);
        }else{
        
	    $data['active_menu'] = "orders";
	    $data['active_submenu'] = "orders";
	    $data["detail"] = $this->model_orders->order_details($order_id);
	    $this->load->view('orders/view_orders',$data);
        }
    }
    
    public function order_accept_or_reject(){
        // $order_id = $this->uri->segment(3);
        // $action = $this->uri->segment(4); 
        //    $return_href = $this->uri->segment(5);
        
        if(isset($_POST['status'],$_POST['order_id'])){
            $order_id = $_POST['order_id'];
            $status = $_POST['status'];
           $data["detail"] = $this->model_orders->order_accept_or_reject($order_id,$status);  
            
        }
        
       /* if($action){
             $data["detail"] = $this->model_orders->order_accept_or_reject($order_id,$action,$return_href);
        }*/
    }
    
    public function order_dispatch_and_assign(){
        
      /*   $order_id = $this->uri->segment(3);
         $action = $this->uri->segment(4); 
        $delivery_person = $this->uri->segment(5); 
        $return_href = $this->uri->segment(6); 
        if($action){
             $data["detail"] = $this->model_orders->order_dispatch_and_assign($order_id,$action,$delivery_person,$return_href);
        } */
        
         if(isset($_POST['status'],$_POST['order_id'])){
              $order_id = $_POST['order_id'];
              $status = $_POST['status'];
              $delivery_person = $_POST['delivery_person'];
              $data["detail"] = $this->model_orders->order_dispatch_and_assign($order_id,$status,$delivery_person);
         }
        
    }

     public function accept_orders()
     {
        if(isset($_POST["order_id"])){

					$order_id = $_POST["order_id"];
					$status = 'placed';
					$this->model_orders->accept_orders($order_id,$status);
				}
     }

		 public function cancel_orders()
     {
        if(isset($_POST["order_id"])){

					$order_id = $_POST["order_id"];
					$status = 'canceled';
					$this->model_orders->accept_orders($order_id,$status);
				}
     }
//=========********===========********========******========//
// ************ Placed orders section ***********//
//=========********===========********========******========//
  public function placed_orders(){
     
	  $data['active_menu'] = "orders";
	  $data['active_submenu'] = "placed_orders";
      $user_id = $this->session->userdata('uid');
    
      
      if($this->input->post('submit')){
        
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $status = $this->input->post('status');
        
        $data["all_delivery_person"] = $this->model_orders->all_delivery_person($user_id); 
        $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
        $count_order = $this->model_orders->count_orders();
        $this->load->view('orders/placed_orders',$data);
    }else{
        
        $start = '';
        $end = '';
        $name = '';
        $mobile_no = '';
        $status = 'placed';
     $data["all_delivery_person"] = $this->model_orders->all_delivery_person($user_id); 
     $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
      $count_order = $this->model_orders->count_orders();
      $this->load->view('orders/placed_orders',$data);
    }
      

	}

//=========********===========********========******========//
// ************ Dispatched orders section ***********//
//=========********===========********========******========//
  public function dispatched_orders(){
    
	  $data['active_menu'] = "orders";
	  $data['active_submenu'] = "dispatched_orders";
      $user_id = $this->session->userdata('uid');
  
      
      if($this->input->post('submit')){
        
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $status = $this->input->post('status');
        
        $data["all_delivery_person"] = $this->model_orders->all_delivery_person($user_id); 
        $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
        $count_order = $this->model_orders->count_orders();
        $this->load->view('orders/dispatch_orders',$data);
    }else{
        
        $start = '';
        $end = '';
        $name = '';
        $mobile_no = '';
        $status = 'dispatched';
     $data["all_delivery_person"] = $this->model_orders->all_delivery_person($user_id); 
     $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
      $count_order = $this->model_orders->count_orders();
      $this->load->view('orders/dispatch_orders',$data);
    }

	}
    
    public function change_order_delivery_person(){
         $order_id = $this->uri->segment(3);
        $delivery_person = $this->uri->segment(4); 
        $return_href = $this->uri->segment(5); 
        if($delivery_person){
             $data["detail"] = $this->model_orders->change_order_delivery_person($order_id,$delivery_person,$return_href);
        }
        
    }
	//=========********===========********========******========//
	// ************ Placed orders section ***********//
	//=========********===========********========******========//
	public function delivered_orders(){
      
	  $data['active_menu'] = "orders";
	  $data['active_submenu'] = "delivered_orders";
  	 
        if($this->input->post('submit')){
        
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $status = $this->input->post('status');
        
       
        $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
        $count_order = $this->model_orders->count_orders();
        $this->load->view('orders/delivered_orders',$data);
    }else{
        
        $start = '';
        $end = '';
        $name = '';
        $mobile_no = '';
        $status = 'delivered';
     
      $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
      $count_order = $this->model_orders->count_orders();
      $this->load->view('orders/delivered_orders',$data);
    }

	}
	//=========********===========********========******========//
	// ************ Placed orders section ***********//
	//=========********===========********========******========//
	public function canceled_orders(){
         
	  $data['active_menu'] = "orders";
	  $data['active_submenu'] = "canceled_orders";
    
         if($this->input->post('submit')){
        
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $status = $this->input->post('status');
        
       
        $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
        $count_order = $this->model_orders->count_orders();
        $this->load->view('orders/orders',$data);
    }else{
        
        $start = '';
        $end = '';
        $name = '';
        $mobile_no = '';
        $status = 'canceled';
     
      $data["orders_list"] = $this->model_orders->orders($start,$end,$name,$mobile_no,$status);
      $count_order = $this->model_orders->count_orders();
      $this->load->view('orders/orders',$data);
    }

	}
    
    
    public function count_orders(){
        
         $data["list"] = $this->model_orders->count_orders();
        echo json_encode($data);
    }
}
