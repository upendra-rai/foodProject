<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promo_code extends CI_Controller {

	function __construct(){

		parent::__construct();



		$this->load->library('session');
         $this->load->helper('form');

        $this->load->model('model_dashboard');
        $this->load->model('model_promo_code');
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

    public function promocode(){

        $data['active_menu'] = "parameter";
        $data['active_submenu'] = "promocode";
        $this->model_promo_code->check_expire_promo();
        $data['list'] = $this->model_promo_code->select_promo();
        
        
		
		$this->load->view('parameter/promo', $data);

	}
    
    public function add()
	{

		if($this->input->post('submit')){
            
            
             $add_promo_code = $this->input->post('promocode');
			 $add_detail = $this->input->post('detail');

			 $add_discount = $this->input->post('disocunt');
              $discount_type = $this->input->post('discount_type');

			 $add_date_from = date('y-m-d', strtotime($this->input->post('validate_from')));
			 $add_date_to =  date('y-m-d', strtotime($this->input->post('validate_to')));
			 $add_term_condition = $this->input->post('terms');
            
             $product_category = $this->input->post('product_category');
             $product_list = $this->input->post('product_list');
            
            // echo $product_list;
			 $this->model_promo_code->add($add_promo_code,$add_detail, $add_discount,$discount_type,$add_date_from,  $add_date_to,$add_term_condition,$product_category,$product_list);
			
		}else{
			$data['active_menu'] = "parameter";
			$data['active_submenu'] = "promocode";
			
			$this->load->view('parameter/add_promo', $data);
	}
	}
  
    public function edit($id)
	{

		if($this->input->post('submit')){
            
            
             $add_promo_code = $this->input->post('promocode');
			 $add_detail = $this->input->post('detail');

			 $add_discount = $this->input->post('disocunt');
             $discount_type = $this->input->post('discount_type');

			 $add_date_from = date('y-m-d', strtotime($this->input->post('validate_from')));
			 $add_date_to =  date('y-m-d', strtotime($this->input->post('validate_to')));
			 $add_term_condition = $this->input->post('terms');
             $product_category = $this->input->post('product_category');
             $product_list = $this->input->post('product_list'); 
            
			 $this->model_promo_code->edit($add_promo_code,$add_detail, $add_discount,$discount_type,$add_date_from,  $add_date_to,$add_term_condition,$id,$product_category,$product_list,$discount_type);
			
		}else{
			$data['active_menu'] = "parameter";
			$data['active_submenu'] = "promocode";
			$data["selected_row"] = $this->model_promo_code->selected_promo($id);
			$this->load->view('parameter/add_promo', $data);
	}
	}



	public function promo_delete(){

		if(isset($_POST["del_id"])){


			$del_id = $_POST["del_id"];



			$this->model_promo_code->delete_promo($del_id);
			

		}else{
		echo "delete not";
		}

	}
    
    public function select_product_by_option(){
        
        if(isset($_POST["val"])){
            
            $option = $_POST["val"];
            $data['list'] =  $this->model_promo_code->select_product_by_option($option);
            // echo json_encode($data['list']);
        }
        
    }

    
    public function send_promo_code_section(){
        $data['active_menu'] = "send_msg";
        $data['active_submenu'] = "send_promocode";
        
        if($this->input->post('submit') != ''){
           
            $name_search = $this->input->post('name_search');
            $email_search = $this->input->post('email_search');
            $mobile_no = $this->input->post('mobile_no');
            
            $data['return_name'] = $name_search;
            $data['return_mobile_no']  =   $mobile_no;
            $data['return_email']  =   $email_search;
             $data['promo_list'] = $this->model_promo_code->select_promo_for_send();
            $data['all_customer'] = $this->model_promo_code->customer_report_multi_searchbar($name_search,$email_search,$mobile_no);
            $this->load->view('promo_code/send_promo_code',$data);		
            
        }else if($this->input->post('submit_promo_code') != ''){
                
              $promo_id = $this->input->post('promo_code');
              $customer_id_array = $this->input->post('all_customer_id');
              $customer_mobile_no_array = $this->input->post('all_customer_mobile');
              
              $customer_id = explode(',',$customer_id_array);
              foreach($customer_id as $row){
                   $data['msg'] = $this->model_promo_code->send_promo_code($promo_id,$row);
                  
              }
               $data['promo_list'] = $this->model_promo_code->select_promo_for_send();
              $data['all_customer'] = $this->model_promo_code->select_customer_report();
              $this->load->view('promo_code/send_promo_code',$data);	
              
          }else{
             $data['all_customer'] = $this->model_promo_code->select_customer_report();
             $data['promo_list'] = $this->model_promo_code->select_promo_for_send();
             $this->load->view('promo_code/send_promo_code',$data);		
        }
    
       
		
	}    
    
    public function send_notification(){
          if(isset($_POST["title"])){
              
         if($send_type == "notification"){
            $data['msg'] = $this->model_promo_code->send_notification($title,$msg,$customer_id_array);
          }
          }
    }
	
}
