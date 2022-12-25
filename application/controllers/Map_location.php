<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map_location extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_map_location');
     
           $this->load->model('model_dashboard');
        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			       redirect('./admin/login');
	     	}
		
	}

	public function init($active_menu){
		$uid = $this->session->userdata('uid');
		$data['user_data'] = $this->model_map_location->user_data($uid);
		$data['active_menu'] = $active_menu;
		return $data;
	}

	public function index(){
        $data['active_menu'] = "map_location";
		$data['agent_location'] = $this->model_map_location->select_agent_location();
        $data['customer_location'] = $this->model_map_location->select_customer_location();
		 $this->load->view('map_location', $data);

	}
    
    public function update_location(){
		$data["position"] = $this->model_map_location->update_location(); 
		echo json_encode($data);
		
	}
   
}
