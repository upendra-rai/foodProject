<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notification extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_dashboard');
        $this->load->model('model_notification');
     
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

	public function index(){
       
		$data = $this->init('dashboard');
        
		
			 $this->load->helper('form');
		$this->load->view('home', $data);

	}
    
    public function notification(){
        $data['active_menu'] = "send_msg";
        $data['active_submenu'] = "send_notification";
        if($this->input->post('submit') != ''){
           
            $name_search = $this->input->post('name_search');
            $email_search = $this->input->post('email_search');
            $mobile_no = $this->input->post('mobile_no');
            
            $data['return_name'] = $name_search;
            $data['return_mobile_no']  =   $mobile_no;
            $data['return_email']  =   $email_search;
            $data['all_customer'] = $this->model_notification->customer_report_multi_searchbar($name_search,$email_search,$mobile_no);
            $this->load->view('notification/notification',$data);		
            
        }else if($this->input->post('submit_notification') != ''){
                
              $msg = $this->input->post('text_msg');
              $customer_id_array = $this->input->post('all_customer_id');
              $customer_mobile_no_array = $this->input->post('all_customer_mobile');
              
              $customer_id = explode(',',$customer_id_array);
              foreach($customer_id as $row){
                   $data['msg'] = $this->model_notification->send_notification($msg,$customer_id);
                  
              }
            
              $data['all_customer'] = $this->model_notification->select_customer_report();
              $this->load->view('notification/notification',$data);	
              
          }else{
             $data['all_customer'] = $this->model_notification->select_customer_report();
            
             $this->load->view('notification/notification',$data);		
        }
    
       
		
	}    
    
    public function send_notification(){
          if(isset($_POST["title"])){
              $title = $_POST["title"];
               $msg = $_POST["msg"];
               $customer_id_array = $_POST["customer_id"];
              
         
            $data['msg'] = $this->model_notification->send_notification($title,$msg,$customer_id_array);
        
          }
    }
   
}
