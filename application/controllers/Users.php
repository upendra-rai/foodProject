<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_users');

        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			    redirect('./admin/login');
	     	}
	}

	public function init_user(){
       $user_id = $this->session->userdata('uid');
			 $data["user_data"] = $this->model_users->select_userdata($user_id);
       return $data;
	}

	public function index(){

	}

  public function user_list()
  {
		$data = $this->init_user();
		$data['active_menu'] = "user";
		$data['active_submenu'] = "create_admin";

		$data["list"] = $this->model_users->list_details();
		$this->load->view('users/user_list', $data);
  }

	public function add()
	{
      
		if($this->input->post('submit')){
       $name = $this->input->post('name');
			 $Mobile = $this->input->post('Mobile');
			 $email = $this->input->post('email');
			 $role =  $this->input->post('role');
       $outlet = $this->input->post('outlet');

			 $user_id = $this->input->post('user_id');
			 $user_password = $this->input->post('user_password');
			 $user_status =  $this->input->post('user_status');
             $data["outlet_list"] = $this->model_users->outlet_list();
                

			 $data["msg"] = $this->model_users->add($name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status);
            
             $this->load->view('users/add_user', $data);

		}else{
			$data['active_menu'] = "user";
		    $data['active_submenu'] = "create_admin";
            $data["outlet_list"] = $this->model_users->outlet_list();
			
			$this->load->view('users/add_user', $data);
	}
	}

	public function add_user_permisson($id)
	{
       if($this->input->post('submit')){
								// user Permission
									 $dashboard = $this->input->post('dashboard');
									 $track_location = $this->input->post('track_location');
									 $create_users = $this->input->post('create_users');
								// user permission
								$data["msg"] = $this->model_users->add_user_permisson($id,$dashboard,$track_location,$create_users);
			 }else{
				 $data['active_menu'] = "user";
		         $data['active_submenu'] = "create_admin";
				 $data = $this->init_user();
				 $this->load->view('users/user_permission', $data);
			 }
	}

	public function edit($id)
	{
		if($this->input->post('submit')){
			$name = $this->input->post('name');
			$Mobile = $this->input->post('Mobile');
			$email = $this->input->post('email');
			$role =  $this->input->post('role');
			$outlet = $this->input->post('outlet');

			$user_id = $this->input->post('user_id');
			$user_password = $this->input->post('user_password');
			$user_status =  $this->input->post('user_status');

			$data["msg"] = $this->model_users->edit($id,$name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status);
            
             $data["selected_row"] = $this->model_users->selected_row($id);
			$data["outlet_list"] = $this->model_users->outlet_list();
		     $this->load->view('users/add_user', $data);
		}else{
			$data['active_menu'] = "user";
		$data['active_submenu'] = "create_admin";
		  $data = $this->init_user();

			$data["selected_row"] = $this->model_users->selected_row($id);
			$data["outlet_list"] = $this->model_users->outlet_list();
		  $this->load->view('users/add_user', $data);
	  }
	}

	public function edit_user_permission($id)
	{
       if($this->input->post('submit')){
								// user Permission
									 $dashboard = $this->input->post('dashboard');
									 $track_location = $this->input->post('track_location');
									 $create_users = $this->input->post('create_users');
								// user permission
								$data["msg"] = $this->model_users->edit_user_permission($id,$dashboard,$track_location,$create_users);
			 }else{
				 $data['active_menu'] = "user";
		         $data['active_submenu'] = "create_admin";
				 $data = $this->init_user();
				 $this->load->view('users/user_permission', $data);
			 }
	}
    
    public function del_admin(){
        
        if(isset($_POST["del_id"])){
            
            $del_id = $_POST["del_id"];
            
            $data["msg"] = $this->model_users->del_admin($del_id);
        }
    }
    
    public function del_delivery_boy(){
        
         
        if(isset($_POST["del_id"])){
            
            $del_id = $_POST["del_id"];
            
            $data["msg"] = $this->model_users->del_delivery_boy($del_id);
        }
    }
//=========********===========********========******========//
// ************ Delivery Boy section ***********//
//=========********===========********========******========//
	public function delivery_boy_list()
  {
        
		$data = $this->init_user();
		$data['active_menu'] = "user";
		$data['active_submenu'] = "delivery_boy";

		$data["list"] = $this->model_users->delivery_boy_list();
		$this->load->view('users/delivery_boy', $data);
  }
    
  public function add_delivery_person(){
      $data = $this->init_user();
      if($this->input->post('submit')){
       $name = $this->input->post('name');
			 $Mobile = $this->input->post('Mobile');
			 $email = $this->input->post('email');
			 $role =  $this->input->post('role');
       $outlet = $this->input->post('outlet');

			 $user_id = $this->input->post('user_id');
			 $user_password = $this->input->post('user_password');
			 $user_status =  $this->input->post('user_status');
          
             $data["r_name"] = $name;
             $data["r_mobile"] = $Mobile;
             $data["r_email"] = $email;
             $data["r_user"] = $user_id;
             $data["r_password"] =  $user_password;  
             $data["r_status"] =  $user_status;  
                  
                 
  
			 $data["msg"] = $this->model_users->add_delivery_person($name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status);
          
            $data["outlet_list"] = $this->model_users->outlet_list();
			
			$this->load->view('users/add_delivery_boy', $data);

		}else{
			$data['active_menu'] = "user";
		    $data['active_submenu'] = "delivery_boy";
            $data["outlet_list"] = $this->model_users->outlet_list();
			
			$this->load->view('users/add_delivery_boy', $data);
	}
  }  
    
  public function edit_delivery_boy($id){
      $data = $this->init_user();
      if($this->input->post('submit')){
			$name = $this->input->post('name');
			$Mobile = $this->input->post('Mobile');
			$email = $this->input->post('email');
			$role =  $this->input->post('role');
			$outlet = $this->input->post('outlet');

			$user_id = $this->input->post('user_id');
			$user_password = $this->input->post('user_password');
			$user_status =  $this->input->post('user_status');

			$data["msg"] = $this->model_users->edit_delivery_boy($id,$name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status);
            	$data["selected_row"] = $this->model_users->selected_row($id);
			$data["outlet_list"] = $this->model_users->outlet_list();
		  $this->load->view('users/add_delivery_boy', $data);

		}else{
          $data['active_menu'] = "user";
		  $data['active_submenu'] = "delivery_boy";
		  $data = $this->init_user();

			$data["selected_row"] = $this->model_users->selected_row($id);
			$data["outlet_list"] = $this->model_users->outlet_list();
		  $this->load->view('users/add_delivery_boy', $data);
	  }
      
  }    
}
