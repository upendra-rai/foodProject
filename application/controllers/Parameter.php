<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class parameter extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_parameter');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
			 $data["user_data"] = $this->model_parameter->select_userdata($user_id);
       return $data;
	}

	public function index(){

	}

	public function add_unit()
	{

		if($this->input->post('submit')){
        
			 $unit = $this->input->post('unit');
            
            echo $unit;
			 $data["msg"] = $this->model_parameter->add_unit($unit);
      
		}else{
		$data = $this->init_user();
		$data['active_menu'] = "parameter";
		$data['active_submenu'] = "add_unit";
        $data["unit_list"] = $this->model_parameter->select_unit();
		$this->load->view('parameter/unit', $data);
	  }
	}
    
    public function edit_unit($id)
	{

		if($this->input->post('submit')){
        
			 $unit = $this->input->post('unit');
            
            
			 $data["msg"] = $this->model_parameter->edit_unit($unit,$id);
      
		}else{
		$data = $this->init_user();
		$data['active_menu'] = "parameter";
		$data['active_submenu'] = "add_unit";
            
        $data['edit_id'] =  $id;   
            
        $data["selected_item"] = $this->model_parameter->selected_unit($id);
        $data["unit_list"] = $this->model_parameter->select_unit();    
		$this->load->view('parameter/unit', $data);
	  }
	}
    
    


	public function del_unit()
	{
		if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$data["msg"] = $this->model_parameter->del_unit($del_id);
		}

	}
    
// ******************** Service Charge Section****************//    
// ******************** Service Charge Section****************//
// ******************** Service Charge Section****************// 
    
    public function manage_service_charge()
	{

		if($this->input->post('submit')){
        
			 $packaging_charge = $this->input->post('packaging_charge');
             $delivery_charge = $this->input->post('delivery_charge');
            
          
			 $data["msg"] = $this->model_parameter->manage_service_charge($packaging_charge,$delivery_charge);
      
		}else{
		$data = $this->init_user();
		$data['active_menu'] = "parameter";
		$data['active_submenu'] = "manage_service_charge";
        $data["app_setting"] = $this->model_parameter->select_app_setting();
		$this->load->view('parameter/service_charge', $data);
	  }
	}
    
    
// ******************** GST Section****************//    
// ******************** GST Section****************//
// ******************** GST Section****************//     
   public function add_gst()
	{

		if($this->input->post('submit')){
        
			 $unit = $this->input->post('unit');
            
            echo $unit;
			 $data["msg"] = $this->model_parameter->add_gst($unit);
      
		}else{
		$data = $this->init_user();
		$data['active_menu'] = "parameter";
		$data['active_submenu'] = "add_gst";
        $data["unit_list"] = $this->model_parameter->select_gst();
		$this->load->view('parameter/gst', $data);
	  }
	}
    
    public function edit_gst($id)
	{

		if($this->input->post('submit')){
        
			 $unit = $this->input->post('unit');
            
            
			 $data["msg"] = $this->model_parameter->edit_gst($unit,$id);
      
		}else{
		$data = $this->init_user();
		$data['active_menu'] = "parameter";
		$data['active_submenu'] = "add_gst";
            
        $data['edit_id'] =  $id;   
            
        $data["selected_item"] = $this->model_parameter->selected_gst($id);
        $data["unit_list"] = $this->model_parameter->select_gst();    
		$this->load->view('parameter/gst', $data);
	  }
	}
    
    


	public function del_gst()
	{
		if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$data["msg"] = $this->model_parameter->del_gst($del_id);
		}

	}
}
